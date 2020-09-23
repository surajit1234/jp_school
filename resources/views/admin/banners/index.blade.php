@extends('layouts.admin_home')

@section('content')
<div class="container-fluid">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="h3 mb-2 text-gray-800">Home Page Banner Video</h1>
        <p class="mb-4">Add, Edit, Delete Banner Video.</p>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard / </a></li>
            <li class="active">&nbsp;Banner Management</li>
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
          <h6 class="m-0 font-weight-bold text-primary d-inline">Home Page Banner Video</h6> 
          <a class="btn btn-primary d-inline float-right" href="{{route('admin.banners.create')}}" role="button">Add Banner</a>
        </div>        

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <th>Banner Title</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                </thead>                
                <tbody>
                @if (count($banners) > 0)   
                @foreach ($banners as $banner)
                <tr> 
                    <td width="70%">{!! strip_tags($banner->title) !!}</td>
                    <td width="10%">{{($banner->status == 1?"Active":"Inactive")}}</td>
                    <td>            
                        <a class="btn btn-primary" href="{{ route('admin.banners.edit',$banner->id) }}">Edit</a>
                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('admin.banners.delete',$banner->id) }}">Delete</a>
                    </td>
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