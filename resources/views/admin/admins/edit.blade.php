@extends('layouts.admin_home')

@section('content')
<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="h3 mb-2 text-gray-800">Users</h1>
        <p class="mb-4">Edit User</a></p>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.user.index')}}"><i class="fa fa-dashboard"></i> User Management</a> / </li>
            <li class="active">&nbsp;Edit</li>
        </ol>
    </section>
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

    <div class="card shadow mb-4">       
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">User</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive overflow-hidden">  
            <form name="formEdit" id="frmEdit" action="{{route('admin.user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}                
                <div class="form-row">
                    <div class="form-group col-md-4 has-error">
                      <label for="inputEmail4">Group / Clinic / Guest User</label>
                      <select name="user_type" class="form-control">
                        <option value="">Choose...</option>
                        <option value="group" @if(old('user_type',$user->user_type) == 'group') {{'selected'}} @endif>Group</option>
                        <option value="clinic" @if(old('user_type') == 'clinic') {{'selected'}} @endif>Clinic</option>
                        <option value="guest" @if(old('user_type') == 'guest') {{'selected'}} @endif>Guest</option>
                      </select>
                      @if($errors->user->first('user_type'))
                      <span class="help-block text-danger">
                        {{ $errors->user->first('user_type') }}
                      </span>
                      @endif
                    </div>                        
                </div> 
                <!-- 
                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="inputEmail4">Password</label>
                      <input type="password" name="password" class="form-control">
                      @if($errors->user->first('password'))
                      <span class="help-block text-danger">
                        {{ $errors->user->first('password') }}
                      </span>
                      @endif
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputPassword4">Retype Password</label>
                      <input type="password" class="form-control" name="password_confirmation">
                      @if($errors->user->first('password_confirmation'))
                      <span class="help-block text-danger">
                        {{ $errors->user->first('password_confirmation') }}
                      </span>
                      @endif
                    </div>                        
                </div> 
                -->
                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="inputEmail4">Company Name</label>
                      <input type="text" class="form-control" name="company_name" value="{{old('company_name',$user->company_name)}}">
                      @if($errors->user->first('company_name'))
                      <span class="help-block text-danger">
                        {{ $errors->user->first('company_name') }}
                      </span>
                      @endif
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputPassword4">Contact Name</label>
                      <input type="text" class="form-control" name="contact_name" value="{{old('contact_name',$user->contact_name)}}">
                      @if($errors->user->first('contact_name'))
                      <span class="help-block text-danger">
                        {{ $errors->user->first('contact_name') }}
                      </span>
                      @endif
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Email</label>
                      <input type="text" class="form-control" name="email" value="{{old('email',$user->email)}}">
                      @if($errors->user->first('email'))
                      <span class="help-block text-danger">
                        {{ $errors->user->first('email') }}
                      </span>
                      @endif
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputPassword4">Phone</label>
                      <input type="text" class="form-control" name="phone" value="{{old('phone',$user->phone)}}">
                      @if($errors->user->first('phone'))
                      <span class="help-block text-danger">
                        {{ $errors->user->first('phone') }}
                      </span>
                      @endif
                    </div>
                </div>  
                
                <div class="form-group">
                    <label for="inputAddress">Address Line 1</label>
                    <input type="text" class="form-control" name="address_1" placeholder="1234 Main St" value="{{old('address_1',$user->address_1)}}">
                    @if($errors->user->first('address_1'))
                      <span class="help-block text-danger">
                        {{ $errors->user->first('address_1') }}
                      </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Address Line 2</label>
                    <input type="text" class="form-control" name="address_2" placeholder="Apartment, studio, or floor" value="{{old('address_2',$user->address_2)}}">
                    @if($errors->user->first('address_2'))
                      <span class="help-block text-danger">
                        {{ $errors->user->first('address_2') }}
                      </span>
                    @endif
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="inputCity">City</label>
                      <input type="text" class="form-control" name="city" value="{{old('city',$user->city)}}">
                      @if($errors->user->first('city'))
                        <span class="help-block text-danger">
                          {{ $errors->user->first('city') }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputState">State</label>
                      <input type="text" class="form-control" name="state" value="{{old('state',$user->state)}}">
                      @if($errors->user->first('state'))
                        <span class="help-block text-danger">
                          {{ $errors->user->first('state') }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputZip">Postal Code</label>
                      <input type="text" class="form-control" name="zip" value="{{old('zip',$user->zip)}}">
                      @if($errors->user->first('zip'))
                        <span class="help-block text-danger">
                          {{ $errors->user->first('zip') }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputZip">Country</label>
                        <div class="input-group">
                            <input class="form-control py-2 border-right-0 border" name="country" value="{{old('country',$user->country)}}">
                            <span class="input-group-append">
                                <div class="input-group-text bg-transparent"><i class="fa fa-search"></i></div>
                            </span>
                        </div> 
                        @if($errors->user->first('country'))
                        <span class="help-block text-danger">
                          {{ $errors->user->first('country') }}
                        </span>
                        @endif 
                    </div>
                </div>
                <!-- <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck">
                      <label class="form-check-label" for="gridCheck">
                        Check me out
                      </label>
                    </div>
                </div> -->                      
                <!-- <div class="form-group">
                    <label>Status</label>
                    <input type="radio" name="status" value="1" checked>Active
                    <input type="radio" name="status" value="0" >Inactive          
                </div> --> 
                <!-- 
                <div class="form-group">
                    <label>Status</label>
                    <input type="radio" name="status" value="1" @if(@$banner->status == 1) checked @endif>Active
                    <input type="radio" name="status" value="0" @if(@$banner->status == 0) checked @endif>Inactive          
                </div> -->
                <div class="form-group row">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('admin.user.index')}}" class="btn btn-secondary" role="button" aria-pressed="true">Cancel</a>
                    </div>
                </div>          
            </form>       
          </div>
        </div>
    </div>     
</div>    
@endsection