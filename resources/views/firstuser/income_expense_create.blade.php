@extends('firstuser.layout')
@section('script')
    
<script type="text/javascript">
    window.onload = function() {
       document.getElementById('ifYes').style.display = 'none';
       document.getElementById('ifNo').style.display = 'none';
   }
   function yesnoCheck() {
       if (document.getElementById('yesCheck').checked) {
           document.getElementById('ifYes').style.display = 'block';
           document.getElementById('ifNo').style.display = 'none';
       
       } 
       else if(document.getElementById('noCheck').checked) {
           document.getElementById('ifNo').style.display = 'block';
           document.getElementById('ifYes').style.display = 'none';
      
      }
   }
 
   </script>
@endsection
@section('pagecontent')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
       
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                    
                        <div class="x_content">
                            <div>
                                @if ($message = Session::get('success'))
                                <br>
                                <div class="alert alert-success ">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                              </div>

                            <form action="{{ route('income-expense-store') }}" method="post">
                                @csrf
                          
                                <span class="section">Insert Income Info</span>

                                @if ( auth()->user()->created_by == 0)
                                <input type="hidden" name="table_name" value="{{auth()->user()->username}}_income_expense">
                                    
                                @else
                                @php
                                   $admin_username = App\Models\User::find(auth()->user()->created_by);
                                @endphp
                                <input type="hidden" name="table_name" value="{{$admin_username->username}}_income_expense">
    
                                @endif

                                
                      @if ( auth()->user()->created_by == 0)
                      <input type="hidden" name="admin_id" value="{{auth()->user()->id}}">
                          
                      @else
                      @php
                         $admin_username = App\Models\User::find(auth()->user()->created_by);
                      @endphp
                      <input type="hidden" name="admin_id" value="{{$admin_username->id}}">

                      @endif


                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Credit Voucher Number<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="credit_voucher_number" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Expenditure Item<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control" name="expenditure_item" >
                                            <option value="">cost 1</option>
                                            <option value="">cost 2</option>
                                            <option value="">cost 3</option>
                                            <option value="">cost 4</option>
                                            <option value="">cost 5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control date"  type="date" name="date" ></div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Particulars<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea  class="form-control"  type="text" name="particulars" ></textarea>
                                    </div>
                                </div>
                       
                                <div class="field item form-group" >

                             <label class="col-form-label col-md-3 col-sm-3  label-align"><strong>Check</strong></label>
                            <div class="col-md-3 col-sm-3" >
                             <input type="radio" class="form-control" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck"/> 
                            </div>
                             <label class="col-form-label"><strong>Cash</strong></label>
                             <div class="col-md-3 col-sm-3" >
                                 <input type="radio" class="form-control" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck"/>
                             </div>

                                </div>
                                

                                <div id="ifYes" style="display:none">
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Check No<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input  class="form-control"  type="text" name="check_no">
                                </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Check date<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input  class="form-control"  type="date" name="check_date">
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Bank Check <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input  class="form-control"  type="text" name="bank_check">
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Branch <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input  class="form-control"  type="text" name="branch" >
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Check Amount <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input  class="form-control"  type="number" name="check_amount">
                                    </div>
                                </div>
                                {{-- close radio 1 id=ifYes --}}
                                </div>
                                <div id="ifNo" style="display:none">
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Cash Amount <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input  class="form-control"  type="number" name="cash_amount" >
                                    </div>
                                </div>
                                </div>
                                {{-- close radio 2 id=ifNo --}}


                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Updated Voucher Number <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input  class="form-control"  type="number" name="updated_voucher_number" >
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Approval Condition </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input  class="form-control"  type="number" name="approval_condition" >
                                    </div>
                                </div>

                                <input type="hidden" name="posted_by">
                                <input type="hidden" name="approval_id">
                             
                                
                         
                           
                             
                               
                                <div class="ln_solid">
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