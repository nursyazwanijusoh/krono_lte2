<?php
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
Route::redirect('/', '/login');
Auth::routes(['register' => false]);
//Temporary offline login (url /login/offline)
Route::view('/login/offline', 'loginoffline',[]);
Route::post('/login/offline', 'TempController@login')->name('login.offline');
//User record controller
Route::get('/ur/popbyid/{id}', 'URController@popById')->name('ur.popbyid');
Route::get('/ur/show/{persno}', 'URController@show')->name('ur.show');
Route::get('/ur/listAll', 'URController@listAll')->name('ur.listAll');
Route::get('/ur/show/{persno}/{dt}', 'URController@gUR')->name('ur.listAll');
// Route::get('/', 'MiscController@index')->name('misc.index');
Route::group(['middleware' => ['auth']], function () {
  Route::get('/home', 'MiscController@home')->name('misc.home');
  Route::get('/role', 'Admin\RoleController@index')->name('role.index');
  // clock-in related
  Route::get('/punch',      'MiscController@showPunchView')->name('punch.list');
  Route::post('/punch/in',  'MiscController@doClockIn')->name('punch.in');
  Route::post('/punch/out', 'MiscController@doClockOut')->name('punch.out');
  Route::post('/punch/delete', 'MiscController@delete')->name('punch.delete');

  //List staff & search
  Route::get('/staff', 'Admin\StaffController@showStaff')->name('staff.list');
  Route::post('/staff/search', 'Admin\StaffController@searchStaff')->name('staff.search');
  // admins ------------------------------------
  Route::get('/admin/workday', 'Admin\DayTypeController@index')->name('wd.index');
  Route::post('/admin/workday/add', 'Admin\DayTypeController@add')->name('wd.add');
  Route::post('/admin/workday/edit', 'Admin\DayTypeController@edit')->name('wd.edit');
  Route::post('/admin/workday/delete', 'Admin\DayTypeController@delete')->name('wd.delete');
  Route::get('/admin/cda', 'TempController@loadDummyUser')->name('temp.cda');
  //start state admin
  Route::post('/admin/state/store'    ,'Admin\StateController@store'    )->name('state.store');
  Route::get( '/admin/restState'      ,'Admin\StateController@list'     )->name('state.list');
  Route::post('/admin/state/destroy'  ,'Admin\StateController@destroy'  )->name('state.destroy');
  Route::get( '/admin/state/show'     ,'Admin\StateController@show'   )->name('state.show');
  Route::post( '/admin/state/update'  ,'Admin\StateController@update'   )->name('state.update');
  //end state admin
  //User management
  Route::get('/admin/staff', 'Admin\StaffController@showMgmt')->name('staff.list.mgmt');
  Route::post('/admin/staff/edit', 'Admin\StaffController@updateMgmt')->name('staff.edit.mgmt');
  //User authorization
  Route::get('/admin/staff/auth', 'Admin\StaffController@showRole')->name('staff.list.auth');
  Route::post('/admin/staff/auth/edit', 'Admin\StaffController@updateRole')->name('staff.edit.auth');
  //Role management
  Route::get('admin/role', 'Admin\RoleController@show')->name('role.list');
  Route::post('admin/role/create', 'Admin\RoleController@store')->name('role.store');
  Route::post('admin/role/edit', 'Admin\RoleController@update')->name('role.edit');
  Route::post('admin/role/delete', 'Admin\RoleController@destroy')->name('role.delete');
  //Company
  Route::get( '/admin/company','Admin\CompanyController@index')->name('company.index');
  Route::post('/admin/company/add','Admin\CompanyController@store')->name('company.store');
  Route::post('/admin/company/delete','Admin\CompanyController@destroy')->name('company.delete');
  Route::post( '/admin/company/update','Admin\CompanyController@update')->name('company.update');
  //Personnel subarea
  Route::get( '/admin/psubarea','Admin\PsubareaController@index')->name('psubarea.index');
  Route::post('/admin/psubarea/add','Admin\PsubareaController@store')->name('psubarea.store');
  Route::post( '/admin/psubarea/update','Admin\PsubareaController@update')->name('psubarea.edit');
  Route::post('/admin/psubarea/delete','Admin\PsubareaController@destroy')->name('psubarea.delete');
  //Holiday
  Route::get('/admin/holiday/create', 'Admin\HolidayController@create')->name('holiday.create');
  Route::post('/admin/holiday/insert', 'Admin\HolidayController@insert')->name('holiday.insert');
  Route::get('/admin/holiday/show', 'Admin\HolidayController@show')->name('holiday.show');
  Route::post('/admin/holiday/show', 'Admin\HolidayController@show')->name('holiday.show');
  Route::get('/admin/holiday/edit/{id}', 'Admin\HolidayController@edit')->name('holiday.edit');
  Route::post('/admin/holiday/update', 'Admin\HolidayController@update')->name('holiday.update');
  Route::post('/admin/holiday/destroy', 'Admin\HolidayController@destroy')->name('holiday.destroy');
  //Payment Schedule
  Route::get( '/admin/paymentsc','Admin\PaymentScheduleController@index')->name('paymentsc.index');
  Route::post( '/admin/paymentsc','Admin\PaymentScheduleController@index')->name('paymentsc.index');
  Route::post('/admin/paymentsc/add','Admin\PaymentScheduleController@store')->name('paymentsc.store');
  Route::post( '/admin/paymentsc/update','Admin\PaymentScheduleController@update')->name('paymentsc.edit');
  Route::post('/admin/paymentsc/delete','Admin\PaymentScheduleController@destroy')->name('paymentsc.delete');

  //OT Config
  Route::get('/admin/overtime', 'Admin\OvertimeMgmtController@show')->name('oe.show');
  Route::post('/admin/overtime', 'Admin\OvertimeMgmtController@show')->name('oe.show');
  Route::get('/admin/overtime/m', 'Admin\OvertimeMgmtController@otm')->name('oe.otm');
  Route::get('/admin/overtime/getcompany', 'Admin\OvertimeMgmtController@getCompany')->name('oe.getcompany');
  Route::get('/admin/overtime/eligible/getlast', 'Admin\OvertimeMgmtController@getLast')->name('oe.eligiblegetlast');
  Route::post('/admin/overtime/eligible/store', 'Admin\OvertimeMgmtController@eligiblestore')->name('oe.eligiblestore');
  Route::post('/admin/overtime/eligible/update', 'Admin\OvertimeMgmtController@eligibleupdate')->name('oe.eligibleupdate');
  Route::post('/admin/overtime/eligible/delete', 'Admin\OvertimeMgmtController@eligibledelete')->name('oe.eligibledelete');
  Route::post('/admin/overtime/expiry/store', 'Admin\OvertimeMgmtController@expirystore')->name('oe.expirystore');
  Route::post('/admin/overtime/expiry/update', 'Admin\OvertimeMgmtController@expiryupdate')->name('oe.expiryupdate');
  Route::post('/admin/overtime/expiry/delete', 'Admin\OvertimeMgmtController@expirydelete')->name('oe.expirydelete');
  Route::post('/admin/overtime/expiry/active', 'Admin\OvertimeMgmtController@active')->name('oe.active');
  Route::get('/admin/overtime/expiry/getexpiry', 'Admin\OvertimeMgmtController@getExpiry')->name('oe.getexpiry');
  Route::get('/admin/overtime/expiry/getlast', 'Admin\OvertimeMgmtController@getLast2')->name('oe.expirygetlast');
  //Payroll Group
  Route::get( '/admin/pygroup','Admin\PayrollgroupController@index')->name('pygroup.index');
  Route::get('/admin/pygroup/create', 'Admin\PayrollgroupController@create')->name('pygroup.create');
  Route::post('/admin/pygroup/add','Admin\PayrollgroupController@store')->name('pygroup.store');
  Route::get( '/admin/pygroup/edit/{id}','Admin\PayrollgroupController@edit')->name('pygroup.editnew');
  Route::post( '/admin/pygroup/update','Admin\PayrollgroupController@update')->name('pygroup.update');
  Route::post('/admin/pygroup/delete','Admin\PayrollgroupController@destroy')->name('pygroup.delete');
  //Report
  Route::get('/admin/report/otd', 'Admin\OtReportController@viewOTd')->name('otr.viewOTd'); //rep1
  Route::post('/admin/report/otd', 'Admin\OtReportController@viewOTd')->name('otr.viewOTd');
  Route::get('/admin/report/ot', 'Admin\OtReportController@viewOT')->name('otr.viewOT'); //rep2
  Route::post('/admin/report/ot', 'Admin\OtReportController@viewOT')->name('otr.viewOT');
  Route::get('/admin/report/otlog', 'Admin\OtReportController@viewLC')->name('otr.viewOTLog'); //rep2
  Route::post('/admin/report/otlog', 'Admin\OtReportController@viewLC')->name('otr.viewOTLog');

  // /admins ------------------------------------
  //Log activity
  Route::get('/log/listUserLogs', 'MiscController@listUserLogs')->name('log.listUserLogs');
  Route::get('/log/updUserLogs', 'MiscController@logUserAct')->name('log.logUserAct');
  //OT activity - User
  Route::get('/overtime', 'OvertimeController@list')->name('ot.list');
  Route::post('/overtime/submit', 'OvertimeController@submit')->name('ot.submit');
  Route::post('/overtime/update', 'OvertimeController@update')->name('ot.update');
  Route::post('/overtime/detail', 'OvertimeController@detail')->name('ot.detail');
  Route::post('/overtime/remove', 'OvertimeController@remove')->name('ot.remove');
  Route::get('/overtime/form', 'OvertimeController@form')->name('ot.form');
  Route::post('/overtime/form', 'OvertimeController@form')->name('ot.form');
  Route::get('/overtime/form/new', 'OvertimeController@formnew')->name('ot.formnew');
  Route::post('/overtime/form/new', 'OvertimeController@formnew')->name('ot.formnew');
  Route::post('/overtime/form/date', 'OvertimeController@formdate')->name('ot.formdate');
  Route::post('/overtime/form/submit', 'OvertimeController@formsubmit')->name('ot.formsubmit');
  Route::post('/overtime/form/delete', 'OvertimeController@formdelete')->name('ot.formdelete');
  Route::get('/overtime/form/getthumbnail', 'OvertimeController@getthumbnail')->name('ot.thumbnail');
  Route::get('/overtime/form/getfile', 'OvertimeController@getfile')->name('ot.file');
  //OT activity - Approver
  Route::get('/overtime/approval', 'OvertimeController@approval')->name('ot.approval');
  Route::post('/overtime/approval', 'OvertimeController@approval')->name('ot.approval');
  Route::get('/overtime/query', 'OvertimeController@query')->name('ot.query');
  Route::post('/overtime/query', 'OvertimeController@query')->name('ot.query');

Route::get('/staff/profile', 'Admin\StaffController@showStaffProfile')->name('staff.profile');

});
Route::group(['prefix' => 'admin/shift_pattern', 'as' => 'sp.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
  Route::get('/', 'ShiftPatternController@index')->name('index');
  Route::post('/add', 'ShiftPatternController@addShiftPattern')->name('add');
  Route::get('/detail', 'ShiftPatternController@viewSPDetail')->name('view');
  Route::post('/edit', 'ShiftPatternController@editShiftPattern')->name('edit');
  Route::post('/del', 'ShiftPatternController@delShiftPattern')->name('delete');
  Route::post('/day/push', 'ShiftPatternController@pushDay')->name('day.add');
  Route::post('/day/pop', 'ShiftPatternController@popDay')->name('day.del');
});
Route::group(['prefix' => 'shift_plan', 'as' => 'shift.', 'middleware' => ['auth']], function () {
  Route::get('/', 'ShiftPlanController@index')->name('index');
  // ShiftPlan crud
  Route::post('/add', 'ShiftPlanController@addPlan')->name('add');
  Route::get('/detail', 'ShiftPlanController@viewDetail')->name('view');
  Route::post('/edit', 'ShiftPlanController@editPlan')->name('edit');
  Route::post('/del', 'ShiftPlanController@delPlan')->name('delete');
  Route::post('/takeaction', 'ShiftPlanController@takeActionPlan')->name('takeaction');
  // shift groups
  Route::get('/group', 'ShiftGroupController@index')->name('group');
  Route::post('/group/add', 'ShiftGroupController@addGroup')->name('group.add');
  Route::get('/group/view', 'ShiftGroupController@viewGroup')->name('group.view');
  Route::post('/group/delete', 'ShiftGroupController@delGroup')->name('group.del');
  Route::post('/group/edit', 'ShiftGroupController@editGroup')->name('group.edit');
  Route::post('/staff/add', 'ShiftGroupController@addStaff')->name('staff.add');
  Route::post('/staff/del', 'ShiftGroupController@removeStaff')->name('staff.del');
  // ShiftPlanStaff
  Route::get('/staff', 'ShiftPlanController@staffInfo')->name('staff');
  Route::post('/staff/push', 'ShiftPlanController@staffPushTemplate')->name('staff.push');
  Route::post('/staff/pop', 'ShiftPlanController@staffPopTemplate')->name('staff.pop');


});

  Route::get('/email/dummy', 'EmailController@dummyEmail')->name('email.dummy');
  Route::post('/email/dummy', 'EmailController@sendDummyEmail')->name('email.senddummy');

  Route::get('/verifier/staff/search', 'UserVerifierController@index')->name('verifier.staff');
  Route::get('/verifier/staff/persno', 'UserVerifierController@search')->name('verifier.search');
