
    @extends('seconduser.layout')
    @section('pagecontent')
 <div class="d-flex justify-content-between"  style= "white-space: nowrap; overflow-x: scroll;">
  
    @if ( auth()->user()->created_by == 0)
              @php
                  $table = auth()->user()->username;
                  // $tablename =$table.'_approvalmatrix';
                  $tablename =$table.'_project';

                  $departmentTable =$table.'_department';
                  $materialsTable =$table.'_materials';
                  $unitsTable =$table.'_units';


              @endphp
                  
              @else
              @php
                 $admin_username = App\Models\User::find(auth()->user()->created_by);
                 $table = $admin_username->username;
                  $tablename =$table.'_project';
                  $departmentTable =$table.'_department';
                  $materialsTable =$table.'_materials';
                  $unitsTable =$table.'_units';

                 
              @endphp
                 @endif
              @php
                  $projects = DB::table($tablename)
                  ->orderBy('id','desc')
                  ->get();

                  // $departments = DB::table($departmentTable)
                  // ->orderBy('id','desc')
                  // ->get();

                  $materials = DB::table($materialsTable)
                  ->orderBy('id','desc')

                  ->get();
                  $units = DB::table($unitsTable)
                  ->orderBy('id','desc')

                  ->get();

                
              @endphp
    <div class="grid-margin stretch-card">
        <div class="card">
          @if (count($errors) > 0)
          <div class = "alert alert-danger ">
             <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
             </ul>
          </div>
          @endif
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
            

                    <div class="form-group">
                      <label for="project">Project Name</label>

                <select name="project" id="project" class=" project form-control">
                  <option selected disabled> select one </option>

                  @forelse ($projects as $project)
                      <option value="{{ $project->id }}">{{ $project->project }}</option>
                  @empty
                      
                  @endforelse
                  </select>                      
                    </div> 

                    <div class="form-group">
                      <label for="purpose">Purpose</label>
                      <input value="{{ old('purpose') }}" type="text" class="form-control" name="purpose" id="purpose">
                    </div>
                {{-- <fieldset>
                  <legend></legend>
                </fieldset> --}}
                    {{-- http://jsfiddle.net/cyraf1q9/ --}}
                    <div class="bg-">
                    <table id="addaccount" class="table table-bordered">
                      
                      <thead>
                       <tr>
                        <em class="text-danger">First Create Your Material and Unit Name If No Exists then  <a href="{{ route('loan-application') }}">refresh <i class="fa fa-refresh" aria-hidden="true"> </i></a></em>
                       </tr>

                      <tr>
                          <th>
                            Matrials <a class="btn text-info" data-toggle="modal" data-target="#materialModal"> <i class="fa-solid fa-plus" style="font-size: 25px"  ></i></a>
                          </th>
                          <th>Quantity</th>
                          <th>Unit Name <a class="btn text-success"  data-toggle="modal" data-target="#unitModal"> <i class="fa-solid fa-plus" style="font-size: 25px"  ></i></th>
                          <th>Price</th>
                          <th>Sub Total</th>
                          <th>
                                  <button type="button" class="btn btn-success newMaterial btn_add" name="add" id="addnewitem">Add</button>
                          
                           </th>
               
                    
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <select name="material[]" class="form-control" id="material">
                            <option selected disabled> select one </option>
                         @forelse ($materials as $material)
                             <option value="{{$material->material}}">{{$material->material}}</option>
                         @empty
                             
                         @endforelse
                          </select>
                        </td>
                     
                        <td>
                          <input type="number" step=any  name="quantity[]" class="form-control quantity">
                        </td>
                        <td> <select name="unit[]" class="form-control unit" ><option disabled selected >select one</option> @forelse ($units as $unit) <option value="{{ $unit->unit }}">{{ $unit->unit }}</option> @empty @endforelse </select></td>

                        <td>
                          <input type="number" step=any  class="form-control item_price" name="item_price[]">
                        </td>

                        <td>
                          <input type="number" step=any  class="form-control price sub_total"  readonly  name="sub_total[]">
                        </td>

                        <td>   
                          </td>
                      </td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="6">
                          <label ><strong>Apply Amount</strong> </label>
                          <input class="sumamtcollected form-control " value="{{ old('apply_amount') }}"  name="apply_amount" step=any  type="number" readonly >
                        </td>
                      </tr>
                    </tfoot>
                     
      
                  </table>
                </div>
                
                <div id="elements"></div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                    </div>


                 

                    <div class="form-group">
                      <label for="date">Expected Date</label>
                      <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                    </div>
                
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
  
                  </form>
           {{-- https://www.infinetsoft.com/Post/How-to-display-sum-of-two-textbox-values-in-third-textbox-automatically/1404#.YhdlJIpBzIU --}}
         
          </div>
        </div>
      </div>
      {{-- cal start --}}
        
  <div class="cal-wrapper">
    <div class="container">
      <h1>Calculator</h1>
      <div class="first-row">
        <input type="text" name="result" class="result" id="result" value="" placeholder="Result" readonly />
      </div>
      <div class="second-row">
        <input type="button" value="1" onclick="liveScreen(1)" id="one" />
        <input type="button" value="2" onclick="liveScreen(2)" id="two" />
        <input type="button" value="3" id="three" onclick="liveScreen(3)" />
        <input type="button" value="+" onclick="liveScreen('+')" />
      </div>
      <div class="third-row">
        <input type="button" value="4" id="four" onclick="liveScreen(4)" />
        <input type="button" value="5" id="five" onclick="liveScreen(5)" />
        <input type="button" value="6" id="six" onclick="liveScreen(6)" />
        <input type="button" value="-" onclick="liveScreen('-')" />
      </div>
      <div class="fourth-row">
        <input type="button" value="7" id="seven" onclick="liveScreen(7)" />
        <input type="button" value="8" id="eight" onclick="liveScreen(8)" />
        <input type="button" value="9" id="nine" onclick="liveScreen(9)" />
        <input type="button" value="x" onclick="liveScreen('*')" />
      </div>
      <div class="fifth-row">
        <input type="button" value="/" onclick="liveScreen('/')" />

        <input type="button" value="0" id="zero" onclick="liveScreen(0)" />
        <input type="button" value="." class="dot" onclick="liveScreen('.')" />
        <input type="button" value="=" onclick="result.value = eval(result.value||null)" />

      </div>
      <div class="fifth-row">
        <input type="button" value="Clear" onclick="clearScreen()" id="clear" />
      </div>
      {{-- <div class="bottom-buttons">
       
        <button onclick="changeTheme()" id="dark-mode">
          Light Mode ☀️
        </button>
      </div> --}}
    </div>
  </div>

      {{-- cal end --}}
      
    </div>
     
  <!-- The satrt Modal -->
  {{-- //.............................// --}}
  <div class="modal" id="materialModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create a Material Name</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <form id="addMateril">
          @csrf

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
              <label for="m">Material Name:</label>
             <input type="text" name="material" id="m" class="form-control">
            </div>
       
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" >Submit</button>
        </div>
      </form>

  
      </div>
    </div>
  </div>
  {{-- //..................................// --}}
  <div class="modal"  id="unitModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">

          <h4 class="modal-title">Create a Unit Name</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <form id="addUnit" >
          @csrf

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
              <label for="unit_name">Unit Name:</label>
              <input type="text" name="unit" class="form-control" id="unit">
            </div>
       
        </div>
      
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" >Submit</button>
        </div>
      </form>

  
      </div>
    </div>
  </div>
  {{-- end modal --}}
  
   
              
  <!-- js for insert data from book modal start-->
   <script type="text/javascript">
   
   $(document).ready(function(){
       $('#addMateril').on('submit', function(e){
           e.preventDefault();
           $.ajax({
               type:"POST",
               url:"{{url('material-create')}}",
               data: $('#addMateril').serialize(),
               success: function(response){
                 
                   var newMaterial =response[Object.keys(response)[0]]
                   console.log(response)
        //            $(".material").empty();
        // $.each(response,function(key,value){
        //   $(".material").append('<option value="'+value+'">'+value+'</option>');
        // });

         $('.material').modal('hide')
            alert("data seaved")
   
                   },
   
                   error: function(error){
                       console.log(error)
                       alert("Data Not Saved Something missing")
                   }
   
           });
       });
   }); 

// ........................................................//
    
// ........................................................//
   $(document).ready(function(){
       $('#addUnit').on('submit', function(e){
           e.preventDefault();
           $.ajax({
               type:"POST",
               url:"{{url('unit-create')}}",
               data: $('#addUnit').serialize(),
               success: function(response){
                 console.log(response)
        //            $(".unit").empty();
        // $.each(response,function(key,value){
        //   $(".unit").append('<option value="'+value+'">'+value+'</option>');
        // });

         $('.unit').modal('hide')
            alert("data seaved")
   
                   },
   
                   error: function(error){
                       console.log(error)
                       alert("Data Not Saved Something missing")
                   }
   
           });
       });
   }); 
                    
        </script>
        

      <script>
          
        $(function () {
      // Append Invoice Line
        $(document).on('click', '#addnewitem', function () {
          var currentTable = $(this).closest('table').attr('id');
          $('#' + currentTable ).append('<tr><td> <select name="material[]" class="form-control" id="material"><option disabled selected> select one </option> @forelse ($materials as $material) <option value="{{$material->material}}">{{$material->material}}</option> @empty @endforelse </select> </td><td> <input type="number" step=any name="quantity[]" class="form-control quantity"></td><td> <select name="unit[]" class="form-control unit" id=""><option value="">select one</option> @forelse ($units as $unit) <option value="{{ $unit->unit }}">{{ $unit->unit }}</option> @empty @endforelse </select></td><td><input type="number" step=any class="form-control item_price"  name="item_price[]"></td><td><input type="number" step=any class="form-control price sub_total"  name="sub_total[]" readonly></td><td><button type="button" class="btn btn-outline-danger removeItem remove-input-field"><i class="fas fa-trash"></i></button></td></tr>');
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
                
     $('.item_price').on('change', onChangeCallback);
     $('.quantity').on('change', onChangeCallback);
       
     
    });
    
          </script>

    
    @endsection
    @section('scripts')
    <script src="{{ asset('calculator/scripts/script.js') }}"></script>

    @endsection