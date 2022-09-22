<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function final_approve(Request $request)
    {
        // dd($request->all());
        $id=$request->id;
        $project_id=$request->project_id;
        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_applyamount';
            $sub_table = auth()->user()->username.'_sub_applyamount';
            $income_table = auth()->user()->username.'_income';
            $project_table = auth()->user()->username.'_project';
            $incomeNewAmount_table = auth()->user()->username.'_subincome';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table=$admin_username->username.'_applyamount';
            $sub_table=$admin_username->username.'_sub_applyamount';
            $income_table=$admin_username->username.'_income';
            $project_table=$admin_username->username.'_project';
            $incomeNewAmount_table=$admin_username->username.'_subincome';
        }

        DB::table($incomeNewAmount_table)
        ->where('project_id', $request->project_id)
        ->update([
                    'decrement_income' => $request->reduceFromIncome,
                ]);
                //*************//
        DB::table($table)
        ->where([
            ['id','=', $id],
            ['project','=',$request->project_id],
       ])
        ->update([
                    'status' => 'final'
                ]);

        return back()->with('success','Voucher is created successfully');

  
        
    }

    public function generatePDF(Request $request)
    {
        $id=$request->id;
        $project_id=$request->project_id;
        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_applyamount';
            $sub_table = auth()->user()->username.'_sub_applyamount';
            $income_table = auth()->user()->username.'_income';
            $project_table = auth()->user()->username.'_project';
            $incomeNewAmount_table = auth()->user()->username.'_subincome';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table=$admin_username->username.'_applyamount';
            $sub_table=$admin_username->username.'_sub_applyamount';
            $income_table=$admin_username->username.'_income';
            $project_table=$admin_username->username.'_project';
            $incomeNewAmount_table=$admin_username->username.'_subincome';
        }

        $subinfo = DB::table($sub_table)->where([['applyamount_id','=',$id]])->get();
        $projectInfo = DB::table($project_table)->find($project_id);

        $info = DB::table($table)->find($id);

        $pdf = PDF::loadView('myPDF', compact('subinfo','info','projectInfo'));
  
        return $pdf->download('resl.pdf');
        
    }

    public function all_approve_projects_pdf($id)
    {
       
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

          $applyAmountInfo = DB::table($applyAmount_table)
          ->where([
              ['project','=' , $id],
              ['status','=' , "final"],
          ])
          ->get();
         //,,,,,,,,,,,,,,,,,,,,,,,,,,,,/
         $pdf = PDF::loadView('myPdf2',compact('project','incomeInfo','subIncomeInfo','applyAmountInfo'));
  
         return $pdf->download('finalAll.pdf');
    //    dd($incomeInfo);
        
    }
}