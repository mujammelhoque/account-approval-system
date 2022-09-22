
    @extends('seconduser.layout')
    @section('pagecontent')
            

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Pending Amount Table</h4>

            <div>
              @if ($message = Session::get('success'))
              <br>
              <div class="alert alert-success ">
                  <p>{{ $message }}</p>
              </div>
              @endif
            </div>
            <div>
              
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

              @php
                   $justifyselect = DB::table($appr_tablename)
                 ->where([
                    ['label', '=',0],
                    ])
                    ->orderBy('id','desc')
                    ->first();
              @endphp
            </div>
            
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
                    <td>
                      {{$data->created_at}}
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

                    
                 @if ($justifyselect!=null)
                      @if ( $justifyselect->user_id== auth()->user()->id)            
                            <a class="btn btn-info" href="{{ route('justify-to-view',$data->id) }}">View</a>
                      @endif
                  @endif

              
                 @endif
                     
          
                    
                    </td>

                    <td>
                      @php
                      $labelforaccess = DB::table($appr_tablename)
               ->where([
                    ['user_id','=', $data->modified_by],
        
               ])
               ->first();
                 @endphp
                     {{-- <a href="{{ route('pending-to-approve',$data->id) }}" class="btn btn-success">Approve</a> --}}
                     @if (isset($apprmatrix_data->uper_limit))
                     @if ($apprmatrix_data->uper_limit >= $data->apply_amount and $data->status ==1)
                     @if (($apprmatrix_data->department === auth()->user()->department) or ($apprmatrix_data->label === $labelforaccess->label+1 ))

                  <a class="btn btn-info" href="{{ route('pre-approve-view',$data->id) }}">View</a>
                
                  @endif
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
                    <input type="hidden" name="email" value="{{ $userData->email}}">

                    <button type="submit" class="btn btn-danger">Cancel</button>

                </form>
                  @endif
                
                    </td>
                    @php
                    $recommender= App\Models\User::find($data->modified_by);
                @endphp
             
                   
                  
             
                  <td>
                    @if (isset($apprmatrix_data->uper_limit))
                    @if ($data->status ==1)
              
                    {{ $recommender->username }}
                    @endif
                    
                    @endif

               

                    </td>

                  </tr>
                  @empty
                      
                  @endforelse

                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                {!! $pending_data->links() !!}
            </div>
            </div>
          </div>
        </div>
      </div>

    
    @endsection