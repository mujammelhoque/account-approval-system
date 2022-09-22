@extends('firstuser.layout')
@section('pagecontent')
    <!-- page content -->
    <div class="right_col" role="main">
        <div >
       
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div>
                            @if ($message = Session::get('success'))
                            <br>
                            <div class="alert alert-success ">
                                <p>{{ $message }}</p>
                            </div>
                            @endif
                          </div>
                    
                        <div class="x_content">
                            <form  action="{{ route('approval-mattrix.store') }}" method="POST" >
                                @csrf
                          
                                <span class="section">Insert and Update approval condition Info</span>

                                @if ( auth()->user()->created_by == 0)
                                <input type="hidden" name="table_name" value="{{auth()->user()->username}}_approvalmatrix">
                                    
                                @else
                                @php
                                   $admin_username = App\Models\User::find(auth()->user()->created_by);
                                @endphp
                                <input type="hidden" name="table_name" value="{{$admin_username->username}}_approvalmatrix">
    
                                @endif

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">User<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control" name="user_id" >
                                            <option disabled selected> select user</option>
                                            <option value="{{ $adminuser->id }}">{{ $adminuser->username }} (you)</option>
                                       @forelse ($users as $user)
                                           <option value="{{ $user->id }}">{{ $user->username }}</option>
                                       @empty
                                           
                                       @endforelse
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="created_by" value="{{ auth()->user()->id }}">

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Lower Limit</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control date"  type="number" name="lower_limit" ></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Uper Limit Limit</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control date"  type="number" name="uper_limit" ></div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Designation</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control date"  type="text" name="designation" ></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Department</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="department" class="form-control">
                                            <option value="" disabled selected>select department</option>
                                            @forelse ($departmentData as $item)
                                            <option value="{{ $item->id }}">{{ $item->department }}</option>

                                            @empty
                                                
                                            @endforelse
                                        </select>
                                        </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Label</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="label" class="form-control">
                                            <option value="" disabled selected> Select</option>
                                            <option value="5">Label 5 (top)</option>
                                            <option value="4">Label 4 </option>
                                            <option value="3">Label 3</option>
                                            <option value="2">Label 2</option>
                                            <option value="1">Label 1</option>
                                            <option value="0">Finance Director</option>
                                        </select>
                                </div>
                                </div>


                                <input type="hidden" name="created_by" value="{{ auth()->user()->id }}">
                                
                               
                                <div class="mt-4">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
    
@endsection