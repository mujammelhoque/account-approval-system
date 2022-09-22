
 
  
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
                  
                    <td>
                      {{$data->created_at}}
                    </td>
                  
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