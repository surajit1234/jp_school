<?php
use App\Customer;
?>

@extends('layouts.admin_home')

@section('content')
<div class="container-fluid">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="h3 mb-2 text-gray-800">Admins</h1>
        <p class="mb-4">View System Admins.</p>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard / </a></li>
            <li class="active">&nbsp;Admin Management</li>
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

    <div class="card shadow mb-4">        
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary d-inline">Site Users</h6> 
          
        </div>        

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>                      
                      <th>Name</th>
                      <th>Company</th>
                      <th>Profile Picture</th>
                      <th>Email</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                </thead>                
                <tbody>
                @if (count($users) > 0)   
                @foreach ($users as $user)
                <tr> 
                    <td width="20%">{!! $user->name !!}</td>
                    <td width="20%">{!! $user->company_name !!}</td>
                    <th>
                      @if (\Storage::disk('public')->exists('profile_picture/'.$user->profile_picture))
                      <img height="100px" class="img-profile rounded-circle" src="{{Storage::disk('public')->url('profile_picture/'.$user->profile_picture)}}" />
                      @else 
                      <img height="100px" class="img-profile rounded-circle" src="{{asset('img/no-image-icon.png')}}" />
                      @endif
                    </th>  
                    <td width="20%">{!! strip_tags($user->email) !!}</td>
                    <td width="20%">{!! date('Y-m-d',strtotime($user->created_at)) !!}</td>
                    <td width="10%">--</td>
                    <!-- <td>            
                        <a class="btn btn-primary" href="{{-- route('admin.user.edit',$user->id) --}}">Edit</a>
                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{-- route('admin.user.delete',$user->id) --}}">Delete</a>
                    </td> -->
                </tr>
                @endforeach  
                @else 
                    <tr><td colspan="3">No Records Found!!!</td></tr>
                @endif            
                </tbody>
            </table>
          </div>
        </div>
    </div>    
</div>  
@endsection