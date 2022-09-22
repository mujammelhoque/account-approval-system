
 
  
@extends('firstuser.layout')
@section('pagecontent')
            

<div class="right_col" role="main">
  <div >
 
      <div class="clearfix"></div>

      <div class="row">
          <div class="col-md-12 col-sm-12">
              <div class="x_panel">
              
                  <div class="x_content">
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
                    {{-- <th>
                      Action
                    </th> --}}
                  </tr>
                </thead>
                <tbody>
                  @forelse ($pending_data as $data)  
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
                      {{date('d-m-Y', $data->created_at)}}
                    </td>
                    {{-- <td>
                     <form action="{{ route('approve-to-pending') }}" method="POST" >
                      @csrf
                      <input type="hidden" name="update_id" value="{{ $data->id }}">
                      <input type="hidden" name="table" value="{{ $table }}">
                      <button type="submit" class="btn btn-primary">Approve to Pending</button>

                  </form>
                  
                    </td> --}}
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