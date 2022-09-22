       {{-- .start  second user modal --}}   
         
    
    @if ( auth()->user()->created_by == 0)
    @php
        $table = auth()->user()->username;
        $departmentTable =$table.'_department';
 
    @endphp
        
    @else
    @php
       $admin_username = App\Models\User::find(auth()->user()->created_by);
       $table = $admin_username->username;
        $departmentTable =$table.'_department';
   
    @endphp
       @endif

            @php
   $departments = DB::table($departmentTable)->get();
       @endphp
  <!-- The Modal -->
  <div class="modal fade" id="seconduser">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create New User </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
    
        <!-- Modal body -->
        <div class="modal-body">
     
            <form  action="{{route('CreateUser')}}" method="POST">
                @csrf

                <div class="row mb-3">
                    <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('User Name') }}</label>

                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="org_name" value="{{auth()->user()->org_name}}">
                <input type="hidden" name="access_roll" value="2">
                <input type="hidden" name="created_by" value="{{auth()->user()->id}}">
       

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="department" class="col-md-4 col-form-label text-md-end">Department</label>
                    <div class="col-md-6">
                    <select name="department" id="department" class="form-control">
                      <option readonly  value="">Select One</option>
                     @forelse ($departments as $department)
                     <option value="{{ $department->id }}">{{ $department->department }}</option>
                         
                     @empty
                         
                     @endforelse
                    </select>
                    @error('finance_justifier')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
                  </div>

                <div class="row mb-3">
                    <label for="finance_justifier" class="col-md-4 col-form-label text-md-end">{{ __('finance justifier') }}</label>

                    <div class="col-md-6">
                        {{-- <input id="finance_justifier" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" > --}}
                        <select name="finance_justifier" id="finance_justifier" class="form-control @error('finance_justifier') is-invalid @enderror"  required autocomplete="finance_justifier">
                            <option value="" disabled selected>Select one</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>

                        @error('finance_justifier')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  </div>
    {{-- end second user modal --}}
       {{-- .start  Department modal --}}   
     

  <!-- The Modal -->
  <div class="modal fade" id="departmentModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create New Department </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
    
        <!-- Modal body -->
        <div class="modal-body">
     
            <form  action="{{route('create-department')}}" method="POST">
                @csrf

                <div class="row mb-3">
                    <label for="department" class="col-md-4 col-form-label text-md-end">{{ __('Department Name') }}</label>

                    <div class="col-md-6">
                        <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autocomplete="department" autofocus>

                        @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
       



        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  </div>
    {{-- end second user modal --}}

          {{-- .start modal for In-Expen --}}   
        <!-- The Modal -->
        <div class="modal fade" id="createInExpen">
            <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Income Expenditure </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                
                @if ( auth()->user()->created_by == 0)
                    @php
                        $UserRoute = route('firstusers.store');
                    @endphp
                @else
                @php
                         $UserRoute = route('secondusers.store');
                @endphp

                @endif
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form  action="{{$UserRoute}}" method="POST">
                        @csrf

                        @if ( auth()->user()->created_by == 0)
                            <input type="hidden" name="table_name" value="{{auth()->user()->username}}_income_expense">
                                
                            @else
                            @php
                               $admin_username = App\Models\User::find(auth()->user()->created_by);
                            @endphp
                            <input type="hidden" name="table_name" value="{{$admin_username->username}}_income_expense">

                            @endif
               

                        <div class="row mb-3">
                            <label for="credit_voucher_number" class="col-md-4 col-form-label text-md-end">{{ __('Credit Voucher Number') }}</label>
        
                            <div class="col-md-6">
                                <input id="credit_voucher_number" type="number" class="form-control @error('credit_voucher_number') is-invalid @enderror" name="credit_voucher_number" value="{{ old('credit_voucher_number') }}" required autocomplete="credit_voucher_number" autofocus>
        
                                @error('credit_voucher_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="debit_voucher_number" class="col-md-4 col-form-label text-md-end">{{ __('Debit Voucher Number') }}</label>
        
                            <div class="col-md-6">
                                <input id="debit_voucher_number" type="number" class="form-control @error('debit_voucher_number') is-invalid @enderror" name="debit_voucher_number" value="{{ old('debit_voucher_number') }}" required autocomplete="debit_voucher_number" autofocus>
        
                                @error('debit_voucher_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                   
        
                        <div class="row mb-3">
                            <label for="expenditure_item" class="col-md-4 col-form-label text-md-end">{{ __('Expenditure Item') }}</label>
        
                            <div class="col-md-6">
                                <input id="expenditure_item" type="text" class="form-control @error('expenditure_item') is-invalid @enderror" name="expenditure_item" value="{{ old('expenditure_item') }}" required autocomplete="expenditure_item">
        
                                @error('expenditure_item')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>
        
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="date">
        
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="particulars" class="col-md-4 col-form-label text-md-end">{{ __('Particulars') }}</label>
        
                            <div class="col-md-6">
                                <input id="particulars" type="text" class="form-control @error('particulars') is-invalid @enderror" name="particulars" required autocomplete="particulars">
        
                                @error('particulars')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="check_no" class="col-md-4 col-form-label text-md-end">{{ __('Check No') }}</label>
        
                            <div class="col-md-6">
                                <input id="check_no" type="text" class="form-control @error('check_no') is-invalid @enderror" name="check_no" required autocomplete="check_no">
        
                                @error('check_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="check_date" class="col-md-4 col-form-label text-md-end">{{ __('Check Date') }}</label>
        
                            <div class="col-md-6">
                                <input id="check_date" type="text" class="form-control @error('check_date') is-invalid @enderror" name="check_date" required autocomplete="check_date">
        
                                @error('check_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bank_check" class="col-md-4 col-form-label text-md-end">{{ __('Bank Check') }}</label>
        
                            <div class="col-md-6">
                                <input id="bank_check" type="text" class="form-control @error('bank_check') is-invalid @enderror" name="bank_check" required autocomplete="bank_check">
        
                                @error('bank_check')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="branch" class="col-md-4 col-form-label text-md-end">{{ __('Branch') }}</label>
        
                            <div class="col-md-6">
                                <input id="branch" type="text" class="form-control @error('branch') is-invalid @enderror" name="branch" required autocomplete="branch">
        
                                @error('branch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="check_amount" class="col-md-4 col-form-label text-md-end">{{ __('Check Amount') }}</label>
        
                            <div class="col-md-6">
                                <input id="check_amount" type="number" class="form-control @error('check_amount') is-invalid @enderror" name="check_amount" required autocomplete="check_amount">
        
                                @error('check_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cash_amount" class="col-md-4 col-form-label text-md-end">{{ __('Cash Amount') }}</label>
        
                            <div class="col-md-6">
                                <input id="cash_amount" type="number" class="form-control @error('cash_amount') is-invalid @enderror" name="cash_amount" required autocomplete="cash_amount">
        
                                @error('cash_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="posted_by" value="{{auth()->user()->id}}">


                        <div class="row mb-3">
                            <label for="updated_voucher_number" class="col-md-4 col-form-label text-md-end">{{ __('Update Voucher Number') }}</label>
        
                            <div class="col-md-6">
                                <input id="updated_voucher_number" type="number" class="form-control @error('updated_voucher_number') is-invalid @enderror" name="updated_voucher_number" required autocomplete="updated_voucher_number">
        
                                @error('updated_voucher_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="approval_id" value="{{auth()->user()->id}}">

                        <div class="row mb-3">
                            <label for="approval_condition" class="col-md-4 col-form-label text-md-end">{{ __('Approval Condition') }}</label>
        
                            <div class="col-md-6">
                                <input id="approval_condition" type="text" class="form-control @error('approval_condition') is-invalid @enderror" name="approval_condition" required autocomplete="approval_condition">
        
                                @error('approval_condition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                     
        
                
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </form>
              </div>
            </div>
          </div>
          
        </div>
                {{-- end modal for In-Expen --}}

                {{-- .start modal for PoReceive --}}
                <div class="modal fade" id="PoReceive">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Create New User </h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form  action="{{route('CreateUser')}}" method="POST">
                                @csrf
                
                                <div class="row mb-3">
                                    <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('User Name') }}</label>
                
                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="org_name" value="{{auth()->user()->org_name}}">
                                <input type="hidden" name="access_roll" value="2">
                                <input type="hidden" name="created_by" value="{{auth()->user()->id}}">
                                {{-- <div class="row mb-3">
                                    <label for="org_name" class="col-md-4 col-form-label text-md-end">{{ __('Organization Name') }}</label>
                
                                    <div class="col-md-6">
                                        <input id="org_name" type="text" class="form-control @error('org_name') is-invalid @enderror" name="org_name" value="{{ old('org_name') }}" required autocomplete="org_name" autofocus>
                
                                        @error('org_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
                
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
                
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
                  </div>
                {{-- .end modal for Po Receive --}}

                {{-- .start modal for Approval --}}
                <div class="modal fade" id="Approval">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Create New User </h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form  action="{{route('CreateUser')}}" method="POST">
                                @csrf
                
                                <div class="row mb-3">
                                    <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('User Name') }}</label>
                
                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="org_name" value="{{auth()->user()->org_name}}">
                                <input type="hidden" name="access_roll" value="2">
                                <input type="hidden" name="created_by" value="{{auth()->user()->id}}">
                                {{-- <div class="row mb-3">
                                    <label for="org_name" class="col-md-4 col-form-label text-md-end">{{ __('Organization Name') }}</label>
                
                                    <div class="col-md-6">
                                        <input id="org_name" type="text" class="form-control @error('org_name') is-invalid @enderror" name="org_name" value="{{ old('org_name') }}" required autocomplete="org_name" autofocus>
                
                                        @error('org_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
                
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
                
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
                  </div>
                {{-- .end modal for Approval --}}