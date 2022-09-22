
    @extends('firstuser.layout')
    @section('pagecontent')
  

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
           
                <div class="clearfix"></div>
    
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                        
                            <div class="x_content">
                                <div>
                                    @if ($message = Session::get('success'))
                                    <br>
                                    <div class="alert alert-success ">
                                        <p>{{ $message }}</p>
                                    </div>
                                    @endif
                                  </div>
            <h4 class="card-title">PO Receive Creating Table</h4>
        
                  <form class="forms-sample" action="{{ route('apply-amount') }}" method="POST" >
                    @csrf
            
                  
                      <input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}">

                      @if ( auth()->user()->created_by == 0)
                      <input type="hidden" name="table_name" value="{{auth()->user()->username}}_applyamount">
                          
                      @else
                      @php
                         $admin_username = App\Models\User::find(auth()->user()->created_by);
                      @endphp
                      <input type="hidden" name="table_name" value="{{$admin_username->username}}_applyamount">

                      @endif

                      <div class="form-group">
                        <label for="department">Department</label>
                        <select name="department" id="department" class="form-group">
                          <option readonly  value="">Select One</option>
                          <option value="1">Electrical</option>
                          <option value="2">Enrgy Audit</option>
                          <option value="3">Construction</option>
                        </select>

                      </div>
            
                   

                    <div class="form-group">
                      <label for="projectName">Project Name</label>
                      <input type="text" class="form-group" name="projectName" id="projectName">
                    </div>

                    <div class="form-group">
                      <label for="purpose">Purpose</label>
                      <input type="text" class="form-group" name="purpose" id="purpose">
                    </div>

                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" class="form-group" name="description">
                    </div>

                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="number" class="form-group" name="price">
                    </div>

                    <div class="form-group">
                      <label for="quantity"> Quantity</label>
                      <input type="text" class="form-group" name="quantity">
                    </div>

                    <div class="form-group">
                      <label for="date">Expected Date</label>
                      <input type="date" class="form-group" name="date">
                    </div>

                    <div class="form-group">
                      <label >Apply Amount</label>
                      <input type="number" class="form-control" name="apply_amount">
                    </div>
                 

                    {{-- <div class="form-group">
                      <label >Comment</label>
                      <input type="text" class="form-control" name="comment">
                    </div> --}}
                
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
  
                  </form>
           
      
                </div>
            </div>
          </div>
    
    
        
        @endsection