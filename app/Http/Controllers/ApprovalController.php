<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Auth;

class ApprovalController extends Controller
{
    public function apply_amount(Request $request)
    { 
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_applyamount';
            $sub_table_name = auth()->user()->username.'_sub_applyamount';
            $projectTable = auth()->user()->username.'_project';
            $departmentTable = auth()->user()->username.'_department';
            $appMartixTable = auth()->user()->username.'_approvalmatrix';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_applyamount';
            $sub_table_name=$admin_username->username.'_sub_applyamount';
            $projectTable=$admin_username->username.'_project';
            $departmentTable=$admin_username->username.'_department';
            $appMartixTable=$admin_username->username.'_approvalmatrix';
        }
        $this->validate($request, [
            'project' => ['required'],
            'purpose' => ['required'],
            'description' => ['required'],
            'date' => ['required'],
            'apply_amount' => ['required'],
            'material' => ['required'],
            'item_price' => ['required'],
            'unit' => ['required'],
            'quantity' => ['required'],
            'sub_total' => ['required'],
         ]);



        $data = $request->all();

  $project = DB::table($projectTable)
        ->find($request->project);

        $department = DB::table($departmentTable)
        ->where("id",$project->department_id)
        ->first();
        $t=time();
        $id= DB::table($table_name)->insertGetId([
            'user_id' => $data['user_id'],
            'department' => $department->id??'',
            'project' => $data['project']??'',
            'purpose' => $data['purpose']??"",
            'description' => $data['description']??'',
            'date' => $data['date']??'',
            'apply_amount' => $data['apply_amount']??'',
            'created_at' => date("Y-m-d H:i:s",$t),
            // 'comment' => $data['comment'],
        
        ]);
    
        
        foreach ($data['material'] as $key => $value) {
            DB::table($sub_table_name)->insert([
                'applyamount_id' =>$id,
                'material' => $value??"",
                'item_price' => $data['item_price'][$key]??"",
                'unit' => $data['unit'][$key]??"",
                'quantity' => $data['quantity'][$key]??"",
                'sub_total' => $data['sub_total'][$key]??"",
            
            ]);
        }
 
        $matrixData = DB::table($appMartixTable)
        ->where("label",0)
        ->first();
        $userdata = User::find($matrixData->user_id);
        $email      =  $userdata->email;
        $message    =  'New Amount Application is applied ';
    
            Mail::raw($message, function($message) use ($email)
        {
        $message->from('techsoft677@gmail.com', auth()->user()->org_name)->subject('Amount Application');
        $message->to($email);
        });

