@extends('layouts.admin_home')

@section('content')
<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="h3 mb-2 text-gray-800">Email Template Management</h1>
        <p class="mb-4">Edit</a></p>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.email_templates.index')}}"><i class="fa fa-dashboard"></i> Email Template Management</a> / </li>
            <li class="active">&nbsp;Edit</li>
        </ol>
    </section>
    @if ($message = Session::get('success'))
            <div class="alert alert-success">
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

    <div class="card shadow mb-4">       
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Email Template </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive overflow-hidden">  
           <form name="formEdit" id="frmEdit" action="{{route('admin.email_templates.update',$email_template->id)}}" method="POST">
                {{ csrf_field() }}
               
       

                <div class="tab-content mt-3">            
                        <div class="form-group">
                                <label>Template Title</label>
								<input type="text" class="form-control" value="{{old('template_title',$email_template->template_title)}}" placeholder="Template Title" name="template_title">
                            </div>
                                  
                </div>
				
				
				
				<div class="tab-content mt-3">                     
                            <div class="form-group">
                                <label>Template Content</label>
								<textarea name="template_content">{{old('template_content',$email_template->template_content)}}</textarea>
                            </div>
                                    
                </div>

              

               
                <div class="form-group row">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('admin.email_templates.index')}}" class="btn btn-secondary" role="button" aria-pressed="true">Cancel</a>
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