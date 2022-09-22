
    @extends('seconduser.layout')
    @section('style')
    <style>
      .fristspan{
      width:200px;
      display: inline-block;
    }
    </style>
        
    @endsection
    @section('pagecontent')
 

    
    @if ( auth()->user()->created_by == 0)
              @php
                  $table = auth()->user()->username;
                  $incomeTable =$table.'_income';
                  $incomeNewAmount_table =$table.'_subincome';
                  $projectTable =$table.'_project';
                  $departmentTable =$table.'_department';
              @endphp
                  
              @else
              @php
                 $admin_username = App\Models\User::find(auth()->user()->created_by);
                 $table = $admin_username->username;
                  $incomeTable =$table.'_income';
                  $incomeNewAmount_table =$table.'_subincome';
                  $projectTable =$table.'_project';
                  $departmentTable =$table.'_department';

                 
              @endphp
                 @endif
    <div class="container">
        <div>
            @if ($message = Session::get('success'))
            <br>
            <div class="alert alert-success ">
                <p>{{ $message }}</p>
            </div>
            @endif
          </div>

          @php
          $userData= App\Models\User::find($info->user_id);
       @endphp
       <div class="d-flex justify-content-between mt-2 mb-3">  <h2>Applicant Information</h2> <div>
      
        </div></div>
      
     <div>
      @php
      $project = DB::table($projectTable)
      ->where('id', $info->project)->first();

      $department = DB::table($departmentTable)
      ->where('id', $info->department)->first();
   @endphp

      <span class="fristspan"><strong>Name:</strong></span><span>{{ $userData->username }}</span><br>
      <span class="fristspan"><strong>Email:</strong></span><span>{{ $userData->email }}</span><br>
      <span class="fristspan"><strong>Department:</strong></span><span>
        {{$department->department}}  </span><br>

      <span class="fristspan"><strong>Project:</strong></span><span>{{ $project->project}}</span><br>

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
     <span class="fristspan"><strong>Total Amount Demand:</strong></span><span>{{ $info->apply_amount }}</span><br>
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

   
      <span class="fristspan"><strong>Expected Date:</strong></span><span>{{ $info->date }}</span><br>
      <span class="fristspan"><strong>Apply Date:</strong></span><span>{{ $info->created_at }}</span><br>
      @php
                $modified_by= App\Models\User::find($info->modified_by);
                 $justified_by= App\Models\User::find($info->justified_by);
      @endphp
      <span class="fristspan"><strong>Approve By:</strong></span><span>{{ $modified_by->username }}</span><br>
      <span class="fristspan"><strong>Justified By:</strong></span><span>{{ $justified_by->username }}</span><br>

      <span  class="fristspan"><strong>Image:</strong></span><span><img style="width: 350px" src="{{ asset('uploads/'.$info->filename) }}" alt=""></span><br>
      <span class="fristspan text-primary"><strong>Upload Image: &nbsp;</strong></span><span> 
        <form action="{{ url('check-upload') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="input-group">
            <input type="file" class="form-control" name="checkfile" >
            <input type="hidden" name="update_id" value="{{ $info->id }}">

            <div class="input-group-append">
              <button class="btn btn-success" type="submit">upload</button>
            </div>
          </div>
      </form> 
</span><br><br>
@php
  $reduceAmount= $incomeAmount->decrement_income - $info->apply_amount;

@endphp
@if ($info->status === "final")
<strong>    Already voucher is created
</strong> 

<form action="{{ route('generate-pdf') }}" method="POST">
  @csrf
  <input type="hidden" name="reduceFromIncome" value="{{ $reduceAmount }}">
  <input type="hidden" name="id" value="{{ $info->id }}">
  <input type="hidden" name="project_id" value="{{ $info->project }}">
  <button type="submit" class="btn btn-primary">Pdf generate </button>
</form>
  
   @elseif ($incomeAmount->decrement_income >= $info->apply_amount )



<form action="{{ route('final-approve') }}" method="POST">
  @csrf
  <input type="hidden" name="reduceFromIncome" value="{{ $reduceAmount }}">
  <input type="hidden" name="id" value="{{ $info->id }}">
  <input type="hidden" name="project_id" value="{{ $info->project }}">
  <button type="submit" class="btn btn-primary"> Final </button>
</form>
@else

@endif
<br>
    </div>
    
      </div>

    
    @endsection