        return back()->with('success','Amount request successfull.');;
    }
    // .......................................//


    public function pending_amount()
    { 
        
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_approvalmatrix';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_approvalmatrix';
        }
               
        $apprmatrix_data = DB::table($table_name)->where('user_id', auth()->user()->id)->first();
        // 
        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_applyamount';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table=$admin_username->username.'_applyamount';
        }
               if(isset($apprmatrix_data->label)){

        if ($apprmatrix_data->label == 0) {
                   
                $pending_data = DB::table($table)
                ->where([
                    ['appr_role','!=' , 3],
                    ['appr_role','!=' , 2],
                    ['re_step','=' , null],             
                ])
                ->orderBy('id','desc')
                ->paginate(15);
                // dd($pending_data);
               }elseif($apprmatrix_data->label >0){
                $pending_data = DB::table($table)
                ->where([
                    ['appr_role','!=' , 3],
                    ['appr_role','!=' , 2],
                    ['appr_role','!=' , 0],
                    ['re_step','=' , $apprmatrix_data->label],
                ])
                ->orderBy('id','desc')
                ->get();
               }else{
                $pending_data = DB::table($table)
                ->where([
                    ['user_id','=' , auth()->user()->id],
                    ['appr_role','!=' , 3],
                    ['appr_role','!=' , 2],
                ])
                ->orderBy('id','desc')
                ->paginate(15);

               }


            }else{
                $pending_data = DB::table($table)
                ->where([
                   ['appr_role','!=' , 3],
                    ['appr_role','!=' , 2],
                    ['user_id','=' , auth()->user()->id],
                ])
                ->orderBy('id','desc')
                ->paginate(15);

               }
             
               if (auth()->user()->created_by == 0) {
                return view('firstuser.pending_amount', compact('pending_data','table','apprmatrix_data'));
        
            }else{
                return view('seconduser.pending_amount', compact('pending_data','table','apprmatrix_data'));
        
            }

            }

    // .......................................//


    public function approved_amount()
    { 
        
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_approvalmatrix';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_approvalmatrix';
        }
               
        $apprmatrix_data = DB::table($table_name)->where('user_id', auth()->user()->id)->first();
        // 
        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_applyamount';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table=$admin_username->username.'_applyamount';
        }
               
            $pending_data = DB::table($table)
            ->where([
                ['apply_amount', '>=', $apprmatrix_data->lower_limit??0],
                ['apply_amount','<=' , $apprmatrix_data->uper_limit??0],
                ['appr_role','=' , 3],
                ['modified_by', '=', auth()->user()->id],
            ])
            ->orderBy('id','desc')
            ->paginate(15);

        if (auth()->user()->created_by == 0) {
            return view('firstuser.approved_amount', compact('pending_data','table'));
    
        }else{
            return view('seconduser.approved_amount', compact('pending_data','table'));
    
        }
  
    }

        // ....................***.....................//

    public function your_approved_amount()
    { 
        
        // if ( auth()->user()->created_by == 0){
        //     $table_name = auth()->user()->username.'_approvalmatrix';
        // }else{
        //     $admin_username = User::find(auth()->user()->created_by);
        //     $table_name=$admin_username->username.'_approvalmatrix';
        // }
               
        // $apprmatrix_data = DB::table($table_name)->where('user_id', auth()->user()->id)->first();
        // 
        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_applyamount';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table=$admin_username->username.'_applyamount';
        }
               
            $yourapproved = DB::table($table)
            ->where([
                // ['user_id','=', auth()->user()->id],
                ['appr_role','=' , 3],
                ['user_id', '=', auth()->user()->id],
            ])
            ->orderBy('id','desc')
            ->get();
        // dd($pending_data);
    
        if (auth()->user()->created_by == 0) {
            return view('firstuser.your_approved_amount', compact('yourapproved','table'));
    
        }else{
            return view('seconduser.your_approved_amount', compact('yourapproved','table'));
    
        }
  
    }

         // ....................***.....................//

    public function cancel_amount()
    { 
        
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_approvalmatrix';
            $table = auth()->user()->username.'_applyamount';

        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_approvalmatrix';
            $table=$admin_username->username.'_applyamount';

        }
           
        if (isset($apprmatrix_data)) {
       
        $apprmatrix_data = DB::table($table_name)->where('user_id', auth()->user()->id)->first();
    
            $cancel_data = DB::table($table)
            ->where([
                ['apply_amount', '>=', $apprmatrix_data->lower_limit??0],
                ['apply_amount','<=' , $apprmatrix_data->uper_limit??0],
                ['appr_role','=' , 2],
                ['modified_by','=', auth()->user()->id],
            ])
            ->orderBy('id','desc')
            ->paginate(15);
       
        if (auth()->user()->created_by == 0) {
            return view('firstuser.cancel_amount', compact('cancel_data','table'));

        }else{
        
            return view('seconduser.cancel_amount', compact('cancel_data','table'));
    
        }
    }else{
        $cancel_data = DB::table($table)
        ->where([
             ['user_id','=', auth()->user()->id],
            ['appr_role','=' , 2],
        ])
        ->orderBy('id','desc')
        ->paginate(15);

        if (auth()->user()->created_by == 0) {
            return view('firstuser.cancel_amount', compact('cancel_data','table'));

        }else{
            return view('seconduser.cancel_amount', compact('cancel_data','table'));
    
        }

    }

  
    }

        // ....................***.....................//

    public function pendingTOapprove(Request $request){
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_approvalmatrix';
            $table = auth()->user()->username.'_applyamount';

        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_approvalmatrix';
            $table=$admin_username->username.'_applyamount';

        }
   
        DB::table($table)
        ->where('id', $request->update_id)
        // appr_role =3 means approve
        ->update([
                    'appr_role' => 3,
                    'modified_by' => auth()->user()->id,
                ]);
     //**************email for applier user************ */

        $email      =  $request->email;
        $message    =  'Greeting, your amount application is Approved';
    
            Mail::raw($message, function($message) use ($email)
        {
        $message->from('techsoft677@gmail.com', 'Reliable Engineering & Solutions Ltd ')->subject('Amount Application');
        $message->to($email);
        });
         //**************email for finance director************ */
    $matrixData = DB::table($table_name)
    ->where("label",0)
    ->first();
    $userdata = App\Models\User::find($matrixData->user_id);
    $email2      =  $userdata->email;
    $message2    =  'New approved by'.auth()->user()->username;

        Mail::raw($message2, function($message2) use ($email2)
    {
    $message2->from('techsoft677@gmail.com', 'Reliable Engineering & Solutions Ltd ')->subject('Amount Application');
    $message->to($email2);
    });

        return back()->with('success','Approved successfully.');
    }

            // ....................***.....................//

    
    public function pendingTOrecommend(Request $request){
        if ( auth()->user()->created_by == 0){
            $applyAmountTable = auth()->user()->username.'_applyamount';
            $approMatrixTable = auth()->user()->username.'_approvalmatrix';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $applyAmountTable=$admin_username->username.'_applyamount';
            $approMatrixTable=$admin_username->username.'_approvalmatrix';
        }
        DB::table($request->table)
        ->where('id', $request->update_id)
        // appr_role =1 means processing or recommend
        ->update([
                     'appr_role' => 1,
                    're_step' => $request->re_step +1,
                    'modified_by' => auth()->user()->id,
                ]);

                $updateData =  DB::table($request->table)->find($request->update_id);
                $matrixUserID =  DB::table($approMatrixTable)->where('department',$updateData->department)->first();
            $userMail = User::where('id',$matrixUserID->user_id)->first() ; 
            $email      =  $userMail->email;
            // dd($userMail);
            $message    =  'Plese, approve one application, Go to http://localhost:8000/pending-amount ';
    
        Mail::raw($message, function($message) use ($email)
        {
        $message->from('techsoft677@gmail.com', auth()->user()->org_name)->subject('Amount Application');
        $message->to($email);
        });
    

    return back()->with('success','Your Recommend successfull.');
    }

  // ....................***.....................//


    public function approveTOpending(Request $request){
        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_applyamount';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table=$admin_username->username.'_applyamount';
        }
        DB::table($table)
        ->where('id', $request->update_id)
        // appr_role =0 means pending
        ->update([  
                    'appr_role' => 0,
                ]);
                

    return back()->with('success','Pending successfully.');
    }

     // ....................***.....................//


    public function pendingTOcancel(Request $request){
        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_applyamount';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table=$admin_username->username.'_applyamount';
        }
      
        // bangle@gmail.com
        // $to = $userInfo->email;
        //  dd($to);
        DB::table($table)
        ->where('id', $request->update_id)
        // appr_role =2 means cancel
        ->update([
                'appr_role'         => 2,
                'status'            => NULL,
                're_step'           => NULL,
                'justify'           => NULL,
                'justified_by'      => NULL,
                'modified_by'       => auth()->user()->id,
        ]);

        $email      =  $request->email;
        // dd($email);
        $message    =  'Sorry, Your amount is rejected due to some reason ';
