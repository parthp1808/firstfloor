<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Response;
use App\Property;
use App\PropertyPhoto;
use App\UserSearch;
use App\Feature;
use Auth;
use Storage;
use DB;


class PropertyController extends Controller
{
    public function home()
    {
      $properties = Property::latest()->take(6)->get();
      return view('welcome',compact('properties'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function index()
    {
        $properties = Property::all();

        return view('properties.search',compact('properties'));
    }

    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    public function store(Request $request)
    {

        
            $this->validate($request, [
                'street' => 'required',
                'city' => 'required',
                'postal' => 'required',
                'price' => 'required',
                'size' => 'required',
                'photos.*' => 'image|mimes:jpg,png,jpeg,gif|max:8048',

            ]);
        
    	
         
        $property = new Property;
        $property->street = $request->street;
        $property->city = $request->city;
        $property->province = $request->province;
        $property->postal = $request->postal;
        $property->propertyType = $request->property_type;
        $property->listingType = $request->listing_type;
        $property->status = 'active';
        $property->description = $request->description;
        $property->price = $request->price;
        $property->size = $request->size;
        
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->rooms = $request->rooms;
        
        $address = $property->street.",".$property->city.",". $property->province." ".$property->postal.", Canada";

        $property->lat = getLat($address);
        $property->long= getLong($address);
        
        $property->user_id = Auth::id();
        $property->save();
        $property->features()->sync($request->features);
        // dd($request->all());

        foreach ($request->photos as $photo) {
            $filename = $photo->store('img/property_photos');
            $property->property_photos()->create([
                'property_id' => $property->id,
                'filename' => $filename
            ]);
        }

        // dd($request->features);
        return redirect('/dashboard');

    	// dd($request->all());
        
        

    }


    public function edit(Property $property)
    {
        if (Auth::check() && Auth::user()->id == $property->user->id)
        {
            
                return view('properties.edit', compact('property'));
        }
            
        else {
             // flash('You are not authorized to edit the note','warning');
             return redirect('/dashboard');
         }
    }

    public function update(Request $request,Property $property)
    {
        $this->validate($request, [
                'street' => 'required',
                'city' => 'required',
                'postal' => 'required',
                'price' => 'required',
                'size' => 'required',
                'photos.*' => 'image|mimes:jpg,png,jpeg,gif|max:8048',

            ]);
        $property->street = $request->street;
        $property->city = $request->city;
        $property->province = $request->province;
        $property->postal = $request->postal;
        $property->propertyType = $request->property_type;
        $property->listingType = $request->listing_type;
        $property->status = 'active';
        $property->description = $request->description;
        $property->price = $request->price;
        $property->size = $request->size;
        
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->rooms = $request->rooms;
        
        $property->lat = 43.897093;
        $property->long=-78.865791;
        $property->save();
        $property->features()->sync($request->features);
        if($request->hidden != "")
        {
            $ids = array_filter(explode(',',$request->hidden));
            if((count($property->property_photos) - count($ids)) == 0 && $request->photos == null)
            {
                return back();
            }
            foreach ($ids as $id) {
                Storage::delete($property->property_photos()->find($id)->filename);
                $property->property_photos()->find($id)->delete();
            }

        }

        if($request->photos != null)
        {
            foreach ($request->photos as $photo) {
                $filename = $photo->store('img/property_photos');
                $property->property_photos()->create([
                    'property_id' => $property->id,
                    'filename' => $filename
                ]);
            }
        }

        return redirect('/dashboard');
    }

    
   

    public function search()
    {

      // dd( Input::all());
      $price = explode(',',Input::get('price'));
      $lat = getLat(Input::get('location'));
      $long = getLong(Input::get('location'));
      $bedrooms = Input::get('bedrooms');
      $bathrooms = Input::get('bathrooms');



      // $properties = DB::select( DB::raw("SELECT id
      //                 FROM (
      //                SELECT z.id,
      //                       z.street,
      //                       z.city,z.postal,z.description,
      //                       z.lat, z.long,
      //                       p.radius,
      //                       p.distance_unit
      //                                * DEGREES(ACOS(COS(RADIANS(p.latpoint))
      //                                * COS(RADIANS(z.lat))
      //                                * COS(RADIANS(p.longpoint - z.long))
      //                                + SIN(RADIANS(p.latpoint))
      //                                * SIN(RADIANS(z.lat)))) AS distance
      //                 FROM properties AS z
      //                 JOIN (   /* these are the query parameters */
      //                       SELECT  $lat  AS latpoint,  $long AS longpoint,
      //                               50000.0 AS radius,      111.045 AS distance_unit
      //                   ) AS p ON 1=1
      //                 WHERE z.lat
      //                    BETWEEN p.latpoint  - (p.radius / p.distance_unit)
      //                        AND p.latpoint  + (p.radius / p.distance_unit)
      //                   AND z.long
      //                    BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
      //                        AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
      //                ) AS d
      //                WHERE distance <= radius
      //                ORDER BY distance
      //                LIMIT 15"));

      // $json  = json_encode($properties);
      // $array = json_decode($json, true);
      //  // $array = paginate($array,2);

      // if($request->type == 1)
      // {
      //   $properties = Property::findMany($array)->where('price','<=',$price[1])->where('price','>=',$price[0])->where('bedrooms','>=',$bedrooms)->where('bathrooms','>=',$bathrooms)->where('listingType','=','sale');
      // }
      // elseif($request->type == 2)
      // {
      //    $properties = Property::findMany($array)->where('price','<=',$price[1])->where('price','>=',$price[0])->where('bedrooms','>=',$bedrooms)->where('bathrooms','>=',$bathrooms)->where('listingType','=','rent');

      // }
      // else
      // {
      //   $properties = Property::findMany($array)->where('price','<=',$price[1])->where('price','>=',$price[0])->where('bedrooms','>=',$bedrooms)->where('bathrooms','>=',$bathrooms);

      // }

      
      
      // $properties = haversine(DB::table('properties'),$lat,$long,500);



      // $properties = new LengthAwarePaginator(
      // $properties, 
      // $properties->count(), 
      // 1, 
      // Paginator::resolveCurrentPage(), 
      // ['path' => Paginator::resolveCurrentPath()]);

     
      
      $gr_circle_radius = 6371;
      $max_distance = 500;

      $distance_select = sprintf(
                                    "           
                                    ( %d * acos( cos( radians(%s) ) " .
                                            " * cos( radians( lat ) ) " .
                                            " * cos( radians( long ) - radians(%s) ) " .
                                            " + sin( radians(%s) ) * sin( radians( lat ) ) " .
                                        " ) " . 
                                    ")
                                     ",
                                    $gr_circle_radius,               
                                    $lat,
                                    $long,
                                    $lat
                                   );

      if(Input::get('type') == 1)
      {
        $properties =  Property::select('*')->where('price','<=',$price[1])->where('price','>=',$price[0])->where('bedrooms','>=',$bedrooms)->where('bathrooms','>=',$bathrooms)->where('listingType','=','sale')->having(DB::raw($distance_select), '<=', $max_distance)->groupBy('properties.id')->paginate(1);
      }
      elseif(Input::get('type') == 2)
      {
        $properties =  Property::select('*')->where('price','<=',$price[1])->where('price','>=',$price[0])->where('bedrooms','>=',$bedrooms)->where('bathrooms','>=',$bathrooms)->where('listingType','=','rent')->having(DB::raw($distance_select), '<=', $max_distance)->groupBy('properties.id')->paginate(1);
      }
      else
      {
        $properties =  Property::select('*')->where('price','<=',$price[1])->where('price','>=',$price[0])->where('bedrooms','>=',$bedrooms)->where('bathrooms','>=',$bathrooms)->having(DB::raw($distance_select), '<=', $max_distance)->groupBy('properties.id')->paginate(1);

      }


      
      // dd($properties->appends(Request::except('page'))->url(1));
          // $properties->setPath('search');
      // dd($properties);  
      return view('/properties/search',compact('properties'));
     

        // $prop = $this->haversine(DB::table('properties'),43.917276,-78.861487,300);
        // dd($prop);
    }

    
    public function savesearch(Request $request)
    {

      $search = new UserSearch;
      $search->user_id = Auth::id();
      $search->name = $request->search;
      $search->url = $request->url;
      $search->save();

      $response = array(
        'status' => 'success',
        'msg'    => 'Setting created successfully',
      );
      return Response::json($response);
    }


    public function bookmark(Request $request)
    {

      Auth::User()->bookmarks()->attach($request->id);
      $response = array(
        'status' => 'success',
        'msg'    => 'Setting created successfully',
      );
      return Response::json($response);
    }
    public function deletebookmark(Request $request)
    {

      Auth::User()->bookmarks()->detach($request->id);
      $response = array(
        'status' => 'success',
        'msg'    => 'Setting created successfully',
      );
      return Response::json($response);
    }

}
