
 
  
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
                         Department
                      </th>
                      <th>
Project name                      </th>
                      <th>
                          Income      
                      </th>
                      <th>
                         Total net Income      
                      </th>
               
                    
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($totalfound as $key => $found) 
                     
                    @forelse ($found as $data)
                        
                  
                 
                    <tr>
                      {{-- <td class="py-1">
                      {{ $userData->username }}
                      </td> --}}
                      <td>
                        {{ $data->department }}
                      </td>
                      <td>
                        {{ $data->project	 }}
                      </td>
                    
                      <td>
                          {{ $data->decrement_income }}
                      </td>
                      {{-- <td>
                          {{ $data->decrement_income }}
                      </td> --}}
  
  
                    </tr>
                    @empty
                        
                    @endforelse
                    @empty
                        
                    @endforelse
  
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>

    
    @endsection