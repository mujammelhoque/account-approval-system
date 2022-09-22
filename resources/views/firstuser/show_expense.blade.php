
 
  
@extends('firstuser.layout')
@section('pagecontent')

<div class="right_col" role="main">
  <div >
 
      <div class="clearfix"></div>

      <div class="row">
          <div class="col-md-12 col-sm-12">
              <div class="x_panel">
              
                  <div class="x_content">
            <h4 class="card-title">Expense Amount Table</h4>

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
                        debit_voucher_number                    </th>
                    <th>
                        Expenditure Item                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        To
                    </th>
                 
                    <th>
                        Cash Amount 
                    </th>
                    <th>
                        Updated Voucher Number
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($expense as $data)  
                  @php
                     $userData= App\Models\User::find($data->posted_by);
                  @endphp
               
                  <tr>
                    {{-- <td class="py-1">
                    {{ $userData->username }}
                    </td> --}}
                    <td>
                      {{ $data->debit_voucher_number }}
                    </td>
                    <td>
                      {{ $data->expenditure_item }}
                    </td>
                  
                    <td>
                        {{ $data->date }}
                      {{-- {{date('d-m-Y', $data->created_at)}} --}}
                    </td>

                    <td>
                        {{ $data->particulars }}
                    </td>


                    <td>
                        {{ $data->cash_amount }}
                    </td>

                    <td>
                        {{ $data->updated_voucher_number }}
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