<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IncomeExpenseController extends Controller
{

    public function incomeCreate(){
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_income_expense';
            $bank_table = auth()->user()->username.'_bank';
            $branch_table = auth()->user()->username.'_branch';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_income_expense';
            $bank_table=$admin_username->username.'_bank';
            $branch_table=$admin_username->username.'_branch';
        }
        // $credit_number = DB::table($table_name )->max('credit_voucher_number')+1;
         $banks= DB::table($bank_table )->get();
         $branchs= DB::table($branch_table )->get();
        if (auth()->user()->created_by == 0) {
            return view('firstuser.income_create', compact('banks','branchs'));
            
        }else{
            // dd(auth()->user()->created_by);
            return view('seconduser.income_create',compact('banks','branchs'));
    
        }

    }
    //......................................................//

    public function ExpenseCreate(){
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_income_expense';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_income_expense';
        }
        // $debit_number = DB::table($table_name )->max('debit_voucher_number')+1;
        if (auth()->user()->created_by == 0) {
            return view('firstuser.expense_create');
            
        }else{
            // dd(auth()->user()->created_by);
            return view('seconduser.expense_create');
    
        }
    }
    //......................................................//


    public function income_info_store(Request $request){
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_income';
            $sub_table_name = auth()->user()->username.'_subincome';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_income';
            $sub_table_name=$admin_username->username.'_subincome';
        }
        $data = $request->all();
        $projectId= $data['project'];
        $incomedata = DB::table($sub_table_name)->where([['project_id','=',$projectId]])->first();

        DB::table($table_name)->insert([
            'from'                  => $data['from']??'',
            'bank'                  => $data['bank']??'',
            'branch'                => $data['branch']??'',
            'project'               => $data['project']??'',
            'department'            => $data['department']??"",
            'check_amount'          => $data['check_amount']??'',
            'cash_amount'          => $data['cash_amount']??'',
            'date'                  => $data['date']??'',
            'check_no'              => $data['check_no']??'',
            'posted_by'             => auth()->user()->id,
            'approval_id'           => $data['approval_id']??'',
        ]);

        if (!isset($incomedata)) {
          
            DB::table($sub_table_name)->insert([
                'project_id'    => $projectId,
                'total'    => $data['check_amount']??$data['cash_amount'],
                'decrement_income'    => $data['check_amount']??$data['cash_amount'],            
            ]);

        }else{
                $increment =$incomedata->total + $data['check_amount']??$data['cash_amount']; 
                $decrement_income =$incomedata->decrement_income + $data['check_amount']??$data['cash_amount']; 
            DB::table($sub_table_name)
            ->where('project_id', $projectId)
            ->update([
                'project_id'    => $projectId,
                'total'    => $increment,            
                'decrement_income'    => $decrement_income,            
            ]);
        }  

     
        return back()->with('success','Data inserted successfully.');
          }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
