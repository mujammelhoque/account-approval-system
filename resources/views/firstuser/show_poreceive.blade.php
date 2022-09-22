
 
  
@extends('firstuser.layout')
@section('pagecontent')

<div class="right_col" role="main">
  <div >
 
      <div class="clearfix"></div>

      <div class="row">
          <div class="col-md-12 col-sm-12">
              <div class="x_panel">
              
                  <div class="x_content">
            <h4 class="card-title">PO Display Table</h4>

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
                        From Industry Name
                    </th>
                    <th>
                        Industry Reference Number       
                    </th>
                    <th>
                        Industry Reference Date       
                    </th>
                   
                    <th>
                        Work Scope
                    </th>
                    <th>
                       PO Mature Date
                    </th>
                    <th>
                        PO Amount
                    </th>
                    <th>
                        Posted by
                    </th>
                  
                  </tr>
                </thead>
                <tbody>
                  @forelse ($poreceive as $data)  
                  @php
                     $userData= App\Models\User::find($data->posted_by);
                  @endphp
               
                  <tr>
                    {{-- <td class="py-1">
                    {{ $userData->username }}
                    </td> --}}
                    <td>
                      {{ $data->from_industry_name }}
                    </td>
                    <td>
                      {{ $data->industry_ref_number	 }}
                    </td>
                  
                    <td>
                        {{ $data->industry_ref_date }}
                    </td>

                    <td>
                        {{ $data->work_scope }}
                    </td>

                    <td>
                        {{ $data->po_mature_date }}
                    </td>

                    <td>
                        {{ $data->po_amount }}
                    </td>

                    <td>
                        {{ $userData->username }}
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
</div>
</div>
</div>

    
    @endsection