
 
  
@extends('firstuser.layout')
@section('pagecontent')

<div class="right_col" role="main">
  <div >
 
      <div class="clearfix"></div>

      <div class="row">
          <div class="col-md-12 col-sm-12">
              <div class="x_panel">
              
                  <div class="x_content">
            <h4 class="card-title">Pending Amount Amount Table</h4>

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
                $appr_table = auth()->user()->username;
                $appr_tablename =$appr_table.'_approvalmatrix';
            @endphp
                
            @else
            @php
               $admin_username = App\Models\User::find(auth()->user()->created_by);
               $appr_table = $admin_username->username;
                $appr_tablename =$appr_table.'_approvalmatrix';
               
            @endphp

               @endif
            {{-- <input type="hidden" name="table_name" value="{{$admin_username->username}}_applyamount"> --}}

            @php
                 $justifyselect = DB::table($appr_tablename)
          ->where([
              // ['user_id','=', auth()->user()->id],
       
              ['label', '=',1],
          ])
          ->orderBy('id','desc')
          ->first();
            @endphp
            
            <div class="table-responsive">
              <table class="table table-striped   ">
                <thead>
                  <tr>
                    <th>
                      User Name
                    </th>
                    <th>
                      User Email
                    </th>
                    <th>
                      Apply Amount
                    </th>
                    <th>
                      Apply Date
                    </th>
                    <th>justify</th>
                    <th>
                      Action
                    </th>
               
                    <th>Recommend by</th>
              
                  </tr>
                </thead>
                <tbody>
                  @forelse ($pending_data as $data)  
                  @php
                     $userData= App\Models\User::find($data->user_id);
                  @endphp
               
                  <tr >
                    <td class="py-1">
                    {{ $userData->username }}
                    </td>
                    <td>
                      {{ $userData->email }}
                    </td>
                    <td>
                      {{ $data->apply_amount }}
                    </td>
                  
                    {{-- <td>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td> --}}
                    <td>
                      {{date('d-m-Y', $data->created_at)}}
                    </td>


                    <td>
             
                 @if($data->justify !=null and $data->justified_by ==null)
                     Processing
                     @elseif(($data->justified_by !=null and $data->justify !=null) and ($data->justified_by ==$data->justify ))
                     @php
                     $justify_by= App\Models\User::find($data->justified_by);
                  @endphp
                     Justified by {{ $justify_by->username }}
                     @else

                    
                 
                      @if ( $justifyselect->user_id== auth()->user()->id)
                      <form action="{{ route('justify') }}" method="POST" >
                        @csrf
                      <div class="input-group ">
                        @php
                        // $admin_id= App\Models\User::where('id',auth()->user->created_by);
                        $users =  App\Models\User::where('finance_justifier',1)->where('created_by',auth()->user()->created_by)->get();
                     @endphp
                        <input type="hidden" name="table" value="{{ $table }}">
                        <input type="hidden" name="update_id" value="{{ $data->id }}">
                    
                      <select name="justify" class="form-select">
                        @forelse ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->username }}</option>
                        @empty
                            
                        @endforelse
                          </select>     
                          <div class="input-group-text"> <button type="submit" class="btn btn-primary" >justify</button></div>
                        </div>
                      </form>  
                          
                      @endif

              
                 @endif
                     
          
                    
                    </td>

                    <td>
                     {{-- <a href="{{ route('pending-to-approve',$data->id) }}" class="btn btn-success">Approve</a> --}}
                     @if (isset($apprmatrix_data->uper_limit))
                     @if ($apprmatrix_data->uper_limit >= $data->apply_amount and $data->status ==1)
                     <form action="{{ route('pending-to-approve') }}" method="POST" style="display: inline-block" >
                      @csrf
                      <input type="hidden" name="update_id" value="{{ $data->id }}">
                      <input type="hidden" name="table" value="{{ $table }}">
                      <input type="hidden" name="email" value="{{ $userData->email }}">

                    
                      <button type="submit" class="btn btn-primary">Apply Approve</button>

                  </form>

                  @endif
                     @endif
                     
                  @isset($apprmatrix_data->uper_limit)
                      
                     @if ($apprmatrix_data->uper_limit < $data->apply_amount and $data->status ==1)
                     <form action="{{ route('pending-to-recommend') }}" method="POST" style="display: inline-block" >
                      @csrf
                      <input type="hidden" name="update_id" value="{{ $data->id }}">
                      <input type="hidden" name="re_step" value="{{ $apprmatrix_data->label }}">
                      {{-- <input type="hidden" name="status" value="1"> --}}
                      <input type="hidden" name="table" value="{{ $table }}">
                    
                      <button type="submit" class="btn btn-primary">Recommend</button>

                  </form>
                  @endif
                  @endisset

                  @if ($data->justified_by==null)
                  <form action="{{ route('pending-to-cancel') }}" method="POST" style="display: inline-block">
                    @csrf
                    <input type="hidden" name="update_id" value="{{ $data->id }}">
                    <input type="hidden" name="table" value="{{ $table }}">
                    <input type="hidden" name="email" value="{{ $userData->email }}">

                    <button type="submit" class="btn btn-danger">Cancel</button>

                </form>
                  @endif
                
                    </td>
                    @php
                    $recommender= App\Models\User::find($data->modified_by);
                @endphp
             
                   
                  
             
                  <td>
                    @if (isset($apprmatrix_data->uper_limit))
                    @if ($apprmatrix_data->uper_limit >= $data->apply_amount and $data->status ==1)
              
                    {{ $recommender->username }}
                    @endif
                    
                    @endif

               

                    </td>

                  </tr>
                  @empty
                      
                  @endforelse

                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
</div>
</div>

    
    @endsection