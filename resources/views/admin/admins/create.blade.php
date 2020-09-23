@extends('layouts.admin_home')

@section('content')
<style type="text/css">
    /* enable absolute positioning */
    /*.inner-addon {
      position: relative;
    }

    
    .inner-addon .glyphicon {
      position: absolute;
      padding: 10px;
      pointer-events: none;
    }

    
    .left-addon .glyphicon  { 
      left:  0px;
    }

    .right-addon .glyphicon { 
      right: 0px;
    }

   
    .left-addon input  { 
      padding-left:  30px; 
    }
    .right-addon input { 
      padding-right: 30px; 
    }*/
  .form-group.required .control-label:after{
     color: red;
     content: "*";
     position: absolute;
     margin-left: 5px;
  }

  .select2-container .select2-selection--single {
    height: 38px !important;
  }
</style>


<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="h3 mb-2 text-gray-800">Users</h1>
        <p class="mb-4">Create User</a></p>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.site_banners.index')}}"><i class="fa fa-dashboard"></i> User Management</a> /</li>
            <li class="active">&nbsp;Create</li>
        </ol>
    </section>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">User</h6>
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

                <form name="frmCreate" id="frmCreate" action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }} 
                    <div class="form-row">
                        <div class="form-group col-md-4 mb-1 required">
                          <label class="control-label">User Type</label>
                          <select name="user_type" id="user_type" class="form-control">
                            <!-- <option value="">Choose...</option> -->
                            <option value="group" @if(old('user_type') == 'group') {{'selected'}} @endif>Group Admin</option>
                            <option value="office" @if(old('user_type') == 'office') {{'selected'}} @endif>Office Admin</option>
                            <option value="guest" @if(old('user_type') == 'guest') {{'selected'}} @endif>Guest User</option>
                          </select>
                          @if($errors->user->first('user_type'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('user_type') }}
                          </span>
                          @endif
                        </div>
                        <!-- If not New Company, Show Group Admin Company Dropdown/Group Office Dropdown -->
                        <div class="form-group col-md-4 mb-1 required @if(old('new_or_existing') == 1 || old('user_type') == 'office') {{'d-none'}}  @endif" id="div_company_group">
                          <label class="control-label">Company Group</label>
                          <select name="company_group" id="company_group" class="form-control">
                            <option value="">Choose...</option>
                            @foreach($group_users as $group_user)
                              <option value="{{$group_user->id}}">{{$group_user->customer_name}}</option>
                            @endforeach
                          </select>
                          @if($errors->user->first('company_group'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('company_group') }}
                          </span>
                          @endif 
                        </div>   
                        <div class="form-group col-md-4 mb-1 required 
                        @if(old('new_or_existing') == '1' || old('user_type') == '' || old('user_type') == 'group') 
                          {{'d-none'}} 
                        @elseif(old('user_type') == 'office') 
                          {{'d-block 111'}}
                        @endif" id="div_office_group">
                          <label class="control-label">Office Group</label>  
                          <select name="office_group" id="office_group" class="form-control">
                            <option value="">Choose...</option>
                          </select>
                          @if($errors->user->first('office_group'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('office_group') }}
                          </span>
                          @endif                        
                        </div>             
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                          <div class="form-check">                            
                            <input class="form-check-input" type="checkbox" name="new_or_existing" value="1" @if(old('new_or_existing') == 1) {{'checked'}} @endif>
                            <label class="form-check-label" for="gridCheck">New Company</label> 
                          </div>
                      </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 mb-0">
                          <h6 class="font-weight-bold text-primary mt-3"><i class="fa fa-info-circle" aria-hidden="true"></i> Personal Information</h6><hr>
                        </div>  
                        <div class="form-group col-md-3 required">
                          <label class="control-label">Customer Name</label>
                          <input type="text" class="form-control" name="customer_name" value="{{old('customer_name')}}">
                          @if($errors->user->first('customer_name'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('customer_name') }}
                          </span>
                          @endif                          
                        </div>
                        <div class="form-group col-md-3 required">
                          <label class="control-label">Login Email</label>
                          <input type="text" class="form-control" name="email" value="{{old('email')}}">
                          @if($errors->user->first('email'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('emails') }}
                          </span>
                          @endif                          
                        </div>
                        <div class="form-group col-md-3 required">
                          <label class="control-label">Password</label>
                          <input type="password" name="password" class="form-control">
                          @if($errors->user->first('password'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('password') }}
                          </span>
                          @endif
                        </div>
                        <div class="form-group col-md-3 required">
                          <label class="control-label">Retype Password</label>
                          <input type="password" class="form-control" name="password_confirmation">
                          @if($errors->user->first('password_confirmation'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('password_confirmation') }}
                          </span>
                          @endif
                        </div>                        
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-12  mb-0">
                          <h6 class="font-weight-bold text-primary mt-3"><i class="fa fa-industry" aria-hidden="true"></i> Company Information</h6><hr>
                        </div>  
                        <div class="form-group col-md-4">
                          <label class="control-label">Company Name</label>
                          <input type="text" class="form-control" name="company_name" value="{{old('company_name')}}">
                          
                          {{--
                          @if($errors->user->first('company_name'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('company_name') }}
                          </span>
                          @endif
                          --}}
                        </div>                        
                        <div class="form-group col-md-4 required">
                          <label class="control-label">Email</label>
                          <input type="text" class="form-control" name="email" value="{{old('email')}}">
                          @if($errors->user->first('email'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('email') }}
                          </span>
                          @endif
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label">Web</label>
                          <input type="text" class="form-control" name="web" value="{{old('web')}}">
                        </div>
                        <div class="form-group col-md-4 required">
                          <label class="control-label">Phone1</label>
                          <input type="text" class="form-control" name="phone_1" value="{{old('phone_1')}}">
                          @if($errors->user->first('phone_1'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('phone_1') }}
                          </span>
                          @endif
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label">Phone2</label>
                          <input type="text" class="form-control" name="phone_2" value="{{old('phone_2')}}">
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label">Fax</label>
                          <input type="text" class="form-control" name="fax" value="{{old('fax')}}">
                        </div>
                        <div class="form-group col-md-4 required">
                          <label class="control-label">Address Line 1</label>                          
                          <textarea name="address_1" class="form-control" rows="5" placeholder="1234 Main St">{{old('address_1')}}</textarea>
                          @if($errors->user->first('address_1'))
                            <span class="help-block text-danger">
                              {{ $errors->user->first('address_1') }}
                            </span>
                          @endif
                        </div>                        
                        <div class="form-group col-md-4 required">
                            <label class="control-label">Address Line 2</label>                           
                            <textarea name="address_2" class="form-control" rows="5" placeholder="Apartment, studio, or floor">{{old('address_2')}}</textarea>
                            @if($errors->user->first('address_2'))
                              <span class="help-block text-danger">
                                {{ $errors->user->first('address_2') }}
                              </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4"></div>
                        <div class="form-group col-md-3 required">
                          <label class="control-label">City</label>
                          <input type="text" class="form-control" name="city" value="{{old('city')}}">
                          @if($errors->user->first('city'))
                            <span class="help-block text-danger">
                              {{ $errors->user->first('city') }}
                            </span>
                          @endif
                        </div>
                        <div class="form-group col-md-3 required">
                          <label class="control-label">State</label>
                          <input type="text" class="form-control" name="state" value="{{old('state')}}">
                          @if($errors->user->first('state'))
                            <span class="help-block text-danger">
                              {{ $errors->user->first('state') }}
                            </span>
                          @endif
                        </div>
                        <div class="form-group col-md-2 required">
                          <label class="control-label">Postal Code</label>
                          <input type="text" class="form-control" name="zip" value="{{old('zip')}}">
                          @if($errors->user->first('zip'))
                            <span class="help-block text-danger">
                              {{ $errors->user->first('zip') }}
                            </span>
                          @endif
                        </div>
                        <div class="form-group col-md-4 required">
                            <label class="control-label">Country</label>
                            <div class="input-group">
                                <!-- py-2 border-right-0 border -->
                                <input class="form-control" name="country" value="{{old('country')}}">
                                <!-- <span class="input-group-append">
                                    <div class="input-group-text bg-transparent"><i class="fa fa-search"></i></div>
                                </span> -->
                            </div> 
                            @if($errors->user->first('country'))
                            <span class="help-block text-danger">
                              {{ $errors->user->first('country') }}
                            </span>
                            @endif 
                        </div>
                    </div>                     
                    
                    <!-- Billing Address -->
                    <div class="form-row">
                        <div class="form-group col-md-12 mb-0  mt-3">
                          <h6 class="font-weight-bold text-primary d-inline"><i class="fa fa-address-card" aria-hidden="true"></i> Billing Addresses</h6>
                          <div class="form-check d-inline float-right">
                            <input class="form-check-input" type="checkbox" name="same_company_information" value="1" @if( old('same_company_information')== 1) {{'checked'}} @endif>
                            <label class="form-check-label" for="gridCheck">Same as Company Information</label> 
                          </div>
                          <hr>
                        </div>  
                        <div class="form-group col-md-4">
                          <label class="control-label">Company Name</label>
                          <input type="text" class="form-control" name="bill_company_name" value="{{old('bill_company_name')}}">
                          
                          {{--
                          @if($errors->user->first('bill_company_name'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('bill_company_name') }}
                          </span>
                          @endif
                          --}}
                        </div>                        
                        <div class="form-group col-md-4 required">
                          <label class="control-label">Email</label>
                          <input type="text" class="form-control" name="bill_email" value="{{old('bill_email')}}">
                          @if($errors->user->first('email'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('email') }}
                          </span>
                          @endif
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label">Web</label>
                          <input type="text" class="form-control" name="bill_web" value="{{old('bill_web')}}">
                        </div>
                        <div class="form-group col-md-4 required">
                          <label class="control-label">Phone1</label>
                          <input type="text" class="form-control" name="bill_phone1" value="{{old('bill_phone1')}}">
                          @if($errors->user->first('bill_phone1'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('bill_phone1') }}
                          </span>
                          @endif
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label">Phone2</label>
                          <input type="text" class="form-control" name="bill_phone2" value="{{old('bill_phone2')}}">
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label">Fax</label>
                          <input type="text" class="form-control" name="bill_fax" value="{{old('bill_fax')}}">
                        </div>
                        <div class="form-group col-md-4 required">
                          <label class="control-label">Address Line 1</label>                          
                          <textarea name="bill_address_1" class="form-control" placeholder="1234 Main St" rows="5">{{old('bill_address_1')}}</textarea>
                          @if($errors->user->first('bill_address_1'))
                            <span class="help-block text-danger">
                              {{ $errors->user->first('bill_address_1') }}
                            </span>
                          @endif
                        </div>
                        <div class="form-group col-md-4 required">
                            <label class="control-label">Address Line 2</label>                            
                            <textarea name="bill_address_2" class="form-control" placeholder="Apartment, studio, or floor" rows="5">{{old('bill_address_2')}}</textarea>
                            @if($errors->user->first('bill_address_2'))
                              <span class="help-block text-danger">
                                {{ $errors->user->first('bill_address_2') }}
                              </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4"></div>
                        <div class="form-group col-md-3 required">
                          <label class="control-label">City</label>
                          <input type="text" class="form-control" name="bill_city" value="{{old('bill_city')}}">
                          @if($errors->user->first('bill_city'))
                            <span class="help-block text-danger">
                              {{ $errors->user->first('bill_city') }}
                            </span>
                          @endif
                        </div>
                        <div class="form-group col-md-3 required">
                          <label class="control-label">State</label>
                          <input type="text" class="form-control" name="bill_state" value="{{old('bill_state')}}">
                          @if($errors->user->first('bill_state'))
                            <span class="help-block text-danger">
                              {{ $errors->user->first('bill_state') }}
                            </span>
                          @endif
                        </div>
                        <div class="form-group col-md-2 required">
                          <label class="control-label">Postal Code</label>
                          <input type="text" class="form-control" name="bill_zip" value="{{old('bill_zip')}}">
                          @if($errors->user->first('bill_zip'))
                            <span class="help-block text-danger">
                              {{ $errors->user->first('bill_zip') }}
                            </span>
                          @endif
                        </div>
                        <div class="form-group col-md-4 required">
                            <label class="control-label">Country</label>
                            <div class="input-group">
                                <!-- py-2 border-right-0 border -->
                                <input class="form-control" name="bill_country" value="{{old('bill_country')}}">
                                <!-- <span class="input-group-append">
                                    <div class="input-group-text bg-transparent"><i class="fa fa-search"></i></div>
                                </span> -->
                            </div> 
                            @if($errors->user->first('bill_country'))
                            <span class="help-block text-danger">
                              {{ $errors->user->first('bill_country') }}
                            </span>
                            @endif 
                        </div>
                    </div>
                    
                    <!-- Shipping Address -->
                    <div class="form-row">
                        <div class="form-group col-md-12 mb-0 mt-3">
                          <h6 class="font-weight-bold text-primary d-inline"><i class="fa fa-truck" aria-hidden="true"></i> Shipping Addresses</h6>
                          <div class="form-check d-inline float-right">
                            <input class="form-check-input" type="checkbox" name="ship_same_bill_information" value="1" @if( old('ship_same_bill_information')== 1) {{'checked'}} @endif>
                            <label class="form-check-label" for="gridCheck">Same as Billing Information</label> 
                          </div>
                          <div class="form-check d-inline float-right mr-3">
                            <input class="form-check-input" type="checkbox" name="ship_same_company_information" value="1" @if( old('ship_same_company_information')== 1) {{'checked'}} @endif>      
                            <label class="form-check-label" for="gridCheck">Same as Company Information</label> 
                          </div>
                          <hr>
                        </div>  
                        <div class="form-group col-md-4 required">
                          <label class="control-label">Company Name</label>
                          <input type="text" class="form-control" name="ship_company_name" value="{{old('ship_company_name')}}">
                          @if($errors->user->first('ship_company_name'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('ship_company_name') }}
                          </span>
                          @endif
                        </div>                        
                        <div class="form-group col-md-4 required">
                          <label class="control-label">Email</label>
                          <input type="text" class="form-control" name="ship_email" value="{{old('ship_email')}}">
                          @if($errors->user->first('ship_email'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('ship_email') }}
                          </span>
                          @endif
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label">Web</label>
                          <input type="text" class="form-control" name="ship_web" value="{{old('ship_web')}}">
                        </div>
                        <div class="form-group col-md-4 required">
                          <label class="control-label">Phone1</label>
                          <input type="text" class="form-control" name="ship_phone1" value="{{old('ship_phone1')}}">
                          @if($errors->user->first('ship_phone1'))
                          <span class="help-block text-danger">
                            {{ $errors->user->first('ship_phone1') }}
                          </span>
                          @endif
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label">Phone2</label>
                          <input type="text" class="form-control" name="ship_phone2" value="{{old('ship_phone2')}}">
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label">Fax</label>
                          <input type="text" class="form-control" name="ship_fax" value="{{old('ship_fax')}}">
                        </div>
                        <div class="form-group col-md-4 required">
                          <label class="control-label">Address Line 1</label>                          
                          <textarea name="ship_address_1" class="form-control" placeholder="1234 Main St" rows="5">{{old('ship_address_1')}}</textarea>
                          @if($errors->user->first('ship_address_1'))
                            <span class="help-block text-danger">
                              {{ $errors->user->first('ship_address_1') }}
                            </span>
                          @endif
                        </div>
                        <div class="form-group col-md-4 required">
                            <label class="control-label">Address Line 2</label>                            
                            <textarea name="ship_address_2" class="form-control" placeholder="Apartment, studio, or floor" rows="5">{{old('ship_address_2')}}</textarea>
                            @if($errors->user->first('ship_address_2'))
                              <span class="help-block text-danger">
                                {{ $errors->user->first('ship_address_2') }}
                              </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4"></div>
                        <div class="form-group col-md-3 required">
                          <label class="control-label">City</label>
                          <input type="text" class="form-control" name="ship_city" value="{{old('ship_city')}}">
                          @if($errors->user->first('ship_city'))
                            <span class="help-block text-danger">
                              {{ $errors->user->first('ship_city') }}
                            </span>
                          @endif
                        </div>
                        <div class="form-group col-md-3 required">
                          <label class="control-label">State</label>
                          <input type="text" class="form-control" name="ship_state" value="{{old('ship_state')}}">
                          @if($errors->user->first('ship_state'))
                            <span class="help-block text-danger">
                              {{ $errors->user->first('ship_state') }}
                            </span>
                          @endif
                        </div>
                        <div class="form-group col-md-2 required">
                          <label class="control-label">Postal Code</label>
                          <input type="text" class="form-control" name="ship_zip" value="{{old('ship_zip')}}">
                          @if($errors->user->first('ship_zip'))
                            <span class="help-block text-danger">
                              {{ $errors->user->first('ship_zip') }}
                            </span>
                          @endif
                        </div>
                        <div class="form-group col-md-4 required">
                            <label class="control-label">Country</label>
                            <div class="input-group">
                                <!-- py-2 border-right-0 border -->
                                <input class="form-control" name="ship_country" value="{{old('ship_country')}}">
                                <!-- <span class="input-group-append">
                                    <div class="input-group-text bg-transparent"><i class="fa fa-search"></i></div>
                                </span> -->
                            </div> 
                            @if($errors->user->first('ship_country'))
                            <span class="help-block text-danger">
                              {{ $errors->user->first('ship_country') }}
                            </span>
                            @endif 
                        </div>
                    </div>                   
                                       
                    <!-- <div class="form-group">
                        <label class="control-label">Status</label>
                        <input type="radio" name="status" value="1" checked>Active
                        <input type="radio" name="status" value="0" >Inactive          
                    </div> 
                    -->           
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <button type="submit" value="submit" class="btn btn-primary __no_sync">Submit</button>
                            <button type="submit" value="submit_sync" class="btn btn-primary __acumatica_syc">Submit & Sync to Acumatica</button>
                            <a href="{{route('admin.user.index')}}" class="btn btn-secondary" role="button" aria-pressed="true">Cancel</a>
                        </div>
                    </div>  
                </form>
            </div>
        </div>                
    </div> 
