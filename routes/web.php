<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FirstUserController;
use App\Http\Controllers\SeconduserController;
use App\Http\Controllers\IncomeExpenseController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\PoReceiveController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\BankProjectController;
use App\Http\Controllers\Select2SearchController;
use App\Http\Controllers\UserInterfaceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/services', function () {
    return view('user-interface.services');
});
Route::get('/client-lists', function () {
    return view('user-interface.client_lists');
});
Route::get('/trainings', function () {
    return view('user-interface.trainings');
});

Route::get('/about-us', function () {
    return view('user-interface.about');
});
Route::get('/contact', function () {
    return view('user-interface.contact');
});

// Route::get('prevRegister', function () {
//     return view('auth.prevRegister');
// });

// Route::get('CompanyRegister', function () {
//     return view('auth.CompanyRegister');
// });


Route::get('/', [UserInterfaceController::class, 'welcome']);
Auth::routes();
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['first_user'])->group(function () {
    Route::post('/CreateUser', [FirstUserController::class, 'CreateUser'])->name('CreateUser');
    Route::get('firstuser', [FirstUserController::class, 'findex'])->name('firstuser');
    Route::resource('firstusers', FirstUserController::class);
    Route::resource('approval-mattrix', ApprovalController::class);
    // Route::get('approval-mattrix', [FirstUserController::class, 'approval'])->name('approval-mattrix');
    

    Route::get('show-income-voucher', [VoucherController::class, 'show_income_voucher'])->name('show-income-voucher');

    Route::get('show-expense-voucher', [VoucherController::class, 'show_expense_voucher'])->name('show-expense-voucher');
    
});


Route::middleware(['second_user'])->group(function () {
    Route::get('seconduser', [SeconduserController::class, 'loan_application'])->name('seconduser');
    Route::get('loan-application', [SeconduserController::class, 'loan_application'])->name('loan-application');
    Route::resource('secondusers', SeconduserController::class);
    
    // Route::get('income-expense-create', [IncomeExpenseController::class, 'incomeExpenseCreate'])->name('income-expense-create');
    Route::get('income-create', [IncomeExpenseController::class, 'incomeCreate'])->name('income-create');
    Route::get('expense-create', [IncomeExpenseController::class, 'ExpenseCreate'])->name('expense-create');
    // Route::get('Expense-create', [IncomeExpenseController::class, 'ExpenseCreate'])->name('Expense-create');
    Route::post('income-info-store', [IncomeExpenseController::class, 'income_info_store'])->name('income-info-store');
    
    Route::get('po-receive-create', [PoReceiveController::class, 'poReceiveCreate'])->name('po-receive-create');
    Route::post('po-receive-store', [PoReceiveController::class, 'poReceiveStore'])->name('po-receive-store');
    
    Route::post('apply-amount', [ApprovalController::class, 'apply_amount'])->name('apply-amount');
    Route::get('pending-amount', [ApprovalController::class, 'pending_amount'])->name('pending-amount');
    Route::get('approved-amount', [ApprovalController::class, 'approved_amount'])->name('approved-amount');
    Route::get('your-approved-amount', [ApprovalController::class, 'your_approved_amount'])->name('your-approved-amount');
    Route::get('cancel-amount', [ApprovalController::class, 'cancel_amount'])->name('cancel-amount');
    Route::post('pending-to-approve', [ApprovalController::class, 'pendingTOapprove'])->name('pending-to-approve');
    Route::post('pending-to-recommend', [ApprovalController::class, 'pendingTOrecommend'])->name('pending-to-recommend');
    Route::post('approve-to-pending', [ApprovalController::class, 'approveTOpending'])->name('approve-to-pending');
    Route::post('pending-to-cancel', [ApprovalController::class, 'pendingTOcancel'])->name('pending-to-cancel');
    Route::post('cancel-to-pending', [ApprovalController::class, 'cancelTOpending'])->name('cancel-to-pending');
    Route::post('justify', [ApprovalController::class, 'justify'])->name('justify');
    Route::post('send-mail-to-inform', [ApprovalController::class, 'send_mail_inform'])->name('send-mail-to-inform');

    Route::get('amount-justify', [ApprovalController::class, 'amount_justify'])->name('amount-justify');

    Route::get('justify-to-view/{id}', [ApprovalController::class, 'justify_to_view'])->name('justify-to-view');
    Route::get('pre-approve-view/{id}', [ApprovalController::class, 'pre_approve_view'])->name('pre-approve-view');
    Route::get('approved-to-view/{id}', [ApprovalController::class, 'approved_to_view'])->name('approved-to-view');
    Route::post('check-upload', [ApprovalController::class, 'check_upload']);

    Route::post('amount-justified-by', [ApprovalController::class, 'amount_justified_by'])->name('amount-justified-by');
    Route::get('all-approved-amount', [ApprovalController::class, 'all_approved_amount'])->name('all-approved-amount');

    
    Route::get('show-poreceive-voucher', [VoucherController::class, 'show_poreceive_voucher'])->name('show-poreceive-voucher');

    Route::get('/message-index', [MessagesController::class, 'index'])->name('message-index');
    Route::get('messages/create', [MessagesController::class, 'create'])->name('messages.create');
    Route::post('/messages', [MessagesController::class, 'store'])->name('messages.store');
    Route::get('messages/{thread}', [MessagesController::class, 'show'])->name('messages.show');
    Route::put('messages/{thread}', [MessagesController::class, 'update'])->name('messages.update');
    Route::delete('messages/{thread}', [MessagesController::class, 'destroy'])->name('messages.destroy');
    Route::post('generate-pdf',[PDFController::class,'generatePDF'])->name('generate-pdf');
    Route::post('final-approve',[PDFController::class,'final_approve'])->name('final-approve');
    Route::get('all-approve-projects-pdf/{id}',[PDFController::class,'all_approve_projects_pdf'])->name('all-approve-projects-pdf');
    // Route::get('project-creation-form',[BankProjectController::class,'project_creation_form'])->name('project-creation-form');
    
    // Route::get('get-bank',[BankProjectController::class, 'get_bank'])->name('get-bank');
    Route::post('bank-create',[BankProjectController::class, 'bank_create'])->name('bank-create');
    Route::post('branch-create',[BankProjectController::class, 'branch_create'])->name('branch-create');
    Route::post('project-create',[BankProjectController::class, 'project_create'])->name('project-create');
    Route::get('total-fund',[BankProjectController::class, 'total_fund'])->name('total-fund');

    Route::post('material-create',[BankProjectController::class, 'material_create']);
    Route::post('unit-create',[BankProjectController::class, 'unit_create']);

    Route::get('get-branch',[BankProjectController::class, 'get_branch'])->name('get-branch');
    Route::get('get-department',[BankProjectController::class, 'get_department'])->name('get-department');
    Route::get('projects-index',[BankProjectController::class, 'projects_index'])->name('projects-index');
    Route::get('projects-show/{id}',[BankProjectController::class, 'projects_show'])->name('projects-show');
    Route::post('create-department',[BankProjectController::class, 'create_department'])->name('create-department');
    Route::post('add-new-material',[BankProjectController::class, 'addNewMaterial']);
    // Route::get('/','EmployeesController@index');
Route::post('/employees/getEmployees/',[EmployeesController::class,'getEmployees'])->name('employees.getEmployees');
// Route::get('search', [Select2SearchController::class,'index']);
Route::get('ajax-autocomplete-search', [Select2SearchController::class,'selectSearch']);



    });
});

// Route::group(['prefix' => 'messages'], function () {
//     Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
//     Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
//     Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
//     Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
//     Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
// });