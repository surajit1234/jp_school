@extends('layouts.admin_home')

@section('content')
    <!-- Content Header (Page header) -->
	<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="h3 mb-2 text-gray-800">Content </h1>
        <p class="mb-4">Edit table</a></p>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.page_contents.index')}}"><i class="fa fa-dashboard"></i> Content Management</a> / </li>
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
          <h6 class="m-0 font-weight-bold text-primary"> Content Management</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive overflow-hidden">  
               <form name="formEdit" id="frmEdit" action="{{route('admin.page_contents.update',$page_content->id)}}" method="POST">
                {{ csrf_field() }}
				  <div class="form-group">
                <label>Page Title</label>
					<input type="text" class="form-control" value="{{old('page_title',$page_content->content_title)}}" placeholder="Page Name" name="page_title">
            </div>
                 <ul class="nav nav-tabs">
				
				    @if (count($languages) > 0)   
					@foreach ($languages as $language)
                  <li class="active">				  
                    <a class="nav-link active" data-toggle="tab" href="#lang_{!! strip_tags($language->id) !!}">{!! strip_tags($language->lang_name) !!}</a>
                  </li>
				    @endforeach  
					 @endif     	  
                </ul>

              

                <div class="tab-content  mt-3"> 
                @foreach($page_content->page_content_details as $page_content_detail)				
                    <div id="{{($page_content_detail->lang_id == 1?'english':'arabic')}}" class="{{($page_content_detail->lang_id == 1? 'tab-pane active': 'tab-pane fade')}}">
                        <div class="form-group">
                            <label>Short Description{{($page_content_detail->lang_id == 1?'(en)':'(ar-AE)')}}</label>
                            <textarea id="short_desc" class="form-control" name="short_desc[{{$page_content_detail->lang_id}}]">{{@$page_content->page_content_details[($page_content_detail->lang_id-1)]->short_desc}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Full Description{{($page_content_detail->lang_id == 1?'(en)':'(ar-AE)')}}</label>
                            <textarea class="form-control" name="full_desc[{{$page_content_detail->lang_id}}]">{{@$page_content->page_content_details[($page_content_detail->lang_id-1)]->long_desc}}</textarea>
                        </div>  
                    </div>
                @endforeach
				</div>   
                <div class="form-group row">
                    <div class="col-sm-4">
                          <button type="submit"  id="short_desc"  class="btn btn-primary">Submit</button>
                        <a href="{{route('admin.page_contents.index')}}" class="btn btn-secondary" role="button" aria-pressed="true">Cancel</a>
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