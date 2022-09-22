
 
  
    @extends('seconduser.layout')
    @section('pagecontent')
            


    
        <div class="content-wrapper">
          <div class="row">
         

            <div class="col-lg-12 grid-margin stretch-card " >
              <div class="card">
                <div class="card-body" style="height: 600px">
                  
                </div>
              </div>
            </div>
            
                {{-- end second user modal --}}
        {{-- .start modal for creating in dynamic table  --}}   
   @include('firstuser.partials.modal')
   {{-- end modal for creating in dynamic table  --}}
          </div>
          
        </div>
        <!-- content-wrapper ends -->


    
    @endsection