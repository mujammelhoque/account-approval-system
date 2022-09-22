<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  


  
    @if ( auth()->user()->created_by == 0)
    @php
        $table = auth()->user()->username;
        $subApplyAmountTable =$table.'_sub_applyamount';
        $bankTable =$table.'_bank';
        $branchTable =$table.'_branch';
        $departmentTable =$table.'_department';

    @endphp
        
    @else
    @php
       $admin_username = App\Models\User::find(auth()->user()->created_by);
       $table = $admin_username->username;
       $subApplyAmountTable =$table.'_sub_applyamount';
       $bankTable =$table.'_bank';
       $branchTable =$table.'_branch';
       $departmentTable =$table.'_department';


       
    @endphp
       @endif

<div class="containder ms-3 mt-2 ">
    <h2 style="background-color:cornflowerblue; text-align: center;"> RESL Project Information At a Glance</h2>
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
      <td>{{$Income->check_amount??"" }}</td>
      <td>{{$Income->check_no??"" }}</td>
      <td>{{$Income->cash_amount??"" }}</td>
      <td>{{$Income->date  }}</td>
    </tr>
  @empty
      
  @endforelse
  </table>
  <span class="fristspan"><strong>Total Income Amount:</strong></span><span> {{ $subIncomeInfo->total }}</span><br>

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
      <th>Price</th>
      <th>Unit Name</th>
      <th>Quantity</th>
      <th>Sub Total</th>
      

    </tr>
  @forelse ($subApplyInfo as $subinfo)
  <tr>
      <td>{{$subinfo->material  }}</td>
      <td>{{$subinfo->item_price  }}</td>
      <td>{{$subinfo->unit  }}</td>
      <td>{{$subinfo->quantity  }}</td>
      <td>{{$subinfo->sub_total  }}</td>
    </tr>
  @empty
      
  @endforelse
  </table>
  <span class="fristspan"><strong>Total Demand:</strong></span><span>{{ $applyInfo->apply_amount }}
  </span><br><br>
  <div  class="fristspan"><strong>Issued Check:</strong><br>
    <span><img style="width:350px; height:130px;" src="{{ public_path('uploads/'.$applyInfo->filename) }}" alt=""></span><br>
  </div>
  @php
  $modified_by= App\Models\User::find($applyInfo->modified_by);
   $justified_by= App\Models\User::find($applyInfo->justified_by);
@endphp
<span class="fristspan"><strong>Approve By:</strong></span><span>{{ $modified_by->username }}</span><br>
<span class="fristspan"><strong>Justified By:</strong></span><span>{{ $justified_by->username }}</span><br>
 
  <p>    .......................................................
  </p>


  

@empty
      
@endforelse


<hr>
<h4 class="text-decoration-underline text-secondary">Balance Info</h4>
<span class="fristspan"><strong>Project name:</strong></span><span>{{ $project->project}}</span><br>
<span class="fristspan"><strong>Total Income Amount:</strong></span><span> {{ $subIncomeInfo->total }}</span><br>
<span class="fristspan"><strong>After Pay:</strong></span><span>{{ $subIncomeInfo->decrement_income }} </span>
<br>
<br>
<hr>

</div>


    
</body>
</html>