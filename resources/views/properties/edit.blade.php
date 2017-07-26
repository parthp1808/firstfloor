@extends('layouts.app')

@section('content')

<div class="container profile-page">
<h1>Edit Listing</h1>
<br/>
<br/>
    
    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="/properties/{{$property->id}}/edit" >
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
              <label class="control-label col-sm-2" for="listing_type">Property for:</label>
              <div class="col-sm-6">
                <select id="status" class="form-control" name="listing_type">
                  <option value="sell" <?php echo ($property->listingType == "sell" ? "selected" : " ");?> >Sell</option>
                  <option value="rent"<?php echo ($property->listingType == "rent" ? "selected" : " ");?> >Rent</option>
                 </select>  
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="property_type">Property Type:</label>
              <div class="col-sm-6">
                <select id="status" class="form-control" name="property_type">
                  <option value="apartment" <?php echo ($property->propertyType == "apartment" ? "selected" : " ");?> >Apartment</option>
                  <option value="detached" <?php echo ($property->propertyType == "detached" ? "selected" : " ");?> >Detached</option>
                  <option value="house" <?php echo ($property->propertyType == "house" ? "selected" : " ");?> >House</option>
                 </select>  
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="street">Address:</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="street" value="<?php echo $property->street; ?>" placeholder="Street Address" required>
              </div>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="city" value="<?php echo $property->city; ?>" placeholder="City" required>
                </div>
                <div class="col-sm-2">
                <select id="status" class="form-control" name="province">
                    <option value="AB" <?php echo ($property->province == "AB" ? "selected" : " ");?> >AB</option>
                    <option value="BC" <?php echo ($property->province == "BC" ? "selected" : " ");?> >BC</option>
                    <option value="MB" <?php echo ($property->province == "MB" ? "selected" : " ");?> >MB</option>
                    <option value="NB" <?php echo ($property->province == "NB" ? "selected" : " ");?> >NB</option>
                    <option value="NL" <?php echo ($property->province == "NL" ? "selected" : " ");?> >NL</option>
                    <option value="NS" <?php echo ($property->province == "NS" ? "selected" : " ");?> >NS</option>
                    <option value="NT" <?php echo ($property->province == "NT" ? "selected" : " ");?> >NT</option>
                    <option value="NU" <?php echo ($property->province == "NU" ? "selected" : " ");?> >NU</option>
                    <option value="ON" <?php echo ($property->province == "ON" ? "selected" : " ");?> >ON</option>
                    <option value="PEI" <?php echo ($property->province == "PEI" ? "selected" : " ");?> >PEI</option>
                    <option value="QC" <?php echo ($property->province == "QC" ? "selected" : " ");?> >QC</option>
                    <option value="SK">SK</option>
                    <option value="YK">YK</option>
                 </select>
                 </div>
                 <div class="col-sm-2">
                 <input type="text" class="form-control" name="postal" value="<?php echo $property->postal; ?>" placeholder="Postal Code" required>
                 </div>
              </div>
            

            <div class="form-group">
              <label class="control-label col-sm-2" for="description">Description:</label>
              <div class="col-sm-10">
                <textarea name="description" cols="50" rows="10"><?php echo $property->description; ?></textarea> 
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-2" for="price">Price:</label>
              <div class="col-sm-4">
                 <input type="text" class="form-control" name="price" value="<?php echo $property->price; ?>" placeholder="Price" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="bedrooms">Bedrooms:</label>
              <div class="col-sm-2">
                <select id="status" class="form-control" name="bedrooms">
                  <option value="1" <?php echo ($property->bedrooms == "1" ? "selected" : " ");?> >1</option>
                  <option value="2" <?php echo ($property->bedrooms == "2" ? "selected" : " ");?> >2</option>
                  <option value="3" <?php echo ($property->bedrooms == "3" ? "selected" : " ");?> >3</option>
                  <option value="4" <?php echo ($property->bedrooms == "4" ? "selected" : " ");?> >4</option>
                  <option value="5" <?php echo ($property->bedrooms == "5" ? "selected" : " ");?> >5</option>
                  <option value="6" <?php echo ($property->bedrooms == "6" ? "selected" : " ");?> >6</option>
                 </select>  
              </div>

              <label class="control-label col-sm-1" for="bathrooms">Bathrooms:</label>
              <div class="col-sm-2">
                <select id="status" class="form-control" name="bathrooms">
                  <option value="1" <?php echo ($property->bathrooms == "1" ? "selected" : " ");?> >1</option>
                  <option value="2" <?php echo ($property->bathrooms == "2" ? "selected" : " ");?> >2</option>
                  <option value="3" <?php echo ($property->bathrooms == "3" ? "selected" : " ");?> >3</option>
                  <option value="4" <?php echo ($property->bathrooms == "4" ? "selected" : " ");?> >4</option>
                 </select>  
              </div>

              <label class="control-label col-sm-1" for="rooms">Rooms:</label>
              <div class="col-sm-2">
                <select id="status" class="form-control" name="rooms">
                  <option value="1" <?php echo ($property->rooms == "1" ? "selected" : " ");?> >1</option>
                  <option value="2" <?php echo ($property->rooms == "2" ? "selected" : " ");?> >2</option>
                  <option value="3" <?php echo ($property->rooms == "3" ? "selected" : " ");?> >3</option>
                  <option value="4" <?php echo ($property->rooms == "4" ? "selected" : " ");?> >4</option>
                  <option value="5" <?php echo ($property->rooms == "5" ? "selected" : " ");?> >5</option>
                  <option value="6" <?php echo ($property->rooms == "6" ? "selected" : " ");?> >6</option>
                  <option value="7" <?php echo ($property->rooms == "7" ? "selected" : " ");?> >7</option>
                  <option value="8" <?php echo ($property->rooms == "8" ? "selected" : " ");?> >8</option>
                  <option value="9" <?php echo ($property->rooms == "9" ? "selected" : " ");?> >9</option>
                 </select>  
              </div>

            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="features[]">Property Features:</label>
              <div class="col-sm-6">
                 
                <div>
                    <input value="1" class="checkbox-custom" name="features[]" type="checkbox"  <?php echo (in_array('1',$property->features->pluck('id')->toArray()) ? "checked" : " ");?> >
                    <label for="ac" class="checkbox-custom-label">Air Condition</label>
                </div>
                <div>
                    <input value="2" class="checkbox-custom" name="features[]" type="checkbox"  <?php echo (in_array('2',$property->features->pluck('id')->toArray()) ? "checked" : " ");?> >
                    <label for="heating" class="checkbox-custom-label">Heating</label>
                </div>
                <div>
                    <input value="3" class="checkbox-custom" name="features[]" type="checkbox"  <?php echo (in_array('3',$property->features->pluck('id')->toArray()) ? "checked" : " ");?> >
                    <label for="garden" class="checkbox-custom-label">Garden</label>    
                </div>
                <div>
                    <input value="4" class="checkbox-custom" name="features[]" type="checkbox"  <?php echo (in_array('4',$property->features->pluck('id')->toArray()) ? "checked" : " ");?> >
                    <label for="garage" class="checkbox-custom-label">Garage</label>
                </div>
                <div>
                    <input value="5" class="checkbox-custom" name="features[]" type="checkbox"  <?php echo (in_array('5',$property->features->pluck('id')->toArray()) ? "checked" : " ");?> >
                    <label for="basement" class="checkbox-custom-label">Basement</label>
                </div>
                <div>
                    <input value="6" class="checkbox-custom" name="features[]" type="checkbox"  <?php echo (in_array('6',$property->features->pluck('id')->toArray()) ? "checked" : " ");?> >
                    <label for="security" class="checkbox-custom-label">Security System</label>    
                </div>
                <div>
                    <input value="7" class="checkbox-custom" name="features[]" type="checkbox"  <?php echo (in_array('7',$property->features->pluck('id')->toArray()) ? "checked" : " ");?> >
                    <label for="kitchen" class="checkbox-custom-label">Kitchen</label>
                </div>
                <div>
                    <input value="8" class="checkbox-custom" name="features[]" type="checkbox"  <?php echo (in_array('8',$property->features->pluck('id')->toArray()) ? "checked" : " ");?> >
                    <label for="balcony" class="checkbox-custom-label">Balcony</label>
                </div>
                

              </div>
            </div>



            <div class="form-group">
              <label class="control-label col-sm-2" for="size">Size:</label>
              <div class="col-sm-4">
                 <input type="text" class="form-control" name="size" value="<?php echo $property->size; ?>" placeholder="Size" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="postal">Property Photos:</label>
              <div class="col-sm-10">

                <div class="row">
                  @foreach($property->property_photos as $photo)


                  <div class="col-sm-3">
                    <div class="img-wrap">
                      <span class="close">&times;</span>
                      <img id="{{ $photo->id}}" src="/{{$photo->filename}}" width="180px" height="120">
                    </div>
                  </div>
                  @endforeach
                  <div class="col-sm-3">
                     <input type="file" name="photos[]" multiple  />
                  </div>
                </div>
                 
              </div>
            </div>
            
            <input id="hidden" type="hidden" value="" name="hidden">
           
           <div class="form-group">
              <label class="control-label col-sm-2" for="postal"></label>
              <div class="col-sm-4">
                 <button type="submit" class="btn btn-success">
                  <span id="footer_action_button" class='glyphicon glyphicon-check '></span> Save Changes
                </button>
                <button type="submit" class="btn btn-warning">
                  <span id="footer_action_button" class='glyphicon glyphicon-remove '></span> Cancel
                </button>
              </div>
            </div>
            
            
            
          
            </form>

    
</div>
<script>
  $('.img-wrap .close').on('click', function() {
    var id = $(this).closest('.img-wrap').find('img').attr('id');
    $('#hidden').val(function(){
      return this.value+","+id;
    })
    $(this).parent().remove();
});
</script>
@endsection
