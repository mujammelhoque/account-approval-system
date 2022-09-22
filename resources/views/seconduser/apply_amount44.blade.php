<?php

//index.php

// include('database_connection.php');

// $query = "
//   SELECT * FROM users 
// ORDER BY name ASC
// ";

// $result = $con->query($query);

?>

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

<!DOCTYPE html>
<html>
  <head>
    <title>Dynamically Add New Option in Select2 using Ajax in PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    	<!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <script src="{{asset('cssJsVendor')}}/bootstrap/dist/js/bootstrap.bundle.min.js"></script> --}}

    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    
    <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  </head>
  
  <body>
  	<div class="container">
  		<br />
  		<br />
    	<h1 align="center">Dynamically Add New Option Tag in Select2 using Ajax in PHP</h1>
    	<br />
    	<br />	
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <select name="material" id="material" class="form-control form-control-lg select2">
            @forelse ($materials as $material)
                <option value="{{ $material->material }}">{{ $material->material }}</option>
            @empty
                
            @endforelse
            <?php
            // foreach($result as $row)
            // {
            //   echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
            // }
            ?>
          </select>
        </div>
      </div> 
    </div>
  </body>
</html>

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
                url:"{{url('add-new-material')}}",
                method:"POST",
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
          
// $(document).ready(function(){

//   $('.select2').select2({
//     placeholder:'Select name',
//     theme:'bootstrap4',
//     tags:true,
//   }).on('select2:close', function(){
//     var element = $(this);
//     var new_name = $.trim(element.val());

//     if(new_name != '')
//     {
//       $.ajax({
//         url:"add.php",
//         method:"POST",
//         data:{add_name:new_name},
//         success:function(data)
//         {
//           if(data == 'yes')
//           {
//             element.append('<option value="'+new_name+'">'+new_name+'</option>').val(new_name);
//           }
//         }
//       })
//     }

//   });

// });

</script>
