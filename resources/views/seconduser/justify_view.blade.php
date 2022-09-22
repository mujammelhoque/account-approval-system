
 
  
    @extends('seconduser.layout')
    @section('style')
    <style>
      .fristspan{
      width:180px;
      display: inline-block;
    }
    </style> 
    @endsection

    @section('pagecontent')
 
    <div>
      @if ($message = Session::get('success'))
      <br>
      <div class="alert alert-success ">
          <p>{{ $message }}</p>
      </div>
      @endif
    </div>
    
    @if ( auth()->user()->created_by == 0)
              @php
                  $table = auth()->user()->username;
                  $incomeTable =$table.'_income';
                  $incomeNewAmount_table =$table.'_subincome';
                  $projectTable =$table.'_project';
                  $departmentTable =$table.'_department';
                  $martixTable =$table.'_approvalmatrix';


              @endphp
                  
              @else
              @php
                 $admin_username = App\Models\User::find(auth()->user()->created_by);
                 $table = $admin_username->username;
                  $incomeTable =$table.'_income';
                  $incomeNewAmount_table =$table.'_subincome';
                  $projectTable =$table.'_project';
                  $departmentTable =$table.'_department';
                  $martixTable =$table.'_approvalmatrix';


                 
              @endphp
                 @endif
             
    <div class="container ">
        <h2>Applicant Information</h2>
        @php
        $userData= App\Models\User::find($info->user_id);
     @endphp

@php
$project = DB::table($projectTable)
->where('id', $info->project)->first();

$department = DB::table($departmentTable)
->where('id', $info->department)->first();
@endphp

     <div>
       <span class="fristspan"><strong>Name:</strong></span><span>{{ $userData->username }}</span><br>
       <span class="fristspan"><strong>Email:</strong></span><span>{{ $userData->email }}</span><br>
       <span class="fristspan"><strong>Demand:</strong></span><span>{{ $info->apply_amount }} tk</span><br>
       
       @php
       $incomeAmount = DB::table($incomeNewAmount_table)
       ->where('id', $info->project)->first();
   @endphp
       <span class="fristspan"><strong>Reserve:</strong></span><span>{{ $incomeAmount->decrement_income}} tk</span><br>
       <span class="fristspan"><strong>Department:</strong></span><span>
        {{$department->department}}</span><br>
 
       <span class="fristspan"><strong>Project:</strong></span><span>{{ $project->project}}</span><br>
       
       <span class="fristspan"><strong>Status:</strong></span>
        @if ($incomeAmount->decrement_income >= $info->apply_amount )
           <span class="text-success"> Favorable</span>  
           @else 
           <span class="text-danger"> Unfavorable</span>  
  
        @endif
        <br>

       <span class="fristspan"><strong>Description:</strong></span><span>{{ $info->description }}</span><br><br>
       
       <table class="table table-bordered table-responsive">
        <tr>
          <th>Matrials</th>
          <th>Price</th>
          <th>Unit Name</th>
          <th>Quantity</th>
          <th>Sub Total</th>
          

        </tr>
      @forelse ($subinfo as $item)
      <tr>
          <td>{{$item->material  }}</td>
          <td>{{$item->item_price  }}</td>
          <td>{{$item->unit  }}</td>
          <td>{{$item->quantity  }}</td>
          <td>{{$item->sub_total  }}</td>
        </tr>
      @empty
          
      @endforelse
      </table>
    
       <span class="fristspan"><strong>Date:</strong></span><span>{{ $info->date }}</span><br>
       <span class="fristspan"><strong>Comment:</strong></span><span>{{ $info->comment }}</span><br><br>
                     
 @php
            $justifyselect = DB::table($martixTable)
        ->where("label",0)
        ->first();  
 @endphp  
        @if ( $justifyselect->user_id== auth()->user()->id)
        <br>
        <div class=" ">
        <form action="{{ route('justify') }}" method="POST" >
          @csrf
          @php
          // $admin_id= App\Models\User::where('id',auth()->user->created_by);
          $users =  App\Models\User::where('finance_justifier',1)->where('created_by',auth()->user()->created_by)->get();
       @endphp
          <input type="hidden" name="update_id" value="{{ $info->id }}">
          <label for="">Comment</label>
      <input type="text" name="comment" class="form-control" id=""> <br>
        <select name="justify" required class="form-select">
          <option value="" selected disabled>select one </option>
          @forelse ($users as $item)
              <option value="{{ $item->id }}">{{ $item->username }}</option>
          @empty
              
          @endforelse
            </select>   <br> 
              <div class="text-end"> 
                 <button type="submit" class="btn btn-primary" >Submit to justify</button>
              </div>         
          </form>  
          <br>
        </div>
            
     
            
        @else
        <div class="d-flex">
        <div class="fristspan"><strong>Inform Applicant:</strong></div>
         <div 
         <for>
        
            <form action="{{ route('send-mail-to-inform') }}" method="POST" class="form-inline">
              @csrf
              <input type="text" name="informToApplicant" class="form-control me-3">
              <input type="email" readonly value="{{ $userData->email }}" name="email" class="form-control me-3">
              <button class="btn btn-secondary" type="submit">Send</button>
            </form>
          </div>
        </div>
            <br>
        
        <span class="fristspan"><strong>Action:</strong></span><span> 
         <form action="{{ route('amount-justified-by') }}" method="POST" style="display: inline-block">
        @csrf
        <input type="hidden" name="update_id" value="{{ $info->id }}">
        <input type="hidden" name="email" value="{{ $userData->email}}">
        <button type="submit" class="btn btn-info">Satisfied</button>

    </form>
    <form action="{{ route('pending-to-cancel') }}" method="POST" style="display: inline-block">
      @csrf
      <input type="hidden" name="update_id" value="{{ $info->id }}">
      <input type="hidden" name="email" value="{{ $userData->email}}">
      <button type="submit" class="btn btn-danger">Reject</button>

  </form>
</span><br><br>
@endif
     </div>
     
        

      </div>

    
    @endsection