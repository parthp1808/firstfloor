@extends('layouts.app')

@section('content')

<div class="container profile-page">
<h1>Dashboard</h1>
<br/>
    <div class="row">
        <div class="col-sm-6">
          <h2>My Listings</h2>
          <br/>
          <div class="row">
          @foreach($properties as $property)
            <div class="col-sm-6">
              <div class="property">
                <a href="/properties/{{$property->id}}"><img src="{{ $property->property_photos->first()->filename }}" alt="" id="property-image" width="250" height="auto">
                <h3>{{$property->street}} {{$property->city}} {{$property->province}} {{$property->postal}} </h3>
                <h4>${{$property->price}}</h4></a>
              </div>
            </div>

            @endforeach


          </div>

            
        </div>


        <div class="col-sm-6">
          

          <h2>My Saved Searches</h2>
          <br/>
            <div class="table-responsive">

                
              <table id="savedtable" class="table table-bordred table-striped">
                  @foreach(Auth::user()->searches as $search) 
                  <tr id="{{$search->id}}">
                    <td><a href="{{$search->url}}">{{$search->name}}</a></td>
                    <td><a href="{{$search->url}}"><button class="btn btn-primary btn-xs">View</button></a><button class="btn btn-danger btn-xs delete-search" value="{{$search->id}}" ><span class="glyphicon glyphicon-trash"></span></button></td>
                  </tr>
                  @endforeach
              </table>
                  

                
            </div>
        </div>


        <div class="col-sm-12">
          <h2>My Bookmarks</h2>
          <br/>
          <div class="row">
          @foreach(Auth::user()->bookmarks as $property)
            <div class="col-sm-6">
              <div class="property">
                <a href="/properties/{{$property->id}}"><img src="{{ $property->property_photos->first()->filename }}" alt="" id="property-image" width="250" height="auto">
                <h3>{{$property->street}} {{$property->city}} {{$property->province}} {{$property->postal}} </h3>
                <h4>${{$property->price}}</h4></a>
              </div>
            </div>

            @endforeach


          </div>

            
        </div>

          
    </div>   

        
    

   
</div>

<script>

      

    $(function(){



        
       $('.delete-search').click(function(){
          
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
          });
          var id = $(this).val();
         
        //   $.ajax({
        //          type: "DELETE",
        //          url: "savesearch/" + id,
        //          success: function (data) {
        //             console.log(data);

        //             $("#" + id).remove();
        //         },
        //         error: function () {
        //             alert('failure');
        //         }
        // }); 

          var token = $('meta[name="_token"]').attr('content');
          $.ajax(
          {
              url: "savesearch/" + id,
              type: 'DELETE',
              dataType: "JSON",
              data: {
                  "id": id,
                  "_token": "{{ csrf_token() }}",
              },
              success: function ()
              {
                  $("#" + id).remove();
              },
              error: function () {
                  alert('failure');
              }
          });       

        
      });
        });
  </script>
@endsection
