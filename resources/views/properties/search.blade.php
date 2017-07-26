@extends('layouts.app')

@section('content')

  <!-- Start Properties  -->
  <section id="aa-properties">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="aa-properties-content">
            <!-- start properties content head -->
            <div class="aa-properties-content-head">              
              <div class="aa-properties-content-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name</option>
                    <option value="3">Price</option>
                    <option value="4">Date</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">6</option>
                    <option value="2">12</option>
                    <option value="3">24</option>
                  </select>
                </form>
              </div>
              <div class="aa-properties-content-head-right">
                <a id="aa-grid-properties" href="#"><span class="fa fa-th"></span></a>
                <a id="aa-list-properties" href="#"><span class="fa fa-list"></span></a>
              </div>            
            </div>
            <!-- Start properties content body -->
            <div class="aa-properties-content-body">
              <ul class="aa-properties-nav">


                @foreach($properties as $property)
                <li>
                  <article class="aa-properties-item">
                    <a class="aa-properties-item-img" href="/properties/{{$property->id}}">
                      <img alt="img" src="/{{ $property->property_photos->first()->filename }}" width="370" height="220">
                    </a>
                    <div class="aa-tag for-rent">
                      For {{$property->listingType}}
                    </div>
                    <div class="aa-properties-item-content">
                      <div class="aa-properties-info">
                        <span>{{$property->rooms}} Rooms</span>
                        <span>{{$property->bedrooms}} Beds</span>
                        <span>{{$property->bathrooms}} Baths</span>
                        <span>{{$property->size}} SQ FT</span>
                      </div>
                      <div class="aa-properties-about">
                        <h3><a href="/properties/{{$property->id}}">{{$property->street}} {{$property->city}} {{$property->province}} {{$property->postal}} </a></h3>
                        <p>{{str_limit($property->description, 150)}}</p>                      
                      </div>
                      <div class="aa-properties-detial">
                        <span class="aa-price">
                          ${{$property->price}}
                        </span>
                        <a class="aa-secondary-btn" href="/properties/{{$property->id}}">View Details</a>
                      </div>
                    </div>
                  </article>
                </li>
                @endforeach
                 
               
                 
              </ul>
            </div>
            <!-- Start properties content bottom -->
            <div class="aa-properties-content-bottom">
              <nav>
                <ul class="pagination">
                  {{ $properties->appends(Request::except('page'))->links()}}
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <!-- Start properties sidebar -->
        <div class="col-md-4">
          <aside class="aa-properties-sidebar">
            <!-- Start Single properties sidebar -->
            <div class="aa-properties-single-sidebar">
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
                  
                  <button id="savesearch" class="aa-search-btn">Save Search</button>
              </div>
              
             

            </div> 
            <!-- Start Single properties sidebar -->
            <div class="aa-properties-single-sidebar">
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
            </div>
          </aside>
        </div>
      </div>
    </div>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Save Search</h4>
                        </div>
                        <div id="alert">
                        </div>
                        
                        <div class="modal-body" id="mod-form">

                            <form id="frmSaveSearch" name="frmSaveSearch" class="form-horizontal">

                                  {{csrf_field()}}
                                <div class="form-group">
                                    <h4 class="col-sm-12">Name your search</h4>
                                    <br/>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control has-error" id="search" name="search" placeholder="Search Name" value="{{Request::get('location')}}" required>
                                        <input type="hidden" id="url" name="url" value="{{ $properties->appends(Request::except('page'))->url(1)}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="btn-save" value="add">Save changes</button>

                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            
                        </div>
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
        $('#savesearch').click(function(){


          $('#myModal').modal('show');
        });

        
       $('#mod-form').on('submit','#frmSaveSearch',function(e){
          

          e.preventDefault();
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
          });
          var formData = {
              search: $('#search').val(),
              url: $('#url').val(),
          }
          $.ajax({
                 type: "POST",
                 url: "savesearch",
                 data: $(this).serialize(),
                 dataType: 'json',
                 success: function(msg){
                        $('#alert').addClass('alert alert-success').text('Success!! Your Search has been saved.');
                 },
                 error: function(){
                 $('#alert').addClass('alert alert-danger').text('Error!! Your Search cannot be saved.');
                 }
        });        

        
      });
        });
  </script>
  </section>
  <!-- / Properties  -->

 @endsection