
 
  
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
              @endphp
                  
              @else
              @php
                 $admin_username = App\Models\User::find(auth()->user()->created_by);
                 $table = $admin_username->username;
                  $incomeTable =$table.'_income';
                  $incomeNewAmount_table =$table.'_subincome';

                  $projectTable =$table.'_project';
                 
              @endphp
                 @endif
             
    <div class="container ">
        <h2>Applicant Information</h2>
        @php
        $userData= App\Models\User::find($info->user_id);
     @endphp

     <div>
       <span class="fristspan"><strong>Name:</strong></span><span>{{ $userData->username }}</span><br>
       <span class="fristspan"><strong>Email:</strong></span><span>{{ $userData->email }}</span><br>
       <span class="fristspan"><strong>Amount:</strong></span><span>{{ $info->apply_amount }}</span><br>
       <span class="fristspan"><strong>Department:</strong></span><span>@if ($info->department ==1)
        Electrical
        @elseif($info->department ==2)
        Anergy
        @elseif($info->department ==3)
        Construction
        @else
        Not Found
    @endif</span><br>
    @php
    $project = DB::table($projectTable)
    ->where('id', $info->project)->first();
@endphp
       <span class="fristspan"><strong>Project:</strong></span><span>{{ $project->project}}</span><br>
       @php
       $incomeAmount = DB::table($incomeNewAmount_table)
       ->where('id', $info->project)->first();
   @endphp
       <span class="fristspan"><strong>Reserved Amount:</strong></span><span>{{ $incomeAmount->decrement_income}}</span><br>
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
       <span class="fristspan"><strong>Action:</strong></span><span> 
        {{-- @if (($incomeAmount->check_amount >= $info->apply_amount)||($incomeAmount->check_no >= $info->apply_amount) ) --}}
        <form action="{{ route('pending-to-approve') }}" method="POST" style="display: inline-block" >
            @csrf
            <input type="hidden" name="update_id" value="{{ $info->id }}">
            <input type="hidden" name="email" value="{{ $userData->email}}">
          
            <button type="submit" class="btn btn-primary">Apply Approve</button>

        </form>
        {{-- @else 
        <span class="text-danger"> Unfavorable</span>  

     @endif --}}
        
    <form action="{{ route('pending-to-cancel') }}" method="POST" style="display: inline-block">
      @csrf
      <input type="hidden" name="update_id" value="{{ $info->id }}">
      <input type="hidden" name="email" value="{{ $userData->email}}">
      <button type="submit" class="btn btn-danger">Reject</button>

  </form>
</span><br><br>
     </div>
     
        

      </div>

    
    @endsection