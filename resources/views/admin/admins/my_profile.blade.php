@extends('layouts.admin_home')

@section('content')
<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <h1 class="h3 mb-2 text-gray-800">My Profile</h1>
        <p class="mb-4">Update Profile</a></p>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> User Management</a> / </li>
            <li class="active">&nbsp;Edit</li>
        </ol>
    </section> -->
    @if ($message = Session::get('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Success!!!</strong> {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>    
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Error!!!</strong> {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif    
    
    <div class="card-columns justify-content-center">
      <div class="card shadow mb-4 mr-4">       
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Profile</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive overflow-hidden">  
              <form name="formEdit" id="frmEdit" action="{{route('admin.admin.update-profile')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }} 
                  <div class="form-group">
                    <label for="inputEmail4">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name',$user->name)}}">
                    @if($errors->profile->first('name'))
                    <span class="help-block text-danger">
                      {{ $errors->profile->first('name') }}
                    </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="inputPassword4">Company Name</label>
                    <input type="text" class="form-control" name="company_name" value="{{old('company_name',$user->company_name)}}">
                    @if($errors->profile->first('company_name'))
                    <span class="help-block text-danger">
                      {{ $errors->profile->first('company_name') }}
                    </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="text" class="form-control" name="email" value="{{old('email',$user->email)}}">
                    @if($errors->profile->first('email'))
                    <span class="help-block text-danger">
                      {{ $errors->profile->first('email') }}
                    </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="inputEmail4">Profile Picture</label>
                      <div class="profile-header-container">   
                          <div class="profile-header-img">
                              @if (($user->profile_picture != "") && (\Storage::disk('public')->exists('profile_picture/'.$user->profile_picture)))
                              <img height="100px" class="img-profile rounded-circle" src="{{Storage::disk('public')->url('profile_picture/'.$user->profile_picture)}}" />
                              @else 
                              <img height="100px" class="img-profile rounded-circle" src="{{asset('img/no-image-icon.png')}}" />
                              @endif
                          </div>
                      </div> 
                  </div>
                  <div class="form-group">
                    <label for="inputEmail4">Change Profile Picture</label>
                    <input type="file" class="form-control" name="profile_picture">
                    @if($errors->profile->first('profile_picture'))
                    <span class="help-block text-danger">
                      {{ $errors->profile->first('profile_picture') }}
                    </span>
                    @endif
                  </div>
                  <div class="form-group row">
                      <div class="col-sm-4">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <!-- <a href="" class="btn btn-secondary" role="button" aria-pressed="true">Cancel</a> -->
                      </div>
                  </div>          
              </form>       
            </div>
          </div>
      </div>
      <div class="card shadow mb-4">       
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive overflow-hidden">  
              <form action="{{route('admin.admin.change-password')}}" method="POST">
                  {{ csrf_field() }}                    
                  <div class="form-group">
                        <label for="exampleInputEmail1">Old Password</label>
                        <input type="password" class="form-control" id="old_pass" name="old_pass" placeholder="Enter Old Password" autocomplete="off">
                        @if($errors->profile->first('old_pass'))
                          <span class="help-block text-danger">
                            {{ $errors->profile->first('old_pass') }}
                          </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" class="form-control" id="new_pass" name="new_pass" placeholder="Enter New Password" autocomplete="off">
                        @if($errors->profile->first('new_pass'))
                          <span class="help-block text-danger">
                            {{ $errors->profile->first('new_pass') }}
                          </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmed" name="confirmed" placeholder="Confirm Password" autocomplete="off">
                        @if($errors->profile->first('confirmed'))
                          <span class="help-block text-danger">
                            {{ $errors->profile->first('confirmed') }}
                          </span>
                        @endif
                    </div>
                              
                  
                  <div class="form-group row">
                      <div class="col-sm-4">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <!-- <a href="" class="btn btn-secondary" role="button" aria-pressed="true">Cancel</a> -->
                      </div>
                  </div>          
              </form>       
            </div>
          </div>
      </div>
    </div>       
</div>    
@endsection