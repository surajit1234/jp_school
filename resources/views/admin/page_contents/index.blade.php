@extends('layouts.admin_home')

@section('content')
    <!-- Content Header (Page header) -->
<div class="container-fluid">
    <section class="content-header">
        <h1 class="h3 mb-2 text-gray-800">Content</h1>
        <p class="mb-4">Add, Edit, Delete Content.</p>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard / </a></li>
            <li class="active">&nbsp;Content Management</li>
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
          <h6 class="m-0 font-weight-bold text-primary d-inline">Content</h6>        
        </div>  
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <th>Page Name</th>                    
                      <th>Action</th>
                    </tr>
                </thead>                
                <tbody>
                @if (count($page_contents) > 0)   
               @foreach ($page_contents as $page_content)
                <tr> 
                    <td>{{ strip_tags($page_content->content_title) }}</td>
                    <td>            
                        <a class="btn btn-primary" href="{{ route('admin.page_contents.edit',$page_content->id) }}">Edit</a>                       
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