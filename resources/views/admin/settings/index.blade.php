@extends('layouts.admin.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!-- <h1>Banner Management<small>Version 1.0</small>
        </h1> -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Site Settings Management</li>
        </ol>
    </section>

    <div class="admin-right-panel"> 
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>&nbsp;</h2>
                </div>
                {{-- <div class="pull-right">
                    <a class="btn btn-success" href="{{route('clients.create')}}"> Add New Client Logo</a>
                </div> --}}
            </div>

            @if ($message = Session::get('success'))
                <div class="col-lg-12">
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                </div>
            @endif
            <div class="col-lg-12">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Address</th>
                      {{-- <th>Google Map Link</th> --}}
                      <th>Email</th>
                      <th>Twitter</th>
                      <th>Linked In</th>
                      <th>Instagram</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($siteSettings as $site)
                        <tr> 
                            <td width="40%">{{ $site->address }}</td>
                            {{-- <td width="10%">{{ $site->google_map_link }}</td> --}}
                            <td width="10%">{{ $site->site_email }}</td>
                            <td width="10%">{{ $site->twitter_link }}</td>
                            <td width="10%">{{ $site->linkedin_link }}</td>
                            <td width="10%">{{ $site->vimeo_link }}</td>
                            <td>            
                                <a class="btn btn-primary" href="{{ route('settings.edit',$site->id) }}">Edit</a>
                            </td>
                        </tr>
                        @endforeach              
                    </tbody>        
                </table>
            </div>
        </div>
    </div>    
@endsection