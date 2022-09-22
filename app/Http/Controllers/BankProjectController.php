<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;

class BankProjectController extends Controller
{
    public function create_department(Request $request)
    { 
        // dd("yes");
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_department';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_department';
        }

        $this->validate($request, [
            'department' => ['required', 'max:255','unique:'.$table_name]
         ]);

         $data = $request->all();
            
        DB::table($table_name )->insert([
            'department' =>    $data['department'],
            // 'created_at' =>    date('d-m-y h:i:s')
        ]);
    
        return back()->with('success','your departmentproject-create creation is successful.');
        
    }

    //...........................................//
    public function bank_create(Request $request)
    { 
        // dd("yes");
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_bank';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_bank';
        }

        $this->validate($request, [
            'bank' => ['required', 'max:255','unique:'.$table_name]
         ]);

         $data = $request->all();
            
        DB::table($table_name )->insert([
            'bank' =>    $data['bank'],
            'created_at' =>    date('d-m-y h:i:s')
        ]);
    
        return back()->with('success','your bank creation is successful.');
        
    }

    //...........................................//
    public function branch_create(Request $request)
    { 
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_branch';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_branch';
        }
         $data = $request->all();
            
        DB::table($table_name )->insert([
            'bank_id' =>    $data['bank_id'],
            'branch' =>    $data['branch'],
            'created_at' =>    date('d-m-y h:i:s')

        ]);
    
        return back()->with('success','your branch creation is successful.');
        
    }
    // ............................................//

    public function project_create(Request $request)
    { 
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_project';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_project';
        }

        $this->validate($request, [
            'project' => ['required', 'max:255','unique:'.$table_name]
         ]);

         $data = $request->all();
            
        DB::table($table_name )->insert([
            'department_id' =>    $data['department_id'],
            'project' =>    $data['project'],
            'created_at' =>    date('d-m-y h:i:s')

        ]);
    
        return back()->with('success','your project creation is successful.');
        
    }

    // .........................................//
    public function get_branch(Request $request)
    {
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_branch';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_branch';
        }
        $branch = DB::table($table_name)
        ->where("bank_id",$request->bank_id)
        ->pluck("branch","id");
        return response()->json($branch);
    }

     // ........................................//

    public function get_department(Request $request)
    {
        if ( auth()->user()->created_by == 0){
            $departmentTable = auth()->user()->username.'_department';
            $projectTable = auth()->user()->username.'_project';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $departmentTable=$admin_username->username.'_department';
            $projectTable=$admin_username->username.'_project';
        }
        $project = DB::table($projectTable)
        ->where("id",$request->project_id)
        ->first();

        $department = DB::table($departmentTable)
        ->where("id",$project->department)
        ->pluck("department","id");
    
        return response()->json($department);
       
    }
        // ........................................//
        public function projects_index(){
            if ( auth()->user()->created_by == 0){
                $table_name = auth()->user()->username.'_project';
            }else{
                $admin_username = User::find(auth()->user()->created_by);
                $table_name=$admin_username->username.'_project';
            }
            $projects = DB::table($table_name)
            ->orderBy('id','desc')
            ->paginate(15);
            return view("seconduser.projects_index",compact('projects'));

        }
                // ........................................//

        public function projects_show(Request $request, $id){
            
            if ( auth()->user()->created_by == 0){
                $project_table = auth()->user()->username.'_project';
                $income_table = auth()->user()->username.'_income';
                $subIncome_table = auth()->user()->username.'_subincome';
                $applyAmount_table = auth()->user()->username.'_applyamount';
            }else{
                $admin_username = User::find(auth()->user()->created_by);
                $project_table=$admin_username->username.'_project';
                $income_table=$admin_username->username.'_income';
                $subIncome_table=$admin_username->username.'_subincome';
                $applyAmount_table=$admin_username->username.'_applyamount';
            }
            $project = DB::table($project_table)
          ->find($id);
          //,,,,,,,,,,,,,,,,,,,,,,,,,,,,/
          $incomeInfo = DB::table($income_table)
          ->where([
              ['project','=' , $id],
          ])
          ->get();
            //,,,,,,,,,,,,,,,,,,,,,,,,,,,,/

          $subIncomeInfo = DB::table($subIncome_table)
          ->where([
              ['project_id','=' , $id],
          ])
          ->first();
     
        //,,,,,,,,,,,,,,,,,,,,,,,,,,,,/
        if ($request->from !=null and $request->to!=null) {
            // dd('yes');
            $applyAmountInfo = DB::table($applyAmount_table)
            ->whereBetween('created_at', [$request->from, $request->to])
            ->where([
                ['project','=' , $id],
                ['status','=' , "final"],
            ])
            ->get();
        }else{
            $applyAmountInfo = DB::table($applyAmount_table)
            ->where([
                ['project','=' , $id],
                ['status','=' , "final"],
            ])
            ->get();
        }

         
         //,,,,,,,,,,,,,,,,,,,,,,,,,,,,/

    //    dd($request->from);
            return view("seconduser.projects_show",compact('project','incomeInfo','subIncomeInfo','applyAmountInfo'));

        }
       
        // ........................................//
        public function addNewMaterial(Request $request){
            if ( auth()->user()->created_by == 0){
                $table_name = auth()->user()->username.'_materials';
            }else{
                $admin_username = User::find(auth()->user()->created_by);
                $table_name=$admin_username->username.'_materials';
            }
            $this->validate($request, [
                'material' => ['required', 'max:255','unique:'.$table_name]
             ]);
    
            $data = $request->all();
             DB::table($table_name)->insert([
            'material' => $data['material'],
                    
             ]);
          
            return response()->json($data);
        }

        //.................................................//

        public function material_create(Request $request){
            if ( auth()->user()->created_by == 0){
                $table_name = auth()->user()->username.'_materials';
            }else{
                $admin_username = User::find(auth()->user()->created_by);
                $table_name=$admin_username->username.'_materials';
            }

            $this->validate($request, [
                'material' => ['required', 'max:255','unique:'.$table_name]
             ]);

            DB::table($table_name)->insert([
                'material' => $request->material,    
                 ]);

       $materils = DB::table($table_name)
       ->pluck("material","id");
        return response()->json($materils);

         }
      

        public function unit_create(Request $request){
            if ( auth()->user()->created_by == 0){
                $table_name = auth()->user()->username.'_units';
            }else{
                $admin_username = User::find(auth()->user()->created_by);
                $table_name=$admin_username->username.'_units';
            }

            $this->validate($request, [
                'unit' => ['required', 'max:255','unique:'.$table_name]
             ]);

            DB::table($table_name)->insert([
                'unit' => $request->unit,    
                 ]);

       $units = DB::table($table_name)
       ->pluck("unit","id");
        return response()->json($units);

         }
        //  --------------------------------------------------
        public function total_fund(){
            if ( auth()->user()->created_by == 0){
                $subincomeTable = auth()->user()->username.'_subincome';
                $projectTable = auth()->user()->username.'_project';
                $departmentTable = auth()->user()->username.'_department';
            }else{
                $admin_username = User::find(auth()->user()->created_by);
                $subincomeTable=$admin_username->username.'_subincome';
                $projectTable=$admin_username->username.'_project';
                $departmentTable=$admin_username->username.'_department';
            }

            $totalfound = DB::table($subincomeTable)
    ->join($projectTable, $projectTable.'.id', '=', $subincomeTable.'.project_id')
    ->join($departmentTable, $departmentTable.'.id', '=', $projectTable.'.department_id')
    // ->groupBy($projectTable.'.department_id')
    // ->groupBy($projectTable.'.project')

    // ->where('followers.follower_id', '=', 3)
    ->get()
    ->groupBy(function($data) {
        return $data->department_id;
    });;
    // dd($totalfound);
    return view("seconduser.total_fund",compact('totalfound'));



         }
      




    

}
