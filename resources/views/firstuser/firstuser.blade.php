@extends('firstuser.layout')
@section('pagecontent')

           <!-- page content -->
           <div class="right_col" role="main">
            
            <!-- top tiles -->
            <div class="row" style="display: inline-block;" >
            <div class="tile_count">
              @if (count($errors) > 0)
              <div class = "alert alert-danger ">
                 <ul>
                    @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                    @endforeach
                 </ul>
              </div>
              @endif
          </div>
          
          <!-- /top tiles -->



        </div>
        </div>
        <!-- /page content -->
@endsection