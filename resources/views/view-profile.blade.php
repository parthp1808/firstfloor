@extends('layouts.app')

@section('content')

<div class="container profile-page">
<h1>My Profile</h1>
<br/>
<br/>
    <div class="row">
        <div class="col-sm-4">

        <div class="profile-image">
          <img src="{{ Auth::user()->avatar}}" class="img-responsive profile" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"/>
        </div>  
          
          <div>
            <form id="form" action="/upload-profile" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <input id="uploadImage" type="file" accept="image/*" name="image" />
              <input id="button" type="submit" value="Upload">
             </form>
          </div>
        </div>

        <div class="col-sm-8">
          <h3 class="centered">Personal Information</h3>
          <button class="edit btn btn-info" onclick="window.location.href='/edit-profile'">
              <span class="glyphicon glyphicon-edit"></span> Edit
            </button>
          <br/>
          
          <br/>

          <table class="profile-fields">
          
                  <tr>
              <th>Name</th>
              <td>{{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ Auth::user()->email }}</td>
            </tr>
            <tr>
              <th>Mobile Number</th>
              <td>{{ Auth::user()->number }}</td>
            </tr>
            <tr>
              <th>Postal Code</th>
              <td>{{ Auth::user()->postal_code }}</td>
            </tr>
            <tr>
              <th>Status</th>
              <td>{{ Auth::user()->status }}</td>
            </tr>
            

          
        </table>

        </div>
    </div>

    <!-- <script>
      $(document).on('click', '.edit', function() {
       
        $('#myModal').modal('show');
    });

      $(document).ready(function(){
          $('.modal-footer').on('click', '.update', function() {

              $.ajax({
                  type: 'post',
                  url: '/edit-profile',
                  data: {
                      '_token': $('input[name=_token]').val(),
                      'name': $('#name').val(),
                      'email':$('#email').val(),
                      'number':$('#number').val(),
                      'postal':$('#postal').val()
                  },
                  success: function(data) {

                      $('.profile-fields').replaceWith(" <tr> <th>Name</th> <td>" + data.name + "</td> </tr> <tr> <th>Email</th> <td>" + data.email + "</td> </tr> <tr> <th>Mobile Number</th> <td>" + data.number + "</td> </tr> <tr> <th>Postal Code</th> <td>" + data.postal + "</td> </tr> <tr> <th>Status</th> <td>{{ Auth::user()->status }}</td> </tr>");
                  }
              });
          });

      });
    </script> -->

</div>
@endsection
