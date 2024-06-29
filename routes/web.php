<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// admin
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminPatientListController;
use App\Http\Controllers\admin\AdminRecordController;
use App\Http\Controllers\admin\AdminMessagesController;
use App\Http\Controllers\admin\AdminPaymentInfoController;
use App\Http\Controllers\admin\AdminCalendarController;
use App\Http\Controllers\admin\AdminCommunityForumController;
use App\Http\Controllers\admin\AdminCommentController;

// patient
use App\Http\Controllers\patient\PatientDashboardController;
use App\Http\Controllers\patient\PatientAppointmentController;
use App\Http\Controllers\patient\PatientMessagesController;
use App\Http\Controllers\patient\PatientPaymentInfoController;
use App\Http\Controllers\patient\PatientCalendarController;
use App\Http\Controllers\patient\PatientCommunityForumController;
use App\Http\Controllers\patient\PatientCommentController;

// dentistrystudent
use App\Http\Controllers\dentistrystudent\DentistryStudentCommunityForumController;
use App\Http\Controllers\dentistrystudent\DentistryStudentCommentController;

use App\Http\Controllers\HomeController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth', 'checkUserType:admin']], function () {
    // dashboard
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // paitent list
    Route::get('/admin/patientlist',[AdminPatientListController::class,'index'])->name('admin.patientlist');
    Route::get('/admin/patient/add', [AdminPatientListController::class, 'createPatient'])->name('admin.patient.create');
    Route::post('/admin/patient/store', [AdminPatientListController::class, 'storePatient'])->name('admin.patient.store');
    Route::post('/admin/patientlist/patient/{patientlistId}', [AdminPatientListController::class, 'addPatient'])->name('admin.addPatient');
    Route::get('/admin/patientlist/update/{id}', [AdminPatientListController::class, 'updatePatient'])->name('admin.updatePatient');
    Route::put('/admin/patientlist/updated/{id}', [AdminPatientListController::class, 'updatedPatient'])->name('admin.updatedPatient');
    Route::delete('/admin/patientlist/delete/{id}', [AdminPatientListController::class, 'deletePatient'])->name('admin.deletePatient');
    // record
    Route::get('/admin/patientlist/{patientlistId}/record', [AdminPatientlistController::class, 'showRecord'])->name('admin.showRecord');
    Route::get('/admin/record/add', [AdminRecordController::class, 'createRecord'])->name('admin.record.create');
    Route::post('/admin/records/store', [AdminRecordController::class, 'storeRecord'])->name('admin.record.store');
    Route::get('/admin/patientlist/{patient}/record/{record}/update', [AdminRecordController::class, 'updateRecord'])->name('admin.record.update');
    Route::get('/admin/patientlist/{patient}/record/{record}', [AdminRecordController::class, 'updatedRecord'])->name('admin.record.updated');
    Route::delete('/admin/patientlist/{patient}/record/{record}', [AdminRecordController::class, 'deleteRecord'])->name('admin.record.delete');
    // messages
    Route::get('/admin/messages',[AdminMessagesController::class,'index'])->name('admin.messages');
    Route::post('/admin/messages', [AdminMessagesController::class, 'storeMessage'])->name('admin.messages.store');
    // payment info
    Route::get('/admin/paymentinfo',[AdminPaymentInfoController::class,'index'])->name('admin.paymentinfo');
    Route::get('/admin/payment/add', [AdminPaymentInfoController::class, 'createPayment'])->name('admin.payment.create');
    Route::post('/admin/payment/store', [AdminPaymentInfoController::class, 'storePayment'])->name('admin.payment.store');
    Route::post('/admin/payment/patient/{patientlistId}', [AdminPaymentInfoController::class, 'addPayment'])->name('admin.addPayment');
    Route::get('/admin/payment/update/{id}', [AdminPaymentInfoController::class, 'updatePayment'])->name('admin.updatePayment');
    Route::put('/admin/payment/updated/{id}', [AdminPaymentInfoController::class, 'updatedPayment'])->name('admin.updatedPayment');
    Route::delete('/admin/payment/delete/{id}', [AdminPaymentInfoController::class, 'deletePayment'])->name('admin.deletePayment');
    // calendar
    Route::get('/admin/calendar',[AdminCalendarController::class,'index'])->name('admin.calendar');
    Route::get('/admin/calendar/appointment/update/{id}', [AdminCalendarController::class, 'updateCalendar'])->name('admin.updateCalendar');
    Route::put('/admin/calendar/appointment/updated/{id}', [AdminCalendarController::class, 'updatedCalendar'])->name('admin.updatedCalendar');
    Route::delete('/admin/calendar/appointment/delete/{id}', [AdminCalendarController::class, 'deleteCalendar'])->name('admin.deleteCalendar');
    // community forum
    Route::get('/admin/communityforum',[AdminCommunityForumController::class,'index'])->name('admin.communityforum');
    Route::get('/admin/communityforum/post', [AdminCommunityForumController::class, 'createCommunityforum'])->name('admin.communityforum.create');
    Route::post('/admin/communityforum/store', [AdminCommunityForumController::class, 'storeCommunityforum'])->name('admin.communityforum.store');
    Route::get('/admin/communityforum/update/{id}', [AdminCommunityForumController::class, 'updateCommunityforum'])->name('admin.updateCommunityforum');
    Route::put('/admin/communityforum/updated/{id}', [AdminCommunityForumController::class, 'updatedCommunityforum'])->name('admin.updatedCommunityforum');
    Route::delete('/admin/communityforum/delete/{id}', [AdminCommunityForumController::class, 'deleteCommunityforum'])->name('admin.deleteCommunityforum');


    Route::get('/admin/communityforum/{communityforumsId}/comment', [AdminCommunityForumController::class, 'showComment'])->name('admin.showComment');
    Route::get('/admin/comment/add', [AdminCommentController::class, 'createComment'])->name('admin.comment.create');
    Route::post('/admin/comments/store', [AdminCommentController::class, 'storeComment'])->name('admin.comment.store');
    Route::get('/admin/communityforums/{communityforum}/comment/{comment}/update', [AdminCommentController::class, 'updateComment'])->name('admin.comment.update');
    Route::get('/admin/communityforums/{communityforum}/comment/{comment}', [AdminCommentController::class, 'updatedComment'])->name('admin.comment.updated');
    Route::delete('/admin/communityforums/{communityforum}/comment/{comment}', [AdminCommentController::class, 'deleteComment'])->name('admin.comment.delete');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => ['auth', 'checkUserType:patient']], function () {
    // dashboard
    Route::get('/patient', [PatientDashboardController::class, 'index'])->name('patient.dashboard');

    // appointments
    Route::get('/patient/appointment',[PatientAppointmentController::class,'index'])->name('patient.appointment');
    Route::get('/patient/appointment/add', [PatientCalendarController::class, 'createCalendar'])->name('patient.calendar.create');
    Route::post('/patient/appointment/store', [PatientCalendarController::class, 'storeCalendar'])->name('patient.calendar.store');

    // messages
    Route::get('/patient/messages',[PatientMessagesController::class,'index'])->name('patient.messages');
    Route::post('/patient/messages', [PatientMessagesController::class, 'storeMessage'])->name('patient.messages.store');
    // payment info
    Route::get('/patient/paymentinfo',[PatientPaymentInfoController::class,'index'])->name('patient.paymentinfo');
    Route::get('/patient/payment/add', [PatientPaymentInfoController::class, 'createPayment'])->name('patient.payment.create');
    Route::post('/patient/payment/store', [PatientPaymentInfoController::class, 'storePayment'])->name('patient.payment.store');
    Route::post('/patient/payment/patient/{patientlistId}', [PatientPaymentInfoController::class, 'patient.addPayment'])->name('addPayment');
    Route::get('/patient/payment/update/{id}', [PatientPaymentInfoController::class, 'updatePayment'])->name('patient.updatePayment');
    Route::put('/patient/payment/updated/{id}', [PatientPaymentInfoController::class, 'updatedPayment'])->name('patient.updatedPayment');
    Route::delete('/patient/payment/delete/{id}', [PatientPaymentInfoController::class, 'deletePayment'])->name('patient.deletePayment');
    // calendar
    Route::get('/patient/calendar',[PatientCalendarController::class,'index'])->name('patient.calendar');
    Route::get('/patient/calendar/appointment/update/{id}', [PatientCalendarController::class, 'updateCalendar'])->name('patient.updateCalendar');
    Route::put('/patient/calendar/appointment/updated/{id}', [PatientCalendarController::class, 'updatedCalendar'])->name('patient.updatedCalendar');
    Route::delete('/patient/calendar/appointment/delete/{id}', [PatientCalendarController::class, 'deleteCalendar'])->name('patient.deleteCalendar');
    // community forum
    Route::get('/patient/communityforum',[PatientCommunityForumController::class,'index'])->name('patient.communityforum');
    Route::get('/patient/communityforum/post', [PatientCommunityForumController::class, 'createCommunityforum'])->name('patient.communityforum.create');
    Route::post('/patient/communityforum/store', [PatientCommunityForumController::class, 'storeCommunityforum'])->name('patient.communityforum.store');
    Route::get('/patient/communityforum/update/{id}', [PatientCommunityForumController::class, 'updateCommunityforum'])->name('patient.updateCommunityforum');
    Route::put('/patient/communityforum/updated/{id}', [PatientCommunityForumController::class, 'updatedCommunityforum'])->name('patient.updatedCommunityforum');
    Route::delete('/patient/communityforum/delete/{id}', [PatientCommunityForumController::class, 'deleteCommunityforum'])->name('patient.deleteCommunityforum');


    Route::get('/patient/communityforum/{communityforumsId}/comment', [PatientCommunityForumController::class, 'showComment'])->name('patient.showComment');
    Route::get('/patient/comment/add', [PatientCommentController::class, 'createComment'])->name('patient.comment.create');
    Route::post('/patient/comments/store', [PatientCommentController::class, 'storeComment'])->name('patient.comment.store');
    Route::get('/patient/communityforums/{communityforum}/comment/{comment}/update', [PatientCommentController::class, 'updateComment'])->name('patient.comment.update');
    Route::get('/patient/communityforums/{communityforum}/comment/{comment}', [PatientCommentController::class, 'updatedComment'])->name('patient.comment.updated');
    Route::delete('/patient/communityforums/{communityforum}/comment/{comment}', [PatientCommentController::class, 'deleteComment'])->name('patient.comment.delete');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => ['auth', 'checkUserType:dentistrystudent']], function () {
    // community forum
    Route::get('/communityforum',[DentistryStudentCommunityForumController::class,'index'])->name('dentistrystudent.communityforum');
    Route::get('/communityforum/post', [DentistryStudentCommunityForumController::class, 'createCommunityforum'])->name('dentistrystudent.communityforum.create');
    Route::post('/communityforum/store', [DentistryStudentCommunityForumController::class, 'storeCommunityforum'])->name('dentistrystudent.communityforum.store');
    Route::get('/communityforum/update/{id}', [DentistryStudentCommunityForumController::class, 'updateCommunityforum'])->name('dentistrystudent.updateCommunityforum');
    Route::put('/communityforum/updated/{id}', [DentistryStudentCommunityForumController::class, 'updatedCommunityforum'])->name('dentistrystudent.updatedCommunityforum');
    Route::delete('/communityforum/delete/{id}', [DentistryStudentCommunityForumController::class, 'deleteCommunityforum'])->name('dentistrystudent.deleteCommunityforum');


    Route::get('/communityforum/{communityforumsId}/comment', [DentistryStudentCommunityForumController::class, 'showComment'])->name('dentistrystudent.showComment');
    Route::get('/comment/add', [DentistryStudentCommentController::class, 'createComment'])->name('dentistrystudent.comment.create');
    Route::post('/comments/store', [DentistryStudentCommentController::class, 'storeComment'])->name('dentistrystudent.comment.store');
    Route::get('/communityforums/{communityforum}/comment/{comment}/update', [DentistryStudentCommentController::class, 'updateComment'])->name('dentistrystudent.comment.update');
    Route::get('/communityforums/{communityforum}/comment/{comment}', [DentistryStudentCommentController::class, 'updatedComment'])->name('dentistrystudent.comment.updated');
    Route::delete('/communityforums/{communityforum}/comment/{comment}', [DentistryStudentCommentController::class, 'deleteComment'])->name('dentistrystudent.comment.delete');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
