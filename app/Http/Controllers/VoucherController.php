<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    
    public function show_income_voucher(){
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_income_expense';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_income_expense';
        }

        $incomes = DB::table($table_name)
            ->where([
                ['debit_voucher_number','=' , 0],
            ])
            ->orderBy('id','desc')
            ->get();
            return view('firstuser.show_income', compact('incomes'));

    }

    public function show_expense_voucher(){
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_income_expense';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_income_expense';
        }

        $expense = DB::table($table_name)
            ->where([
                ['credit_voucher_number','=' , 0],
            ])
            ->orderBy('id','desc')
            ->get();
            return view('firstuser.show_expense', compact('expense'));

    }

    public function show_poreceive_voucher(){
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_poreceived';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_poreceived';
        }

        $poreceive = DB::table($table_name)
            // ->where([
            //     ['credit_voucher_number','=' , 0],
            // ])
            ->orderBy('id','desc')
            ->get();


    if (auth()->user()->created_by == 0) {

        return view('firstuser.show_poreceive', compact('poreceive'));

    }else{
        return view('seconduser.show_poreceive',compact('poreceive'));

    }

}

}
