
 
  
    @extends('seconduser.layout')
    @section('pagecontent')
            

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Approved Amount Table</h4>

            <div>
              @if ($message = Session::get('success'))
              <br>
              <div class="alert alert-success ">
                  <p>{{ $message }}</p>
              </div>
              @endif
            </div>
            
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
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
                    <th>
                      Approved By
                    </th>
                    <th>
                      Justify By
                    </th>
                    <th>
                     status
                    </th>
                    <th>
                      check picture
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($allapprove as $data)  
                  @php
                     $userData= App\Models\User::find($data->user_id);
                
                     $modified_by= App\Models\User::find($data->modified_by);
                     $justified_by= App\Models\User::find($data->justified_by);
          
                  @endphp
               
                  <tr>
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
                      {{ $data->created_at}}
                    </td>
                    {{-- <td>
                     <form action="{{ route('approve-to-pending') }}" method="POST" >
                      @csrf
                      <input type="hidden" name="update_id" value="{{ $data->id }}">
                      <input type="hidden" name="table" value="{{ $table }}">
                      <button type="submit" class="btn btn-primary">Approve to Pending</button>

                  </form> --}}
                  
                    </td>
                    <td>
                         {{ $modified_by->username }}
                    </td>
                    <td>
                         {{ $justified_by->username??"" }}
                    </td>
                    <td>
                         @if ($data->status === "final")
                             check is issued
                                 
                             @else
                             not issued
                                 
                           
                         @endif
                    </td>
                    <td>
                    <a href="{{ asset('uploads/'.$data->filename)}}"> <img src="{{ asset('uploads/'.$data->filename)}}" alt=""> </a>
                    </td>
                    <td>
                     
                    <form action="{{ route('approved-to-view',$data->id) }}" method="GET" style="display: inline-block">
                      @csrf
                      {{-- <input type="hidden" name="view_id" value="{{ $data->id }}"> --}}
                      <button type="submit" class="btn btn-info">View</button>
  
                  </form>
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

    
    @endsection