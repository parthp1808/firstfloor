@extends('layouts.app')

@section('content')

<!-- Start Properties  -->
  <section id="aa-properties">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="aa-properties-content">            
            <!-- Start properties content body -->
            <div class="aa-properties-details">
             <div class="aa-properties-details-img">
             @foreach($property->property_photos as $photo)
               <img src="/{{$photo->filename}}" alt="img">
             @endforeach
             </div>
             <div class="aa-properties-info">
               <h2>{{$property->street}} {{$property->city}} {{$property->province}} {{$property->postal}}</h2>
               <span class="aa-price">${{ $property->price }}</span>
               <p>{{ $property->description }}</p>
               <h4>Propery Features</h4>
               <ul>
                 <li>{{$property->bedrooms}} Bedroom</li>
                 <li>{{$property->bathrooms}} Baths</li>
                 @foreach($property->features as $feature)
                 <li>{{$feature->name}}</li>
                 @endforeach
               </ul>
               
               <h4>Property Map</h4>
               
               <iframe src="https://www.google.com/maps?q={{$property->street}} {{$property->city}} {{$property->province}} {{$property->postal}}&output=embed" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
             </div>
             <!-- Properties social share -->
             <div class="aa-properties-social">
               <ul>
                 <li>Share</li>
                 <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                 <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                 <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                 <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
               </ul>
             </div>
             <!-- Nearby properties -->
             <!-- <div class="aa-nearby-properties">
               <div class="aa-title">
                 <h2>Nearby Properties</h2>
                 <span></span>
               </div>
               <div class="aa-nearby-properties-area">
                 <div class="row">
                   <div class="col-md-6">
                     <article class="aa-properties-item">
                        <a class="aa-properties-item-img" href="#">
                          <img alt="img" src="img/item/1.jpg">
                        </a>
                        <div class="aa-tag for-sale">
                          For Sale
                        </div>
                        <div class="aa-properties-item-content">
                          <div class="aa-properties-info">
                            <span>5 Rooms</span>
                            <span>2 Beds</span>
                            <span>3 Baths</span>
                            <span>1100 SQ FT</span>
                          </div>
                          <div class="aa-properties-about">
                            <h3><a href="#">Appartment Title</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim molestiae vero ducimus quibusdam odit vitae.</p>                      
                          </div>
                          <div class="aa-properties-detial">
                            <span class="aa-price">
                              $35000
                            </span>
                            <a class="aa-secondary-btn" href="#">View Details</a>
                          </div>
                        </div>
                      </article>
                   </div>
                   <div class="col-md-6">
                     <article class="aa-properties-item">
                      <a class="aa-properties-item-img" href="#">
                        <img alt="img" src="img/item/2.jpg">
                      </a>
                      <div class="aa-tag for-sale">
                        For Sale
                      </div>
                      <div class="aa-properties-item-content">
                        <div class="aa-properties-info">
                          <span>5 Rooms</span>
                          <span>2 Beds</span>
                          <span>3 Baths</span>
                          <span>1100 SQ FT</span>
                        </div>
                        <div class="aa-properties-about">
                          <h3><a href="#">Appartment Title</a></h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim molestiae vero ducimus quibusdam odit vitae.</p>                      
                        </div>
                        <div class="aa-properties-detial">
                          <span class="aa-price">
                            $35000
                          </span>
                          <a class="aa-secondary-btn" href="#">View Details</a>
                        </div>
                      </div>
                    </article>
                   </div>
                 </div>
               </div>

             </div> -->

            </div>           
          </div>
        </div>



        <!-- Start properties sidebar -->
        <div class="col-md-4">
          <aside class="aa-properties-sidebar">
            <!-- Start Single properties sidebar -->
            <div class="aa-properties-single-sidebar">
            <h2>{{$property->user->name}}</h2>
            <h6>Contact the Seller</h6>
              <br>
              
              <h5 class="contact-badge">{{ $property->user->email }}</h5>
              <h5 class="contact-badge"><i class="fa fa-map-marker fa-phone text-muted"></i> {{ $property->user->number }}</h5>
            <br>
              <h3>Properties Search</h3>
              {!! Form::open(array('url' => '/search','class' => 'form')) !!}
                {{ csrf_field()}}
                <div class="aa-single-advance-search">
                   <input type="text" placeholder="Type Your Location" id="geocomplete" name="location" required >
                </div>
                <div class="aa-single-advance-search">
                  <select id="type" name="type">
                   <option value="0" selected>For Sale or Rent</option>
                    <option value="1">For Sale</option>
                    <option value="1">For Rent</option>

                  </select>
                </div>
                <div class="aa-single-advance-search">
                  <select id="bedrooms" name="bedrooms">
                    <option value="0" selected>Bedrooms</option>
                    <option value="1">1+</option>
                    <option value="2">2+</option>
                    <option value="3">3+</option>
                    <option value="4">4+</option>
                    <option value="3">5+</option>
                    
                  </select>
                </div>
                <div class="aa-single-advance-search">
                  <select id="bathrooms" name="bathrooms">
                    <option value="0" selected>Bathrooms</option>
                    <option value="1">1+</option>
                    <option value="2">2+</option>
                    <option value="3">3+</option>
                    <option value="4">4+</option>
                    <option value="3">5+</option>
                  </select>
                </div>
                <!-- <div class="aa-single-filter-search">
                  <span>AREA (SQ)</span>
                  <span>FROM</span>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                  <span>TO</span>
                  <span id="skip-value-upper" class="example-val">100.00</span>
                  <div id="aa-sqrfeet-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>                  
                </div> -->
                <div class="aa-single-filter-search">
               
                      <span>PRICE</span>
                    <input type="text" id="price" name="price" value=" " />
                       
                </div>
                <div class="aa-single-advance-search">
                  <input type="submit" value="Search" class="aa-search-btn">
                  
                </div>

              {!! Form::close() !!}
              <div class="aa-single-advance-search">
                  
                  <button id="bookmark" class="aa-search-btn" value ="{{ Auth::user()->bookmarks->contains($property->id) ? 'true' : 'false' }}">{{ Auth::user()->bookmarks->contains($property->id) ? 'Bookmarked' : 'Bookmark this property!' }}</button>
              </div>
            </div> 
            <!-- Start Single properties sidebar -->
            <!-- <div class="aa-properties-single-sidebar">
              <h3>Populer Properties</h3>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="img/item/1.jpg" alt="img">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">This is Title</a></h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>                
                  <span>$65000</span>
                </div>              
              </div>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="img/item/1.jpg" alt="img">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">This is Title</a></h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>                
                  <span>$65000</span>
                </div>              
              </div>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="img/item/1.jpg" alt="img">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">This is Title</a></h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>                
                  <span>$65000</span>
                </div>              
              </div>
            </div> -->
          </aside>
        </div>
      </div>
    </div>
    <script>

      

    $(function(){


        $("#geocomplete").geocomplete({
          details: "#search",
          detailsAttribute: "data-geo",
          country: 'ca'
        });

        $("#price").ionRangeSlider({
            type: "double",
            grid: false,
            min: 0,
            max: 2000000,
            from: 100000,
            to: 950000
        });


        $('#bookmark').click(function(){

          if($('#bookmark').val() == 'false')
          {
              $.ajax(
              {
                  url: "/bookmark/{{$property->id}}",
                  type: 'POST',
                  dataType: "JSON",
                  data: {
                      "id": "{{$property->id}}",
                      "_token": "{{ csrf_token() }}",
                  },
                  success: function ()
                  {
                     $('#bookmark').text('Bookmarked!!');
                     $('#bookmark').val("true");
                  },
                  error: function () {
                      alert('failure');
                  }
              });
          }
          else if($('#bookmark').val() == 'true')
          {
              $.ajax(
              {
                  url: "/bookmark/{{$property->id}}",
                  type: 'DELETE',
                  dataType: "JSON",
                  data: {
                      "id": "{{$property->id}}",
                      "_token": "{{ csrf_token() }}",
                  },
                  success: function ()
                  {
                     $('#bookmark').val("false");
                     $('#bookmark').text('Bookmark this Property');
                     
                     
                  },
                  error: function () {
                      alert('failure');
                  }
              });
          }

           

        });
        
      });

  
  </script> 
  </section>
  <!-- / Properties  -->


 @endsection