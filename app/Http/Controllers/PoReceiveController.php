<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PoReceiveController extends Controller
{

    public function poReceiveCreate(){

        if (auth()->user()->created_by == 0) {
            $admin = auth()->user()->id;
            $table_name = auth()->user()->username.'_income_expense';

        }else{
               $find= User::find(auth()->user()->created_by);
               $admin = $find->id;
            $table_name=$find->username.'_income_expense';
        }
        //
        // dd($admin);
        $workflow = DB::table($table_name)
        ->where([
            ['admin_id','=' ,$admin],
        ])
        ->orderBy('id','desc')
        ->get();

//
           if (auth()->user()->created_by == 0) {

            return view('firstuser.poreceive_create',compact('workflow'));
    
        }else{
            return view('seconduser.poreceive_create',compact('workflow'));
    
        }

    }

    public function poReceiveStore(Request $request){
        $data = $request->all();
        // dd($request->all());
        DB::table($data['table_name'])->insert([
            'from_industry_name'        => $data['from_industry_name']??NULL,
            'industry_ref_number'       => $data['industry_ref_number']??NULL,
            'industry_ref_date'         => $data['industry_ref_date']??NULL,
            'work_scope'                => $data['work_scope']??NULL,
            'po_mature_date'            => $data['po_mature_date']??NULL,
            'po_amount'                 => $data['po_amount']??NULL,
            'posted_by'                 => $data['user_id']??NULL,
            'admin_id'                 => $data['admin_id']??NULL,
            
        ]);
     

        return back()->with('success','Data inserted successfully.');
        ; 
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
