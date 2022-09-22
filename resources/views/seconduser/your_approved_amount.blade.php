
 
  
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
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Applier Name
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
                  @forelse ($yourapproved as $data)  
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
                  
                    <td>
                      {{date('d-m-Y', $data->created_at)}}
                    </td>
                    {{-- <td>
                     <form action="{{ route('approve-to-pending') }}" method="POST" >
                      @csrf
                      <input type="hidden" name="update_id" value="{{ $data->id }}">
                      <input type="hidden" name="table" value="{{ $table }}">
                      <button type="submit" class="btn btn-primary">Approve to Pending</button>

                  </form> --}}
                  
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