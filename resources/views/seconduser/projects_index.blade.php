
 
  
    @extends('seconduser.layout')
    @section('pagecontent')
            

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">View your final project</h4>

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
                      Name
                    </th>
                    <th>From</th>
                    <th>to</th>
                    
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>

                  @forelse ($projects as $project)  
                  <form action="{{ route('projects-show',$project->id) }}" method="GET">
                  <tr>
                  <td>
                      {{ $project->project }}
                  </td>

                  <td>
                    <input type="text" name="from" placeholder="Year-Month-Day" class="form-control">
                  </td>
                  <td>
                    <input type="text" name="to" placeholder=" Year-Month-Day" class="form-control">
                  </td>
                <td>
                    <button type="submit" class="btn btn-secondary" >view</button>
                </td>
                  </tr>
                </form>
                  @empty
                      
                  @endforelse

                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                {!! $projects->links() !!}
            </div>
            </div>
          </div>
        </div>
      </div>

    
    @endsection