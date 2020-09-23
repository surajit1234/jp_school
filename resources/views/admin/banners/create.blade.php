@extends('layouts.admin_home')

@section('content')
<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="h3 mb-2 text-gray-800">Banners</h1>
        <p class="mb-4">Create Banner</a></p>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.banners.index')}}"><i class="fa fa-dashboard"></i> Banner Management</a> /</li>
            <li class="active">&nbsp;Create</li>
        </ol>
    </section>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Banner</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive overflow-hidden">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-warning">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form name="frmCreate" id="frmCreate" action="{{route('admin.banners.store')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }} 
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="banner_title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Upload Banner</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="radio" name="status" value="1" checked>Active
                        <input type="radio" name="status" value="0" >Inactive          
                    </div>           
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('admin.banners.index')}}" class="btn btn-secondary" role="button" aria-pressed="true">Cancel</a>
                        </div>
                    </div>  
                </form>
            </div>
        </div>                
    </div>

    <script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector : "textarea",
            height: 300,
            plugins: 'image code',
            toolbar: 'undo redo | image code'
        });
    </script>  
</div>      
@endsection