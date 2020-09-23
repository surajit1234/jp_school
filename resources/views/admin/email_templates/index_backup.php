@extends('layouts.admin_home')

@section('content')
    <!-- Content Header (Page header) -->
	<link href="{{ asset('css/custom.css') }}" media="all" rel="stylesheet" type="text/css" />
    <section class="content-header">
        <!-- <h1>Content Management<small>Version 1.0</small>
        </h1> -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Email Templates</li>
        </ol>
    </section>

    <div class="admin-right-panel">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Title</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($email_templates as $email_template)
                <tr> 
                    <td>{{ strip_tags($email_template->template_title) }}</td>
                    <td>            
                        <a class="btn btn-primary" href="{{ route('email_templates.edit',$email_template->id) }}">Edit</a>                        
                    </td>
                </tr>
                @endforeach              
            </tbody>        
        </table>
    </div>    
@endsection