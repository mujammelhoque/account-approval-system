<!DOCTYPE html>
<html>
<head>
    <title>Reliable Engineering & Solutions Ltd</title>
</head>
<body>

  
    
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
    $userData= App\Models\User::find($info->user_id);
 @endphp
  
 <div>
   <h1>Reliable Engineering & Solutions Ltd approval Voucher </h1>
   <span><strong>date:</strong> <?php
    $dt = new DateTime();
    echo $dt->format('d-m-Y H:i:s');
    ?></span><br>
  

 
 <table>
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
<hr>
@php

$department = DB::table($departmentTable)
->where('id', $info->department)->first();
@endphp
<span class="fristspan"><strong>Name:</strong></span><span>{{ $userData->username }}</span><br>
<span class="fristspan"><strong>Email:</strong></span><span>{{ $userData->email }}</span><hr>
 <span class="fristspan"><strong>Total Amount:</strong></span><span>{{ $info->apply_amount }}</span><br>
 <span class="fristspan"><strong>Department:</strong></span><span>  {{$department->department}} </span><br>
 <span class="fristspan"><strong>Project:</strong></span><span>{{ $projectInfo->project??"" }}</span><br>
 <span class="fristspan"><strong>Description:</strong></span><span>{{ $info->description }}</span><br><br>
 <span class="fristspan"><strong>Date:</strong></span><span>{{ $info->date }}</span><br>
 @php
 $modified_by= App\Models\User::find($info->modified_by);
  $justified_by= App\Models\User::find($info->justified_by);
@endphp
<span class="fristspan"><strong>Approve By:</strong></span><span>{{ $modified_by->username }}</span><br>
<span class="fristspan"><strong>Justified By:</strong></span><span>{{ $justified_by->username }}</span><br>

 
</div>
<br>
    <div >
        <h5>check Image</h5>
        <img src="{{ public_path('uploads/'.$info->filename) }}" style=" width: 350px;
        ">
       
       
    </div>
    
    {{-- <strong>Public Folder:</strong>
  
    <br/>
    <strong>Storage Folder:</strong>
    <img src="{{ storage_path('app/public/dummy.jpg') }}" style="width: 200px; height: 200px"> --}}
</body>
</html>