</div> 

<script type="text/javascript">
  $(document).ready(function() {
      //If User is a New Company he had to select Group or Office
      //depending on User Type
      $('input[name="new_or_existing"]').click(function() {
          if ( $(this).prop("checked") == false ) {            
            //alert($("#user_type option:selected").val());
            //if User Type = Group
            if ($("#user_type option:selected").val() == "group" ) {
              $("#div_company_group").removeClass("d-block");
              $("#div_company_group").removeClass("d-none");
              $("#company_group").val("");
              $("#company_group").select2();
            }
            //if User Type = office
            if ($("#user_type option:selected").val() == "office" ) {
              $("#div_office_group").removeClass("d-block");
              $("#div_office_group").removeClass("d-none");
              $("#office_group").val("");
              $("#office_group").select2();
            }
            //If User Type = Guest
            if ($("#user_type option:selected").val() == "guest" ) {
              $("#div_office_group").removeClass("d-block");
              $("#div_office_group").removeClass("d-none");
              $("#office_group").val("");
              $("#office_group").select2();
            }
          } else {
            $("#div_company_group").addClass("d-none");
            $("#div_office_group").addClass("d-none");
          }  
      });

      //User Type Select Box Value on Change
      $("#user_type").on('change',function(){
          if ( $('input[name="new_or_existing"]').prop("checked") == false ) {
            
            if ( $(this).val() == "group" ) {              
              $("#div_company_group").removeClass("d-none");
              $("#company_group").val("");
              $("#company_group").select2();
              if (!$("#div_office_group").hasClass("d-none")) {
                $("#div_office_group").addClass("d-none");
                $("#div_office_group").removeClass("d-block");
              }
            }

            //if User Type = office
            if ( $(this).val() == "office" ) {              
              $("#div_office_group").removeClass("d-none");
              $("#office_group").val("");
              $("#office_group").select2();
              if (!$("#div_company_group").hasClass("d-none")) {
                $("#div_company_group").addClass("d-none");
                $("#div_company_group").removeClass("d-block");
              }
            }

            //If User Type = Guest
            if ( $(this).val() == "guest" ) {
              //$("#div_office_group").removeClass("d-block");
              $("#div_office_group").removeClass("d-none");
              $("#office_group").val("");
              $("#office_group").select2();              
            }
          } else {
            $("#div_company_group").addClass("d-none");
            $("#div_office_group").addClass("d-none");
          }
      });      

      //Checkbox at Biiling Address
      $('input[name="same_company_information"]').click(function() {
          if ( $(this).prop("checked") == true ) {
            //Assign Value to Billing Address
            var customer_name =  $("input[name='customer_name']").val();
            var company_name =  $("input[name='company_name']").val();
            var email = $("input[name='email']").val(); 
            var web = $("input[name='web']").val();   
            var phone_1 = $("input[name='phone_1']").val();
            var phone_2 = $("input[name='phone_2']").val();
            var fax = $("input[name='fax']").val();
            var address_1 = $("textarea[name='address_1']").val();
            var address_2 = $("textarea[name='address_2']").val();
            var city = $("input[name='city']").val();
            var state = $("input[name='state']").val();
            var zip =  $("input[name='zip']").val();
            var country = $("input[name='country']").val();

            $("input[name='bill_company_name']").val(company_name);
            $("input[name='bill_email']").val(email);
            $("input[name='bill_web']").val(web);
            $("input[name='bill_phone1']").val(phone_1);
            $("input[name='bill_phone2']").val(phone_2);
            $("input[name='bill_fax']").val(fax);
            $("textarea[name='bill_address_1']").val(address_1);
            $("textarea[name='bill_address_2']").val(address_2);
            $("input[name='bill_city']").val(city);
            $("input[name='bill_state']").val(state);
            $("input[name='bill_zip']").val(zip);
            $("input[name='bill_country']").val(country);
          } else {
            //Remove Value from Billing Address
            $("input[name='bill_company_name']").val("");
            $("input[name='bill_email']").val("");
            $("input[name='bill_web']").val("");
            $("input[name='bill_phone1']").val("");
            $("input[name='bill_phone2']").val("");
            $("input[name='bill_fax']").val("");
            $("textarea[name='bill_address_1']").val("");
            $("textarea[name='bill_address_2']").val("");
            $("input[name='bill_city']").val("");
            $("input[name='bill_state']").val("");
            $("input[name='bill_zip']").val("");
            $("input[name='bill_country']").val("");
          }
      });

      //Checkbox at Shipping Address(Same as Company Information)
      jQuery('input[name="ship_same_company_information"]').click(function() {
          if ( jQuery(this).prop("checked") == true ) {
            jQuery('input[name="ship_same_bill_information"]').prop("checked",false);

            //Assign Value to Billing Address
            var customer_name =  $("input[name='customer_name']").val();
            var company_name =  $("input[name='company_name']").val();
            var email = $("input[name='email']").val(); 
            var web = $("input[name='web']").val();   
            var phone_1 = $("input[name='phone_1']").val();
            var phone_2 = $("input[name='phone_2']").val();
            var fax = $("input[name='fax']").val();
            var address_1 = $("textarea[name='address_1']").val();
            var address_2 = $("textarea[name='address_2']").val();
            var city = $("input[name='city']").val();
            var state = $("input[name='state']").val();
            var zip =  $("input[name='zip']").val();
            var country = $("input[name='country']").val();

            $("input[name='ship_company_name']").val(company_name);
            $("input[name='ship_email']").val(email);
            $("input[name='ship_web']").val(web);
            $("input[name='ship_phone1']").val(phone_1);
            $("input[name='ship_phone2']").val(phone_2);
            $("input[name='ship_fax']").val(fax);
            $("textarea[name='ship_address_1']").val(address_1);
            $("textarea[name='ship_address_2']").val(address_2);
            $("input[name='ship_city']").val(city);
            $("input[name='ship_state']").val(state);
            $("input[name='ship_zip']").val(zip);
            $("input[name='ship_country']").val(country);
          } else {
            //Remove Value from Billing Address
            $("input[name='ship_company_name']").val("");
            $("input[name='ship_email']").val("");
            $("input[name='ship_web']").val("");
            $("input[name='ship_phone1']").val("");
            $("input[name='ship_phone2']").val("");
            $("input[name='ship_fax']").val("");
            $("textarea[name='ship_address_1']").val("");
            $("textarea[name='ship_address_2']").val("");
            $("input[name='ship_city']").val("");
            $("input[name='ship_state']").val("");
            $("input[name='ship_zip']").val("");
            $("input[name='ship_country']").val("");
          }
      });

      //Checkbox at Shipping Address(Same as Billing Address)
      jQuery('input[name="ship_same_bill_information"]').click(function() {
          if ( jQuery(this).prop("checked") == true ) {
            jQuery('input[name="ship_same_company_information"]').prop("checked",false);

            //Assign Value to Billing Address
            //var customer_name =  $("input[name='customer_name']").val();
            var company_name =  $("input[name='bill_company_name']").val();
            var email = $("input[name='bill_email']").val(); 
            var web = $("input[name='bill_web']").val();   
            var phone_1 = $("input[name='bill_phone1']").val();
            var phone_2 = $("input[name='bill_phone2']").val();
            var fax = $("input[name='fax']").val();
            var address_1 = $("textarea[name='bill_address_1']").val();
            var address_2 = $("textarea[name='bill_address_2']").val();
            var city = $("input[name='bill_city']").val();
            var state = $("input[name='bill_state']").val();
            var zip =  $("input[name='bill_zip']").val();
            var country = $("input[name='bill_country']").val();

            $("input[name='ship_company_name']").val(company_name);
            $("input[name='ship_email']").val(email);
            $("input[name='ship_web']").val(web);
            $("input[name='ship_phone1']").val(phone_1);
            $("input[name='ship_phone2']").val(phone_2);
            $("input[name='ship_fax']").val(fax);
            $("textarea[name='ship_address_1']").val(address_1);
            $("textarea[name='ship_address_2']").val(address_2);
            $("input[name='ship_city']").val(city);
            $("input[name='ship_state']").val(state);
            $("input[name='ship_zip']").val(zip);
            $("input[name='ship_country']").val(country);
          } else {
            //Remove Value from Billing Address
            $("input[name='ship_company_name']").val("");
            $("input[name='ship_email']").val("");
            $("input[name='ship_web']").val("");
            $("input[name='ship_phone1']").val("");
            $("input[name='ship_phone2']").val("");
            $("input[name='ship_fax']").val("");
            $("textarea[name='ship_address_1']").val("");
            $("textarea[name='ship_address_2']").val("");
            $("input[name='ship_city']").val("");
            $("input[name='ship_state']").val("");
            $("input[name='ship_zip']").val("");
            $("input[name='ship_country']").val("");
          }
      });
  });
</script>     
@endsection