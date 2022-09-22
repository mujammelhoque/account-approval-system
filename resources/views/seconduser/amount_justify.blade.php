
 
  
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
            
            <div class="table-responsive">
              <table class="table table-striped">
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
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($forjustify as $data)  
                  @php
                     $userData= App\Models\User::find($data->user_id);
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
                  
                    {{-- <td>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td> --}}
                    <td>
                      {{ $data->created_at}}
                    </td>
                    <td>
                     {{-- <a href="{{ route('pending-to-approve',$data->id) }}" class="btn btn-success">Approve</a> --}}
                
                    
                     {{-- <form action="{{ route('amount-justified-by') }}" method="POST" style="display: inline-block">
                      @csrf
                      <input type="hidden" name="update_id" value="{{ $data->id }}">
                      <input type="hidden" name="email" value="{{ $userData->email}}">
                      <button type="submit" class="btn btn-info">Satisfied</button>

                  </form> --}}
                  <form action="{{ route('pending-to-cancel') }}" method="POST" style="display: inline-block">
                    @csrf
                    <input type="hidden" name="update_id" value="{{ $data->id }}">
                    <button type="submit" class="btn btn-danger">Reject</button>

                </form>
                
                 <a class="btn btn-info" href="{{ route('justify-to-view',$data->id ) }}">View</a>
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