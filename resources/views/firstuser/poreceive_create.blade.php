
 
  
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
        
                  <form class="forms-sample" action="{{ route('po-receive-store') }}" method="POST" >
                    @csrf
            
                  
                      <input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}">

                      @if ( auth()->user()->created_by == 0)
                      <input type="hidden" name="table_name" value="{{auth()->user()->username}}_poreceived">
                          
                      @else
                      @php
                         $admin_username = App\Models\User::find(auth()->user()->created_by);
                      @endphp
                      <input type="hidden" name="table_name" value="{{$admin_username->username}}_poreceived">

                      @endif

            
                    <div class="form-group">
                      <label>Form Industry Name</label>
                      <input type="text" class="form-control" name="from_industry_name">
                    </div>

                    <div class="form-group">
                      <label >Industry Ref Numnber</label>
                      <input type="text" class="form-control" name="industry_ref_number">
                    </div>

                    <div class="form-group">
                      <label >Industry Ref Date</label>
                      <input type="date" class="form-control" name="industry_ref_date">
                    </div>

                    {{-- <div class="form-group">
                      <label >Work Scope</label>
                      <input type="text" class="form-control" name="work_scope">
                    </div> --}}
                
                    <div class="form-group">
                      <label >Work Scope</label>
                      <select name="work_scope" class="form-control" >
                        <option value="" disabled selected> Select one</option>
                        @forelse ($workflow as $work)
                        @if ($work->expenditure_item==null)
                            @continue
                        @endif
                        <option value="{{ $work->expenditure_item }}">{{ $work->expenditure_item }}</option>
                            
                        @empty
                            
                        @endforelse
                      </select>
                    </div>

                    <div class="form-group">
                      <label >PO Mature Date</label>
                      <input type="date" class="form-control" name="po_mature_date">
                    </div>

                    <div class="form-group">
                      <label >PO Amount</label>
                      <input type="text" class="form-control" name="po_amount">
                    </div>
                
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
  
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /page content -->

    
    @endsection