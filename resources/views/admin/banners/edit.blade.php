@extends('layouts.admin_home')

@section('content')
<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="h3 mb-2 text-gray-800">Home Page Banner Video</h1>
        <p class="mb-4">Edit Home Page Banner Video</a></p>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.banners.index')}}"><i class="fa fa-dashboard"></i> Banner Management</a> / </li>
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
          <h6 class="m-0 font-weight-bold text-primary">Home Page Banner Video</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive overflow-hidden">  
            <form name="formEdit" id="frmEdit" action="{{route('admin.banners.update',$banner->id)}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="old_banner_image" value="{{$banner->image}}">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="banner_title" class="form-control" value="{{old('banner_title',$banner->title)}}">
                </div>                
                <div class="form-group">
                <label for="inputEmail4">Banner Image</label>
                  <div class="profile-header-container">   
                      <div class="profile-header-img">
                          @if (($banner->image != "") && (\Storage::disk('public')->exists('home_banner/'.$banner->image)))
                          <img height="100px" class="img-profile rounded-circle" src="{{Storage::disk('public')->url('home_banner/'.$banner->image)}}" />
                          @else 
                          <img height="100px" class="img-profile rounded-circle" src="{{asset('img/no-image-icon.png')}}" />
                          @endif
                      </div>
                  </div> 
                </div>
                <div class="form-group">
                    <label>Upload Banner</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <input type="radio" name="status" value="1" @if(@$banner->status == 1) checked @endif>Active
                    <input type="radio" name="status" value="0" @if(@$banner->status == 0) checked @endif>Inactive          
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
            automatic_uploads: true,
            //file_picker_types: 'file image media',
            images_upload_url: "{{route('admin.banners.upload_file')}}",
            height: 400,
            file_picker_types: 'file image media',  
            media_live_embeds: true,
            plugins: 'image code media',
            toolbar: 'undo redo | image code media',
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', "{{route('admin.banners.upload_file')}}");                
                var token = $('meta[name="csrf-token"]').attr('content');                
                xhr.setRequestHeader("X-CSRF-Token", token);
                xhr.onload = function() {
                    var json;
                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    success(json.location);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            },
            file_picker_callback: function(cb, value, meta) {
                //alert("hi");
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                //input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    //alert("hi");
                    var file = this.files[0];
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var blobInfo = blobCache.create(id, file);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                input.click();
            }
        });
    </script>
</div>    
@endsection