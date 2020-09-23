@extends('layouts.admin_home')

@section('content')
<div class="container-fluid">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="h3 mb-2 text-gray-800">Email Templates</h1>
        <p class="mb-4">Add, Edit, Delete Email Templates.</p>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard / </a></li>
            <li class="active">&nbsp;Email Templates Management</li>
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
          <h6 class="m-0 font-weight-bold text-primary d-inline">Email Templates</h6> 
        
        </div>        

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                     <th>Title</th>
					<th>Action</th>	
                    </tr>
                </thead>                
                <tbody>
                @if (count($email_templates) > 0)   
                @foreach ($email_templates as $email_template)
                <tr> 
                    <td width="70%">{!! strip_tags($email_template->template_title) !!}</td>
                   
                    <td>            
                        <a class="btn btn-primary" href="{{ route('admin.email_templates.edit',$email_template->id) }}">Edit</a>
                        
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