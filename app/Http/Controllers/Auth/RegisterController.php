<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255','unique:users'],
            'org_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
            
        $table_name = str_replace(' ', '_', strtolower($data['username']));
    
        // laravel check if table is not already exists
        if (!Schema::hasTable($table_name)) {
            for ($i=0; $i <12 ; $i++) { 
            if ($i==0) {
                
            Schema::create($table_name.'_income', function (Blueprint $table) use ($table_name) {
                $table->id();
                $table->string('from')->nullable();
                $table->string('bank')->nullable();
                $table->string('branch')->nullable();
                $table->string('project')->nullable();
                $table->string('department')->nullable();
                $table->float('check_amount',12,2)->nullable();
                $table->float('cash_amount',12,2)->nullable();
                $table->date('date')->nullable();
                $table->string('check_no',50)->nullable();
                $table->integer('posted_by')->nullable();
                $table->integer('updated_voucher_number')->nullable();
                $table->integer('approval_id')->nullable();
                $table->string('status')->default(0);
                $table->timestamps();
            });
        }
            if ($i==1) {
                
            Schema::create($table_name.'_subincome', function (Blueprint $table) use ($table_name) {
                $table->id();
                $table->unsignedBigInteger('project_id')->nullable();
                $table->float('total',10,2)->nullable();
                $table->float('decrement_income',10,2)->nullable();
                $table->string('status')->default(0);
                // $table->foreign('income_table_id')->references('id')->on($table_name.'_income')
                // ->onDelete('cascade');
                $table->timestamps();
            });
        }
      
            elseif ($i==2) {
                
            Schema::create($table_name.'_poReceived', function (Blueprint $table) use ($table_name) {
                $table->id();
                $table->string('from_industry_name')->nullable();
                $table->string('industry_ref_number',32)->nullable();
                $table->date('industry_ref_date')->nullable();
                $table->string('work_scope',32)->nullable();
                $table->date('po_mature_date')->nullable();
                $table->float('po_amount',10,2)->nullable();
                $table->integer('posted_by')->nullable();
                $table->timestamps();
            });
        }
            elseif ($i==3) {
                
            Schema::create($table_name.'_approvalmatrix', function (Blueprint $table) use ($table_name) {
                $table->id();
                $table->integer('user_id')->nullable();
                $table->integer('lower_limit')->default(0);
                $table->integer('uper_limit')->default(0);
                $table->string('designation')->nullable();
                $table->string('department')->nullable();
                $table->string('label')->nullable();

                $table->string('created_by')->nullable();
                $table->timestamps();
            });
        }
            elseif ($i==4) {
                
            Schema::create($table_name.'_applyamount', function (Blueprint $table) use ($table_name) {
                $table->id();
                $table->integer('user_id')->nullable();
                $table->integer('apply_amount')->nullable();
                $table->integer('appr_role')->default(0);
                $table->string('status')->nullable();
                $table->string('re_step')->nullable();
                $table->string('justify')->nullable();
                $table->string('justified_by')->nullable();
                $table->string('modified_by')->nullable();
                $table->string('department')->nullable();
                $table->string('project')->nullable();
                $table->string('purpose')->nullable();
                $table->text('description')->nullable();
                $table->string('filename')->default('Not attach Found');
                $table->string('date')->nullable();
                $table->string('comment',500)->nullable();
              
                $table->timestamps();
            });
        }
            elseif ($i==5) {
                
            Schema::create($table_name.'_sub_applyamount', function (Blueprint $table) use ($table_name) {
                $table->id();
                $table->unsignedBigInteger('applyamount_id')->nullable();
                $table->string('material')->nullable();
                $table->integer('item_price')->nullable();
                $table->string('unit')->nullable();
                $table->integer('quantity')->nullable();
                $table->integer('sub_total')->nullable();
                $table->foreign('applyamount_id')->references('id')->on($table_name.'_applyamount')
                ->onDelete('cascade');
                $table->timestamps();
            });
        }
            elseif ($i==6) {
                
            Schema::create($table_name.'_bank', function (Blueprint $table) use ($table_name) {
                $table->id();
                $table->string('bank')->nullable();
                $table->string('status')->nullable();
                $table->timestamps();
            });
        }
            elseif ($i==7) {
                
            Schema::create($table_name.'_branch', function (Blueprint $table) use ($table_name) {
                $table->id();
                $table->unsignedBigInteger('bank_id')->nullable();
                $table->string('branch')->nullable();
                $table->string('status')->nullable();
                $table->foreign('bank_id')->references('id')->on($table_name.'_bank')
                ->onDelete('cascade');
                $table->timestamps();
            });
        }
            elseif ($i==8) {
                
            Schema::create($table_name.'_project', function (Blueprint $table) use ($table_name) {
                $table->id();
                $table->unsignedBigInteger('bank_id')->nullable();
                $table->unsignedBigInteger('branch_id')->nullable();
                $table->unsignedBigInteger('department_id')->nullable();
                $table->string('project')->nullable();
                $table->string('status')->nullable();
                $table->timestamps();
            });
        }
        elseif ($i==9) {
                
            Schema::create($table_name.'_department', function (Blueprint $table) use ($table_name) {
                $table->id();
                $table->string('department')->nullable();;
                $table->string('status')->nullable();
                $table->timestamps();
            });
        }
        elseif ($i==10) {
                
            Schema::create($table_name.'_materials', function (Blueprint $table) use ($table_name) {
                $table->id();
                $table->string('material')->nullable();;
                $table->string('status')->nullable();
                $table->timestamps();
            });
        }
        elseif ($i==11) {
                
            Schema::create($table_name.'_units', function (Blueprint $table) use ($table_name) {
                $table->id();
                $table->string('unit')->nullable();
                $table->string('status')->nullable();
                $table->timestamps();
            });
        }


        }
        // $subj=str_replace(' ', '', $data['username']);

            return User::create([
                'username' => str_replace(' ', '_', strtolower($data['username'])),
                'org_name' => $data['org_name'],
                'access_roll' => $data['access_roll'],
                'created_by' => $data['created_by']??0,
                'email' => $data['email'],
                'finance_justifier' => $data['finance_justifier']??0,
                'department' => $data['department']??0,
                'password' => Hash::make($data['password']),
            ]);
    
        
        }
        
     
    }

    

}
