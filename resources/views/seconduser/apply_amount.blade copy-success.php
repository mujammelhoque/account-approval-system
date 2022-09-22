
    @extends('seconduser.layout')
    @section('pagecontent')
 

    @if ( auth()->user()->created_by == 0)
              @php
                  $table = auth()->user()->username;
                  // $tablename =$table.'_approvalmatrix';
                  $tablename =$table.'_project';

                  $departmentTable =$table.'_department';
                  $materialsTable =$table.'_materials';


              @endphp
                  
              @else
              @php
                 $admin_username = App\Models\User::find(auth()->user()->created_by);
                 $table = $admin_username->username;
                  $tablename =$table.'_project';
                  $departmentTable =$table.'_department';
                  $materialsTable =$table.'_materials';

                 
              @endphp
                 @endif
              @php
                  $projects = DB::table($tablename)
                  ->orderBy('id','desc')
                  ->get();

                  $departments = DB::table($departmentTable)
                  ->orderBy('id','desc')
                  ->get();

                  $materials = DB::table($materialsTable)
                  ->orderBy('id','desc')

                  ->get();

                
              @endphp

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div>
            @if ($message = Session::get('success'))
            <br>
            <div class="alert alert-success ">
                <p>{{ $message }}</p>
            </div>
            @endif
          </div>
          <div class="card-body bg-light">
            <h4 class="card-title">Application Amount Form</h4>
        
                  <form class="forms-sample" action="{{ route('apply-amount') }}" method="POST" >
                    @csrf
            
                  
                      <input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}">

                    
                      @php
                      $unitname=['kg','liter',"dozen","piece"];
                 
                      @endphp

                      
                      <div class="form-group">
                        <label for="department">Department</label>
                        <select name="department" id="department" class="form-control">
                          <option readonly  value="">Select One</option>
                         @forelse ($departments as $department)
                         <option value="{{ $department->id }}">{{ $department->department }}</option>
                             
                         @empty
                             
                         @endforelse
                        </select> 

                      </div>
            
                   

                    <div class="form-group">
                      <label for="project">Project Name</label>
                <select name="project" id="project" class="form-control">
                  <option value="" readonly> select a project</option>
                  @forelse ($projects as $project)
                  <option value="{{ $project->id }}">{{ $project->project }}</option>
                      
                  @empty
                      
                  @endforelse
                  </select>                      
                    </div>

                    <div class="form-group">
                      <label for="purpose">Purpose</label>
                      <input type="text" class="form-control" name="purpose" id="purpose">
                    </div>
                    {{-- http://jsfiddle.net/cyraf1q9/ --}}
                    <div class="bg-secondary">
                    <table id="addaccount" class="table table-bordered">
                      <thead>
                      <tr>
                          <th>Matrials
                          </th>
                          <th>Price</th>
                          <th>Unit Name</th>
                          <th>Quantity</th>
                          <th>Sub Total</th>
                          <th>
                                  <button type="button" class="btn btn-success" name="add" id="addnewitem">Add</button>
                                {{-- <div class="input-group-append">
                                  <button class="btn btn-danger" type="submit">Remove</button>
                                </div>  --}}
                           </th>
               
                    
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          {{-- <input type="text" name="matrial[]" class="form-control" > --}}
                          {{-- <select name="material[]" id="material" class="form-control form-control-lg select2">
                            @forelse ($materials as $material)
                                <option value="{{ $material->material }}">{{ $material->material }}</option>
                            @empty
                                
                            @endforelse
                          
                      
                          </select> --}}
                          <select name="material[]" id="select2" class="form-control btn-form-client select2 w-100">
                            <option value="" disabled>select on material</option>
                            @forelse ($materials as $material)
                                <option value="{{ $material->material }}">{{ $material->material }}</option>
                            @empty
                                
                            @endforelse
                         
                          </select>
                        </td>
                     
                        <td>
                          <input type="number" step=any  class="form-control item_price" name="item_price[]">

                        </td>
                        <td> <select name="unit_name[]" class="form-control" id=""><option value="">select one</option> @forelse ($unitname as $item) <option value="{{ $item }}">{{ $item }}</option> @empty @endforelse </select></td>

                        <td>
                          <input type="number" step=any  name="quantity[]" class="form-control quantity">


                        </td>
                        <td>
                          <input type="number" step=any  class="form-control price sub_total"  readonly  name="sub_total[]">

                        </td>
                        <td>   
                            {{-- <input class="sumamtcollected form-control " name="accttotal[]" type="text" value="" readonly > --}}
                          </td>
                      </td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="6">
                          <label ><strong>Apply Amount</strong> </label>
                          <input class="sumamtcollected form-control "  name="apply_amount" step=any  type="number" value="" readonly >
                        </td>
                      </tr>
                    </tfoot>
                     
      
                  </table>
                </div>
                
                   

                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" name="description">
                    </div>


                 

                    <div class="form-group">
                      <label for="date">Expected Date</label>
                      <input type="date" class="form-control" name="date">
                    </div>
                    
               
                    
        <script>
          $(document).ready(function(){

$('.select2').select2({
  placeholder:'Select material',
  theme:'bootstrap4',
  tags:true,
}).on('select2:close', function(){
  var element = $(this);
  var new_material = $.trim(element.val());

  if(new_material != '')
  {
    $.ajax({
      type:"POST",
      url:"{{url('add-new-material')}}",
    data:{new_material:new_material},
    success: function(data){
      console.log(data)

      if(data == 'yes')
        {
          console.log(data);

         element.append('<option value="'+new_material+'">'+new_material+'</option>').val(new_material);
        }

}
})
}

});

});
/////
$('.btn-form-client').click(function() {
        $.ajax({
          url:"{{url('add-new-material')}}",
            dataType: 'json',
            type: 'post',
            // data: $('#frm-client').serialize()
        }).done(function (data) {
            // $('#modal-client').modal('hide')
        });
        return false;
    })
        
        </script>
                
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
  
                  </form>
           {{-- https://www.infinetsoft.com/Post/How-to-display-sum-of-two-textbox-values-in-third-textbox-automatically/1404#.YhdlJIpBzIU --}}
         
          </div>
        </div>
      </div>
      
     
      <script>
          
        $(function () {
      // Append Invoice Line
        $(document).on('click', '#addnewitem', function () {
          var currentTable = $(this).closest('table').attr('id');
          $('#' + currentTable ).append('<tr><td><select name="material[]" id="select2" class="form-control select2 w-100"><option value="" disabled>select on material</option> @forelse ($materials as $material) <option value="{{ $material->material }}">{{ $material->material }}</option> @empty @endforelse </select></td><td><input type="number" step=any class="form-control item_price"  name="item_price[]"></td><td> <select name="unit_name[]" class="form-control" id=""><option value="">select one</option> @forelse ($unitname as $item) <option value="{{ $item }}">{{ $item }}</option> @empty @endforelse </select></td><td> <input type="number" step=any name="quantity[]" class="form-control quantity"></td><td><input type="number" step=any class="form-control price sub_total"  name="sub_total[]" readonly></td><td><button type="button" class="btn btn-outline-danger removeItem remove-input-field"><i class="fas fa-trash"></i></button></td></tr>');
         $('.quantity').on('change', onChangeCallback);});
       
       
      
        
         
       //Remove Invoice Line
    $(document).on('click', '.removeItem', function () { 
        var currentTable = $(this).closest('table').attr('id');
        $(this).closest('tr').remove();
        calculateTableSum(currentTable);
    });
    
      
    function calculateSum() {
        var currentTable = $(this).closest('table').attr('id');
        calculateTableSum(currentTable);
    }
    
    function calculateTableSum(currentTable) {
        var sum = 0;
        $('#' + currentTable + ' input.sub_total').each(function() {
            //add only if the value is number
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });
        //.toFixed() method will roundoff the final sum to 2 decimal places
        $('#' + currentTable + ' input.sumamtcollected').val(sum.toFixed(2));
    }
    $(document).on('change', 'input.sub_total', calculateSum);
    
    var onChangeCallback = function () { 
       var currentTable = $(this).closest('table').attr('id');
       var itemprice = $(this).parents('tr').find('.item_price').val();
       var  getquantity = $(this).parents('tr').find('.quantity').val();
       
       var quantity =	itemprice * getquantity ;
        var total =	 parseFloat(quantity);
      
      //  $(this).parents('tr').find('.item_tax').val(tax.toFixed(2));
       $(this).parents('tr').find('.sub_total').val(total.toFixed(2));
       calculateTableSum(currentTable);
    
       };
                
     $('.quantity').on('change', onChangeCallback);
       
    
    });
    
          </script>

    
    @endsection