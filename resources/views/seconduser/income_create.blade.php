
    @extends('seconduser.layout')
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

    @if ( auth()->user()->created_by == 0)
    @php
        $table = auth()->user()->username;
        // $tablename =$table.'_approvalmatrix';
        $tablename =$table.'_project';

        $departmentTable =$table.'_department';

    @endphp
        
    @else
    @php
       $admin_username = App\Models\User::find(auth()->user()->created_by);
       $table = $admin_username->username;
        $tablename =$table.'_project';
        $departmentTable =$table.'_department';

       
    @endphp
       @endif
    @php
        $projects = DB::table($tablename)
        ->orderBy('id','desc')
        ->get();

        $departments = DB::table($departmentTable)->get();

    @endphp
  
<div class="container">

            <h4 class="card-title">Insert Income Info</h4>
            {{-- success show --}}
            <div>
              @if ($message = Session::get('success'))
              <br>
              <div class="alert alert-success ">
                  <p>{{ $message }}</p>
              </div>
              @endif
            </div>

            {{-- erros show --}}
            @if (count($errors) > 0)
            <div class = "alert alert-danger ">
               <ul>
                  @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            @endif
            <div class="text-right mt-2">  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bankModal">
                Create Bank 
                </button>
               <button type="button" class="btn btn-info" data-toggle="modal" data-target="#branchModal">
                Create Branch 
                </button>
               <button type="button" class="btn btn-info" data-toggle="modal" data-target="#projectModal">
                Create Project 
                </button>
              </div>
                  
            <form action="{{ route('income-info-store') }}" method="post">
                @csrf

                {{-- <div class="form-group">
                    <label >Credit Voucher Number<span class="required">*</span></label>
                    <input class="form-control" type="text" name="credit_voucher_number"  >

                  </div> --}}
                {{-- <div class="form-group">
                    <label >Date</label>
                    <input class="form-control" type="date" name="date"  >
                  </div> --}}

                <div class="form-group">
                    <label >From</label>
                    <input class="form-control" type="text" name="from"  >

                  </div>
                  <div class="row">
                    <div class="col-6"> 
                  <div class="form-group">
                    <label for="bank">Bank Name:</label>
                    <select name="bank" class="form-control bank">
                      <option value="" readonly>select one</option>
                      @forelse ($banks as $bank)
                      <option value="{{ $bank->id }}" readonly>{{ $bank->bank }}</option>
        
                      @empty
                          
                      @endforelse
                    </select>
                  </div>
                  </div>
                  <div class="col-6"> 

                  <div class="form-group">
                    <label for="branch">Branch Name:</label>
                    <select name="branch"  class="form-control branch">
                    </select>
                  </div>
                </div>
            </div>

                  <div class="row">
                    <div class="col-6"> 
                  <div class="form-group">
                    <label for="project">Project Name:</label>
                    <select name="project" id="project" class="form-control">
                      <option value="" readonly> select a project</option>
                      @forelse ($projects as $project)
                      <option value="{{ $project->id }}">{{ $project->project }}</option>
                          
                      @empty
                          
                      @endforelse
                      </select>                 
                  </div>
                </div>
                {{-- <div class="col-6"> 

                  <div class="form-group">

                    <label for="department">Department</label>
                    <select name="department" id="department" class="form-control">
                      <option readonly  value="">Select One</option>
                     @forelse ($departments as $department)
                     <option value="{{ $department->id }}">{{ $department->department }}</option>
                         
                     @empty
                         
                     @endforelse
                    </select> 
                  </div>
                </div> --}}
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-check">
                      <input type="radio"  onclick="javascript:yesnoCheck();" name="yesno" class="form-check-input" id="yesCheck"/> 
                      <label class="form-check-label" for="yesCheck">
                        Check
                      </label>
                  </div>
             

                  </div>

                  <div class="col-6">
                  <div class="form-check">
                    <input type="radio"  onclick="javascript:yesnoCheck();" class="form-check-input" name="yesno" id="noCheck"/>
                    <label class="form-check-label" for="noCheck">
                      Cash
                    </label>
                </div>
              </div> 
                <div id="ifYes" style="display:none">

                  <div class="row">
                 <div class="col-6">  
                     <div class="form-group">
                    <label >Check Amount </label>
                     <input  class="form-control"  type="number" step=any  name="check_amount">
                      
                    </div>
                </div>
                      <div class="col-6">
                        <div class=" form-group">
                         <label>Check No</label>
                          <input  class="form-control"  type="text" name="check_no">
                      
                        </div>
                      </div>
                  </div>
               
              

                <div class=" form-group">
                    <label >Check date</label>
                  <input  class="form-control"  type="date" name="check_date">
                 
                </div>               
                </div>
                <div id="ifNo" style="display:none">
                  <div class=" form-group">
                    <label >Cash Amount </label>
                    <input  class="form-control"  type="number" name="cash_amount" >
                  </div>
                  </div>               
             
                <input type="hidden" name="posted_by">
                <input type="hidden" name="approval_id">

                <div class="text-right">
                <button type='submit' class="btn btn-primary mt-3">Submit</button>
                </div>
            </form>
           
        </div>

        
  
  {{-- selection part start--}}
  <script type=text/javascript>
    
    $(document).ready(function(){
      $('.bank').change(function(){
      var bankId = $(this).val();  
      if(bankId){
        $.ajax({
          type:"GET",
          url:"{{url('get-branch')}}?bank_id="+bankId,
          success:function(res){        
          if(res){
            $(".branch").empty();
            $(".branch").append('<option>Select branch</option>');
            $.each(res,function(key,value){
              $(".branch").append('<option value="'+key+'">'+value+'</option>');
            });
          
          }else{
            $(".branch").empty();
          }
          }
        });
      }else{
        $(".branch").empty();
        // $(".project").empty();
      }   
      });

      // $('.branch').on('change',function(){
      // var branchId = $(this).val();  
      // if(branchId){
      //   $.ajax({
      //     type:"GET",
      //     url:"{{url('get-project')}}?branch_id="+branchId,
      //     success:function(res){        
      //     if(res){
      //       $(".project").empty();
      //   $(".project").append('<option>Select Project</option>');
      //       $.each(res,function(key,value){
      //         $(".project").append('<option value="'+key+'">'+value+'</option>');
      //       });
          
      //     }else{
      //       $(".project").empty();
      //     }
      //     }
      //   });
      // }else{
      //   $(".project").empty();
      // }
        
      // });
    }); 
    </script>

    
    {{-- modal --}}
    <!-- Button to Open the Modal -->

  
  <!-- The Bank Modal -->
  <div class="modal" id="bankModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create a Bank Name</h4>
        </div>
        <form action="{{ route('bank-create') }}" method="POST">
          @csrf

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
              <label for="name">Bank name:</label>
              <input type="text" name="bank" class="form-control" id="name">
            </div>
       
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" >Submit</button>
        </div>
      </form>

  
      </div>
    </div>
  </div>
  
  <!-- The Branch Modal -->
  <div class="modal" id="branchModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create a Branch Name</h4>
        </div>
        <form action="{{ route('branch-create') }}" method="POST">
          @csrf
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label for="bank_id">Bank Name:</label>
            <select name="bank_id" id="bank_id" class="form-control">
              <option value="" readonly>select one</option>
              @forelse ($banks as $bank)
              <option value="{{ $bank->id }}" readonly>{{ $bank->bank }}</option>

              @empty
                  
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label for="branch">Branch name:</label>
            <input type="text" name="branch" class="form-control" id="branch">
          </div>
        
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" >Submit</button>
        </div>
      </form>
  
      </div>
    </div>
  </div>
  

  <!-- The Project Modal -->
  <div class="modal" id="projectModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create a Project Name</h4>
        </div>
  <form action="{{ route('project-create') }}" method="POST">
    @csrf
        <!-- Modal body -->
        <div class="modal-body">

          <div class="form-group">

            <label for="department">Department</label>
            <select name="department_id" id="department" class="form-control">
              <option readonly  value="">Select One</option>
             @forelse ($departments as $department)
             <option value="{{ $department->id }}">{{ $department->department }}</option>
                 
             @empty
                 
             @endforelse
            </select> 
         
            <label for="project">Project name:</label>
            <input type="text" name="project" class="form-control" >
          </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" >Submit</button>
        </div>
      </form>
  
      </div>
    </div>
  </div>

{{-- end modal --}}
    
    @endsection