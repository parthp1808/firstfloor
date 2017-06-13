@extends('layouts.app')

@section('content')

<div class="container profile-page">
<h1>Create Listing</h1>
<br/>
<br/>
    
    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="/create-listing" >
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{  csrf_field()}}

            <div class="form-group">
              <label class="control-label col-sm-2" for="name">Property for:</label>
              <div class="col-sm-6">
                <select id="status" class="form-control" name="listing_type">
                  <option value="sale" selected="selected">Sale</option>
                  <option value="rent">Rent</option>
                 </select>  
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="name">Property Type:</label>
              <div class="col-sm-6">
                <select id="status" class="form-control" name="property_type">
                  <option value="apartment" selected="selected">Apartment</option>
                  <option value="detached">Detached</option>
                  <option value="house">House</option>
                 </select>  
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="number">Address:</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="street" value="" placeholder="Street Address" required>
              </div>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="city" value="" placeholder="City" required>
                </div>
                <div class="col-sm-2">
                <select id="status" class="form-control" name="province">
                    <option value="AB">AB</option>
                    <option value="BC">BC</option>
                    <option value="MB">MB</option>
                    <option value="NB">NB</option>
                    <option value="NL">NL</option>
                    <option value="NS">NS</option>
                    <option value="NT">NT</option>
                    <option value="NU">NU</option>
                    <option value="ON" selected="selected">ON</option>
                    <option value="PEI">PEI</option>
                    <option value="QC">QC</option>
                    <option value="SK">SK</option>
                    <option value="YK">YK</option>
                 </select>
                 </div>
                 <div class="col-sm-2">
                 <input type="text" class="form-control" name="postal" value="" placeholder="Postal Code" required>
                 </div>
              </div>
            

            <div class="form-group">
              <label class="control-label col-sm-2" for="postal">Description:</label>
              <div class="col-sm-10">
                <textarea name="description" cols="50" rows="10"></textarea> 
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-2" for="postal">Price:</label>
              <div class="col-sm-4">
                 <input type="text" class="form-control" name="price" value="" placeholder="Price" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="name">Bedrooms:</label>
              <div class="col-sm-2">
                <select id="status" class="form-control" name="bedrooms">
                  <option value="1" selected="selected">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                 </select>  
              </div>

              <label class="control-label col-sm-1" for="name">Bathrooms:</label>
              <div class="col-sm-2">
                <select id="status" class="form-control" name="bathrooms">
                  <option value="1" selected="selected">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                 </select>  
              </div>

              <label class="control-label col-sm-1" for="name">Rooms:</label>
              <div class="col-sm-2">
                <select id="status" class="form-control" name="rooms">
                  <option value="1" selected="selected">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                 </select>  
              </div>

            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="postal">Property Features:</label>
              <div class="col-sm-6">
                 
                <div>
                    <input value="1" class="checkbox-custom" name="features[]" type="checkbox" checked>
                    <label for="ac" class="checkbox-custom-label">Air Condition</label>
                </div>
                <div>
                    <input value="2" class="checkbox-custom" name="features[]" type="checkbox">
                    <label for="heating" class="checkbox-custom-label">Heating</label>
                </div>
                <div>
                    <input value="3" class="checkbox-custom" name="features[]" type="checkbox">
                    <label for="garden" class="checkbox-custom-label">Garden</label>    
                </div>
                <div>
                    <input value="4" class="checkbox-custom" name="features[]" type="checkbox">
                    <label for="garage" class="checkbox-custom-label">Garage</label>
                </div>
                <div>
                    <input value="5" class="checkbox-custom" name="features[]" type="checkbox">
                    <label for="basement" class="checkbox-custom-label">Basement</label>
                </div>
                <div>
                    <input value="6" class="checkbox-custom" name="features[]" type="checkbox">
                    <label for="security" class="checkbox-custom-label">Security System</label>    
                </div>
                <div>
                    <input value="7" class="checkbox-custom" name="features[]" type="checkbox" checked>
                    <label for="kitchen" class="checkbox-custom-label">Kitchen</label>
                </div>
                <div>
                    <input value="8" class="checkbox-custom" name="features[]" type="checkbox">
                    <label for="balcony" class="checkbox-custom-label">Balcony</label>
                </div>
                

              </div>
            </div>



            <div class="form-group">
              <label class="control-label col-sm-2" for="postal">Size:</label>
              <div class="col-sm-4">
                 <input type="text" class="form-control" name="size" value="" placeholder="Size" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="postal">Property Photos:</label>
              <div class="col-sm-4">
                 <input type="file" name="photos[]" multiple required />
              </div>
            </div>

           
           <div class="form-group">
              <label class="control-label col-sm-2" for="postal"></label>
              <div class="col-sm-4">
                 <button type="submit" class="btn btn-success">
              <span id="footer_action_button" class='glyphicon glyphicon-check '></span>Publish
            </button>
              </div>
            </div>
            
            
            
          
            </form>

    
</div>
@endsection
