
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
        $subApplyAmountTable =$table.'_sub_applyamount';
        $bankTable =$table.'_bank';
        $branchTable =$table.'_branch';
    @endphp
        
    @else
    @php
       $admin_username = App\Models\User::find(auth()->user()->created_by);
       $table = $admin_username->username;
       $subApplyAmountTable =$table.'_sub_applyamount';
       $bankTable =$table.'_bank';
       $branchTable =$table.'_branch';

       
    @endphp
       @endif

<div class="containder ms-3 mt-2 ">
    <h2 class="text-center bg-info text-light"> RESL Project Information At a Glance</h2>
    <div class="text-right"><a class="btn btn-primary" href="{{ route('all-approve-projects-pdf',$project->id) }}">Generate PDF</a></div>

<h4 class="text-decoration-underline text-secondary">Income Info</h4>
<span class="fristspan"><strong>Project name:</strong></span><span>{{ $project->project}}</span><br>

<table class="table table-bordered table-responsive">
    <tr>
      <th>Bank</th>
      <th>Branch</th>
      <th>Check Amount</th>
      <th>Check No</th>
      <th>Cache Amount</th>
      <th>Date</th>

      

    </tr>
  @forelse ($incomeInfo as $Income)
  @php
      $bank = DB::table($bankTable)
         ->find($Income->bank);
      $branch = DB::table($branchTable)
         ->find($Income->branch);
  @endphp
  <tr>
      <td>{{$bank->bank }}</td>
      <td>{{$branch->branch }}</td>
      <td>{{$Income->check_amount??"" }} tk</td>
      <td>{{$Income->check_no??"" }}</td>
      <td>{{$Income->cash_amount??"" }} tk</td>
      <td>{{$Income->date  }}</td>
    </tr>
  @empty
      
  @endforelse
  </table>
  <span class="fristspan"><strong>Total Income Amount:</strong></span><span> {{ $subIncomeInfo->total??'Not implement' }}</span><br>

<hr>
<h4 class="text-decoration-underline text-secondary">Demand Info</h4>
<span class="fristspan"><strong>Project name:</strong></span><span>{{ $project->project}}</span><br>

@forelse ($applyAmountInfo as $applyInfo)


@php
$userData= App\Models\User::find($applyInfo->user_id);
$subApplyInfo = DB::table($subApplyAmountTable)
          ->where([
              ['applyamount_id','=' , $applyInfo->id],
          ])
          ->get();
@endphp
<span class="fristspan"><strong>Apply Sl:</strong></span><span>{{ $loop->index+1 }} </span><br>
<span class="fristspan"><strong>Name:</strong></span><span>{{ $userData->username }}</span><br>
<span class="fristspan"><strong>Email:</strong></span><span>{{ $userData->email }}</span><br>

<table class="table table-bordered table-responsive">
    <tr>
      <th>Matrials</th>
      <th>Quantity</th>
      <th>Unit Name</th>
      <th>Price</th>
      <th>Sub Total</th>
      

    </tr>
  @forelse ($subApplyInfo as $subinfo)
  <tr>
      <td>{{$subinfo->material  }}</td>
      <td>{{$subinfo->quantity  }}</td>
      <td>{{$subinfo->unit  }}</td>
      <td>{{$subinfo->item_price  }} tk</td>
      <td>{{$subinfo->sub_total  }} tk</td>
    </tr>
  @empty
      
  @endforelse
  </table>
  <span class="fristspan"><strong>Total Demand:</strong></span><span>{{ $applyInfo->apply_amount }} tk</span><br>
  <span  class="fristspan"><strong>Issued Check:</strong></span><span><img style="width:350px; height:130px;" src="{{ asset('uploads/'.$applyInfo->filename) }}" alt=""></span><br>
  @php
  $modified_by= App\Models\User::find($applyInfo->modified_by);
   $justified_by= App\Models\User::find($applyInfo->justified_by);
@endphp
<span class="fristspan"><strong>Approve By:</strong></span><span>{{ $modified_by->username }}</span><br>
<span class="fristspan"><strong>Justified By:</strong></span><span>{{ $justified_by->username }}</span><br>
  
  <p>.......................................................</p>


  

@empty
      
@endforelse


<hr>
<h4 class="text-decoration-underline text-secondary">Operating Expense </h4>
<form action="">
  <input type="text" class="form-control " name="opera_expense" placeholder="Enter your operating expense">
  <button class="btn btn-secondary mt-2" type="submit"> Submit</button>
</form>
<hr>
<h4 class="text-decoration-underline text-secondary">Balance Info</h4>
<span class="fristspan"><strong>Project name:</strong></span><span>{{ $project->project}}</span><br>
<span class="fristspan"><strong>Total Income Amount:</strong></span><span> {{ $subIncomeInfo->total ??'Not implement'}}</span><br>
<span class="fristspan"><strong>Opearating Expense:</strong></span><span>  </span><br>
<span class="fristspan"><strong>After Pay:</strong></span><span>{{ $subIncomeInfo->decrement_income ??'Not implement'}} </span>
<br>
<br>
<hr>

</div>


    
    @endsection