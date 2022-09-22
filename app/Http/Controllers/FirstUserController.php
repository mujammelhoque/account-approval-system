<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;


class FirstUserController extends Controller
{
    
    public function CreateUser(Request $request){
        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
       
         ]);

        $data = $request->all();
         User::create([
            'username' => str_replace(' ', '_', $data['username']),
            'org_name' => $data['org_name'],
            'access_roll' => $data['access_roll'],
            'created_by' => $data['created_by'],
            'email' => $data['email'],
            'finance_justifier' => $data['finance_justifier'],
            'department' => $data['department'],
            'password' => Hash::make($data['password']),
        ]);
        return back();
    }

    public function all_approved_amount(){
      
            $table = auth()->user()->username.'_applyamount';
            //appr_role =3 means approved
            $allapprove = DB::table($table)
            ->where([
                ['appr_role','=' , 3],
            ])
            ->orderBy('id','desc')
            ->get();
            return view('firstuser.all_approve', compact('allapprove'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findex()
    {
       
        return view('firstuser.firstuser');

    }

    // public function approval()
    // {
    //     $users = User::where('created_by',Auth::id())->get();
    //     return view('firstuser.approval', compact('users'));

    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // dd(auth()->user()->username);
        //  $tabelname = auth()->user()->username.'1';
    DB::table($data['table_name'])->insert([
                'field_1' => $data['field_1'],
                'field_2' => $data['field_2'],
                'field_3' => $data['field_3'],
                'field_4' => $data['field_4'],
            ]);

            return back();
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