// https://stackoverflow.com/questions/54493603/laravel-mailraw-custom-variables

    Mail::raw($message, function($message) use ($email)
    {
    $message->from('techsoft677@gmail.com', auth()->user()->org_name)->subject('Amount Application');
    $message->to($email);
    //  ->cc('mujammelh111@gmail.com');
    });



    return back()->with('success','canceled successfully.');


    }

     // ....................***.....................//

    
    public function cancelTOpending(Request $request){
        if ( auth()->user()->created_by == 0){
            $table_name = auth()->user()->username.'_approvalmatrix';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table_name=$admin_username->username.'_approvalmatrix';
        }
               
        $apprmatrix_data = DB::table($table_name)->where('user_id', auth()->user()->id)->first();
        if (isset($apprmatrix_data)) {
            
      
        if ($apprmatrix_data->label == 1) {
        DB::table($request->table)
        ->where('id', $request->update_id)
        // appr_role =2 means cancel
        ->update([
                'appr_role' => 0,
                'modified_by' => auth()->user()->id,
        ]);
    }else {
        DB::table($request->table)
        ->where('id', $request->update_id)
        // appr_role =2 means cancel
        ->update([
                'appr_role' => 1,
                'modified_by' => auth()->user()->id,
        ]);
    }
}else{
    DB::table($request->table)
    ->where('id', $request->update_id)
    // appr_role =2 means cancel
    ->update([
            'appr_role' => 0,
            'modified_by' => auth()->user()->id,
    ]);
}
    return back()->with('success','Pending successfully.');


    }

     // ....................***.....................//


    public function justify(Request $request){
        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_applyamount';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table=$admin_username->username.'_applyamount';
        }
        // dd($request->all());
        DB::table($table)
        ->where('id', $request->update_id)
        // appr_role =1 means processing or recommend
        ->update([
                     'appr_role' => 1,
                     'justify' => $request->justify,
                    // 're_step' => $request->re_step +1,
                     'modified_by' => auth()->user()->id,
                     'comment'           =>$request->comment,

                ]);

        $userdata = User::find($request->justify);
        $email      =  $userdata->email;
        $message    =  'Please, check new justify request from, http://localhost:8000/amount-justify';
    
            Mail::raw($message, function($message) use ($email)
        {
        $message->from('techsoft677@gmail.com', auth()->user()->org_name)->subject('Amount Application');
        $message->to($email);
        });

    return back()->with('success','Your request successfull.');
    }

    // ....................***.....................//



    public function justify_to_view($id){
        
        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_applyamount';
            $sub_table = auth()->user()->username.'_sub_applyamount';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table=$admin_username->username.'_applyamount';
            $sub_table=$admin_username->username.'_sub_applyamount';
        }

      
       
        $info = DB::table($table)->find($id);
        $subinfo = DB::table($sub_table)->where([['applyamount_id','=',$id]])->get();
        // dd($subinfo);
        return view('seconduser.justify_view',compact('info','subinfo'));

    }
    // ....................***.....................//

    public function pre_approve_view($id){
        
        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_applyamount';
            $sub_table = auth()->user()->username.'_sub_applyamount';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table=$admin_username->username.'_applyamount';
            $sub_table=$admin_username->username.'_sub_applyamount';
        }
       
        $info = DB::table($table)->find($id);
        $subinfo = DB::table($sub_table)->where([['applyamount_id','=',$id]])->get();
        // dd($subinfo);
        return view('seconduser.pre_approve_view',compact('info','subinfo'));

    }

         // ....................***.....................//

    public function approved_to_view($id){
        
        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_applyamount';
            $sub_table = auth()->user()->username.'_sub_applyamount';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table=$admin_username->username.'_applyamount';
            $sub_table=$admin_username->username.'_sub_applyamount';
        }

        $subinfo = DB::table($sub_table)->where([['applyamount_id','=',$id]])->get();

        $info = DB::table($table)->find($id);
        return view('seconduser.approved_view',compact('info','subinfo'));

    }
        // ....................***.....................//

    public function amount_justify(){

        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_applyamount';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table=$admin_username->username.'_applyamount';
        }
            //    dd(auth()->user()->id);
            $forjustify = DB::table($table)
            ->where([
                 ['justify','=', auth()->user()->id],
                 ['justified_by','=',null],
                 ['appr_role','=',1],
                // ['appr_role','=' , 0],
            ])
            ->orderBy('id','desc')
            ->get();
    
        if (auth()->user()->created_by == 0) {
            return view('firstuser.amount_justify', compact('forjustify'));
    
        }else{
            return view('seconduser.amount_justify', compact('forjustify'));
    
        }

    }

          // ....................***.....................//


    public function amount_justified_by(Request $request){
        
        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_applyamount';
            $appMartixTable = auth()->user()->username.'_approvalmatrix';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table=$admin_username->username.'_applyamount';
            $appMartixTable=$admin_username->username.'_approvalmatrix';
        }

        DB::table($table)
        ->where('id', $request->update_id)
        // appr_role =1 means processing or recommend
        ->update([
                    //  'appr_role' => 1,
                    //   'justify' => $request->justify,
                      'justified_by'    => auth()->user()->id,
                      'status'          => 1,
                    // 're_step' => $request->re_step +1,
                    'modified_by'       => auth()->user()->id,
                ]);
    // https://stackoverflow.com/questions/54493603/laravel-mailraw-custom-variables
    //*******************Email for applier user***************************** */
    $email      =  $request->email;
    $message    =  'Please, Wait your amount application is processing';
        Mail::raw($message, function($message) use ($email)
    {
    $message->from('techsoft677@gmail.com', auth()->user()->org_name)->subject('Amount Application');
    $message->to($email);
    //  ->cc('mujammelh111@gmail.com');
    });
        //**************email for finance director************ */
    $matrixData = DB::table($appMartixTable)
    ->where("label",0)
    ->first();
    $userdata = User::find($matrixData->user_id);
    $email2      =  $userdata->email;
    $message2    =  'New justify is done , plese recommend this';

        Mail::raw($message2, function($message2) use ($email2)
    {
    $message2->from('techsoft677@gmail.com', auth()->user()->org_name)->subject('Amount Application');
    $message2->to($email2);
    });
    return back()->with('success','Your justify is successfull.');

    }

        // ....................***.....................//

    public function all_approved_amount(){

        //appr_role =3 means approved
        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_applyamount';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table=$admin_username->username.'_applyamount';
        }
        $allapprove = DB::table($table)
        ->where([
            ['appr_role','=' , 3],
        ])
        ->orderBy('id','desc')
        ->get();
        if (auth()->user()->created_by == 0) {
            return view('firstuser.all_approve', compact('allapprove'));
    
        }else{
            return view('seconduser.all_approve', compact('allapprove'));
    
        }
}
    
    // ....................***.....................//
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_approvalmatrix';
        }
        $matrixdata = DB::table($table)
        ->orderBy('id','desc')
        ->get();
        return view('firstuser.appr_matrix', compact('matrixdata'));

     
    }

     // ....................***.....................//

    public function create()
    {
        $departmentTable = auth()->user()->username.'_department';
        $adminuser = User::find(Auth::id());
        $users = User::where('created_by',Auth::id())
                // ->where('finance_justifier','1')
                ->get();
       
                $departmentData = DB::table($departmentTable)->get();
        return view('firstuser.approval', compact('users','adminuser','departmentData'));
    }

     // ....................***.....................//

  
    public function store(Request $request)
    { 
        
            $data = $request->all();
            if ( DB::table($data['table_name'])
            ->where('user_id', $data['user_id'])
            ->exists()) {
            $prvdata= DB::table($data['table_name'])
            ->where('user_id', $data['user_id'])
            ->first();
            if ($prvdata->user_id == $data['user_id']) {
                DB::table($data['table_name'])
                ->where('user_id', $data['user_id'])
                ->update([
                    'user_id' =>    $data['user_id'],
                    'lower_limit' => $data['lower_limit']??0,
                    'uper_limit' => $data['uper_limit']??0,
                    'designation' => $data['designation'],
                    'department' => $data['department'],
                    'label' => $data['label'],
                    'created_by' => $data['created_by'],
                        ]);
            }
        }else{
        DB::table($data['table_name'])->insert([
            'user_id' =>    $data['user_id'],
            'lower_limit' => $data['lower_limit']??0,
            'uper_limit' => $data['uper_limit']??0,
            'designation' => $data['designation'],
            'department' => $data['department'],
            'label' => $data['label'],
            'created_by' => $data['created_by'],
        ]);
    }
        return back()->with('success','Approval condition successfully created.');
        
    }

     // ....................***.....................//

    public function check_upload(Request $request){
  

        if ( auth()->user()->created_by == 0){
            $table = auth()->user()->username.'_applyamount';
        }else{
            $admin_username = User::find(auth()->user()->created_by);
            $table=$admin_username->username.'_applyamount';
        }

        
        $request->validate([
            'checkfile' => 'required|mimes:,png,jpg,pdf,xlx,csv|max:4048',
        ]);
      
        $fileName = time().'.'.$request->checkfile->extension();  
   
        $request->checkfile->move(public_path('uploads'), $fileName);

        DB::table($table)
        ->where('id', $request->update_id)
        // appr_role =1 means processing or recommend
        ->update([
                    //  'appr_role' => 1,
                    //   'justify' => $request->justify,
                      'filename'    => $fileName,
                   ]);
      return back()
            ->with('success','You have successfully upload file.');

    }
            // ....................***.....................//

            public function send_mail_inform(Request $request){
                $email      =  $request->email;
                $message    =  $request->informToApplicant;
                Mail::raw($message, function($message) use ($email)
                {
                $message->from('techsoft677@gmail.com', auth()->user()->org_name)->subject('Amount Application');
                $message->to($email);
                //  ->cc('mujammelh111@gmail.com');
                });
                return back()    ->with('success','Your mail is successfully sent.');;
            }

}
