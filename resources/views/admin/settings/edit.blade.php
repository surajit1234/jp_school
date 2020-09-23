@extends('layouts.admin_home')

@section('content')
<div class="container-fluid">    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="h3 mb-2 text-gray-800">Site Settings</h1>
        <p class="mb-4">Update Site Settings.</p>    
        <ol class="breadcrumb">
            <li><a href="{{route('admin.settings.index')}}"><i class="fa fa-dashboard"></i> Site Settings&nbsp;</a></li> /
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
    @if($errors->any())
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
            @foreach($errors->all() as $error)
                <strong>Error!!!</strong> {{ $error }}
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">       
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Site Settings</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive overflow-hidden"> 

                <form name="formEdit" id="frmEdit" action="{{route('admin.settings.update',$siteSettings->id)}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Site Title</label>
                        <input type="text" name="site_title" id="site_title" class="form-control" value="{{ $siteSettings->title }}">
                    </div>
                    <div class="form-group">
                        <label>Meta Description</label>
                        <textarea name="meta_desc" rows="5" id="meta_desc" class="form-control">{{ $siteSettings->meta_desc }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Meta Keyword</label>
                        <textarea name="meta_key" id="meta_key" class="form-control">{{ $siteSettings->meta_key }}</textarea>
                    </div>                   
                   
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('admin.settings.index')}}" class="btn btn-secondary" role="button" aria-pressed="true">Cancel</a>
                        </div>
                    </div>           
                </form>        
            </div>
        </div>  
    </div>      
</div>
        
@endsection