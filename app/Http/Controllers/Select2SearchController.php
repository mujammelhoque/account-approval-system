<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Select2SearchController extends Controller
{
    
   
    public function selectSearch(Request $request)
    {
        
        if ( auth()->user()->created_by == 0){
            $materialsTable = auth()->user()->username.'_materials';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $materialsTable=$admin_username->username.'_materials';
        }
    	$movies = [];

        if($request->has('q')){
            
            $search = $request->q;
            $movies =DB::table($materialsTable)
            ->select("id", "material")
            		->where('material', 'LIKE', "%$search%")
            		->get();
        }
        // return $movies;
        return response()->json($movies);
    }

    
    }
