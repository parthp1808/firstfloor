@extends('layouts.app')

@section('content')

<div class="container profile-page">
<h1>My Profile</h1>
<br/>
<br/>
    <div class="row">
        <div class="col-sm-4">

        <div class="profile-image">
          <img src="{{ Auth::user()->avatar}}" class="img-responsive profile"/>
        </div>  
          
          <div>
            Update Profile Picture
          </div>
        </div>

        <div class="col-sm-8">
          <!-- <h3 class="centered">Personal Information</h3> -->
          <!-- <br/> -->
          <br/>
            <form class="form-horizontal" role="form" method="post" action="/edit-profile" >
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
              <label class="control-label col-sm-2" for="name">Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email ID:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="number">Mobile Number:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="number" value="{{ Auth::user()->number }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="postal">Postal Code:</label>
              <div class="col-sm-10">
                <input type="name" class="form-control" name="postal" value="{{ Auth::user()->postal_code }}">
              </div>
            </div>


          
            <button type="submit" class="btn btn-success update" data-dismiss="modal">
              <span id="footer_action_button" class='glyphicon glyphicon-check '></span>Update
            </button>
            <button type="button" class="btn btn-warning cancel" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'></span> Cancel
            </button>
          
            </form>
        </div>
    </div>

    <script>
      $(document).ready(function() {
          $(".cancel").click(function(){
              window.location.href='/my-profile';
          }); 
      });
    </script>
</div>
@endsection
