@php
$sitewide_settings = false;
$manage_admins = false;
$manage_dental_Group_office_customers = false;
$manage_catalog = false;
$manage_role_permission = false;

if (in_array(Route::currentRouteName(), [
    'admin.settings.index',
    'admin.language.index'
    ])) {
  $sitewide_settings = true;
}

if (in_array(Route::currentRouteName(), [
    'admin.admin.index',
    'admin.admin.profile'
  ])) {
    $manage_admins = true;
}

if (in_array(Route::currentRouteName(), [
    'admin.roles.index',
    'admin.permissions.index',
  ])) {
    $manage_role_permission = true;
}

if (in_array(Route::currentRouteName(), [
    'admin.customer.dental-group',
    'admin.customer.dental-office',
    'admin.customer.registered',
    'admin.customer.guest',
    'admin.customer.get_dental_group',
    'admin.customer.view_dental_group',
    'admin.customer.dental-office',
    'admin.customer.view_dental_office',
    'admin.customer.get_guest_customer',
    'admin.customer.view_guest_customer',
    'admin.customer.view_registered_customer',
    'admin.customer.create-registered-customer',
    'admin.customer.create-guest-customer',
    'admin.customer.create-company-group',
    'admin.customer.create-office',
    'admin.customer.edit_dental_group',
    'admin.customer.edit_office',
    'admin.customer.edit_registered',
    'admin.customer.edit_guest',
  ])) {
    $manage_dental_Group_office_customers = true;
}

if (in_array(Route::currentRouteName(), [
	'admin.items',
    'admin.categories'
  ])) {
    $manage_catalog = true;
}

@endphp

<style type="text/css">
	.anchor_submenu_selected {
		background-color:#ececf6 !important;
		color: #222429 !important;
		display:block;
		font-weight: 600;
	}
</style>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Javascript::void(0);">
    <div class="sidebar-brand-icon">
      <!-- <i class="fas fa-laugh-wink"></i> -->
      <img src="{{asset('img/fg-logo.jpg')}}" height="50px">
    </div>
    <div class="sidebar-brand-text mx-3">School Management System</div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <!-- active -->
  <li class="nav-item">
    <a class="nav-link" href="{{route('admin.dashboard')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <li class="nav-item {{ ($manage_admins == true ? 'active' : '') }}">
    <a class="nav-link" href="{{route('admin.admin.index')}}">
      <i class="fas fa-user fa-cog"></i>
      <span>Admin Users</span></a>
  </li>  
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Site Settings</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
        <a class="collapse-item" href="{{route('admin.settings.index')}}">General</a>
        <a class="collapse-item" href="{{route('admin.banners.index')}}">Home Page Slider</a>
        <a class="collapse-item" href="{{route('admin.page_contents.index')}}">Page Contents</a>
        <a class="collapse-item" href="{{route('admin.email_templates.index')}}">Email Templates</a>
        <a class="collapse-item" href="{{route('admin.settings.index')}}">Successful Students</a>
        <a class="collapse-item" href="{{route('admin.settings.index')}}">School Events</a>
        <a class="collapse-item" href="{{route('admin.settings.index')}}">Teachers at Home Page</a> 
      </div>
    </div>
  </li>
	
  <!-- Divider -->
  <li class="nav-item mt-5">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
	  <i class="fas fa-power-off fa-sm fa-fw mr-2 text-gray-400"></i>
      <span>Logout</span></a>
  </li>
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
