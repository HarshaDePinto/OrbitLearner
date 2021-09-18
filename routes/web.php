<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>'HtmlMinifier'], function(){ 


//Front End Routs WebController
Route::get('/', 'App\Http\Controllers\WebController@home')->name('home');
Route::get('/our-teachers', 'App\Http\Controllers\WebController@teachers')->name('teachers');
Route::get('/about-us', 'App\Http\Controllers\WebController@about_us')->name('about_us');
Route::get('/privacy-policy', 'App\Http\Controllers\WebController@privacy_policy')->name('privacy_policy');
Route::get('/refund-policy', 'App\Http\Controllers\WebController@refund_policy')->name('refund_policy');
Route::get('/our-teacher-single/{id}', 'App\Http\Controllers\WebController@teacher_single')->name('teacher_single');
Route::get('/our-teachers-by-subject/{id}', 'App\Http\Controllers\WebController@teachers_by_subject')->name('teachers_by_subject');
Route::get('/classes', 'App\Http\Controllers\WebController@classes')->name('classes');
Route::get('/class-single/{id}', 'App\Http\Controllers\WebController@class_single')->name('class_single');
Route::post('/search-classes', 'App\Http\Controllers\WebController@classes_search')->name('classes_search');
require __DIR__.'/auth.php';
//Home Controller
Route::get('redirects', 'App\Http\Controllers\HomeController@index');
Route::get('/admin-home', 'App\Http\Controllers\HomeController@admin_home')->name('admin_home')->middleware('auth');
Route::get('/student-home/{id}', 'App\Http\Controllers\HomeController@student_home')->name('student_home')->middleware('auth');
Route::get('/teacher-home/{id}', 'App\Http\Controllers\HomeController@teacher_home')->name('teacher_home')->middleware('auth');
Route::get('/accountant-home/{id}', 'App\Http\Controllers\HomeController@finance_home')->name('finance_home')->middleware('auth');
Route::get('/designer-home/{id}', 'App\Http\Controllers\HomeController@designer_home')->name('designer_home')->middleware('auth');
Route::get('/mobile-verification', 'App\Http\Controllers\HomeController@mobile_verification')->name('mobile_verification');
Route::post('/mobile-activation', 'App\Http\Controllers\HomeController@mobile_activation')->name('mobile_activation');

//Admin Profile
Route::get('/admin-profile/{id}', 'App\Http\Controllers\AdminController@admin_profile')->name('admin_profile')->middleware('auth');
Route::put('/admin-profile-update/{id}', 'App\Http\Controllers\AdminController@profile_update')->name('admin_profile_update')->middleware('auth');
Route::post('/change-password', 'App\Http\Controllers\AdminController@password')->name('change_password')->middleware('auth');
Route::get('/admin-delete-log', 'App\Http\Controllers\AdminController@delete_log')->name('admin_delete_log')->middleware('auth');
Route::post('/admin-delete-search', 'App\Http\Controllers\AdminController@delete_search')->name('admin_delete_search')->middleware('auth');

//Admin Web
Route::get('/admin-web', 'App\Http\Controllers\AdminController@admin_web')->name('admin_web')->middleware('auth');
Route::put('/admin-web-update/{id}', 'App\Http\Controllers\AdminController@web_update')->name('admin_web_update')->middleware('auth');

//Admin Grades
Route::get('/admin-grades', 'App\Http\Controllers\AdminController@admin_grades')->name('admin_grades')->middleware('auth');
Route::post('/admin-grades-create', 'App\Http\Controllers\AdminController@admin_grades_create')->name('admin_grades_create')->middleware('auth');
Route::post('/admin-grades-delete', 'App\Http\Controllers\AdminController@admin_grades_delete')->name('admin_grades_delete')->middleware('auth');
Route::put('/admin-grades-update/{id}', 'App\Http\Controllers\AdminController@admin_grades_update')->name('admin_grades_update')->middleware('auth');
Route::get('/admin-grade-single/{id}', 'App\Http\Controllers\AdminController@admin_grade_single')->name('admin_grade_single')->middleware('auth');

//Admin Subjects
Route::get('/admin-subjects', 'App\Http\Controllers\AdminController@admin_subjects')->name('admin_subjects')->middleware('auth');
Route::post('/admin-subjects-create', 'App\Http\Controllers\AdminController@admin_subjects_create')->name('admin_subjects_create')->middleware('auth');
Route::put('/admin-subjects-update/{id}', 'App\Http\Controllers\AdminController@admin_subjects_update')->name('admin_subjects_update')->middleware('auth');
Route::post('/admin-subjects-delete', 'App\Http\Controllers\AdminController@admin_subjects_delete')->name('admin_subjects_delete')->middleware('auth');
Route::get('/admin-subject-single/{id}', 'App\Http\Controllers\AdminController@admin_subject_single')->name('admin_subject_single')->middleware('auth');

//Admin Teachers
Route::get('/admin-teachers', 'App\Http\Controllers\AdminController@admin_teachers')->name('admin_teachers')->middleware('auth');
Route::get('/admin-teachers-Add', 'App\Http\Controllers\AdminController@admin_teachers_add')->name('admin_teachers_add')->middleware('auth');
Route::post('/admin-teachers-create', 'App\Http\Controllers\AdminController@admin_teachers_create')->name('admin_teachers_create')->middleware('auth');
Route::post('/admin-teachers-delete', 'App\Http\Controllers\AdminController@admin_teachers_delete')->name('admin_teachers_delete')->middleware('auth');
Route::put('/admin-teachers-password/{id}', 'App\Http\Controllers\AdminController@admin_teachers_password')->name('admin_teachers_password')->middleware('auth');
Route::get('/admin-teacher-single/{id}', 'App\Http\Controllers\AdminController@admin_teacher_single')->name('admin_teacher_single')->middleware('auth');
Route::get('/admin-teacher-courses/{id}', 'App\Http\Controllers\AdminController@admin_teacher_groups')->name('admin_teacher_groups')->middleware('auth');
Route::get('/admin-teacher-classes/{id}', 'App\Http\Controllers\AdminController@admin_teacher_clz')->name('admin_teacher_clz')->middleware('auth');
Route::get('/admin-teacher-course-single/{id}', 'App\Http\Controllers\AdminController@admin_teacher_group_single')->name('admin_teacher_group_single')->middleware('auth');
Route::post('/admin-teacher-group', 'App\Http\Controllers\AdminController@admin_teacher_group')->name('admin_teacher_group')->middleware('auth');
Route::post('/admin-teacher-group-delete', 'App\Http\Controllers\AdminController@admin_teacher_group_delete')->name('admin_teacher_group_delete')->middleware('auth');
Route::put('/admin-teacher-group-update/{id}', 'App\Http\Controllers\AdminController@admin_teacher_group_update')->name('admin_teacher_group_update')->middleware('auth');
Route::post('/admin-teachers-subject-add', 'App\Http\Controllers\AdminController@admin_teachers_subject_add')->name('admin_teachers_subject_add')->middleware('auth');
Route::get('/admin-teachers-subject-remove/{id}', 'App\Http\Controllers\AdminController@admin_teachers_subject_remove')->name('admin_teachers_subject_remove')->middleware('auth');
Route::post('/admin-teachers-sms', 'App\Http\Controllers\AdminController@admin_teachers_sms')->name('admin_teachers_sms')->middleware('auth');

//Admin Students
Route::get('/admin-students', 'App\Http\Controllers\AdminController@admin_students')->name('admin_students')->middleware('auth');
Route::get('/admin-student-single/{id}', 'App\Http\Controllers\AdminController@admin_student_single')->name('admin_student_single')->middleware('auth');
Route::post('/admin-student-delete', 'App\Http\Controllers\AdminController@admin_student_delete')->name('admin_student_delete')->middleware('auth');
//Admin SMS
Route::get('/admin-msgs', 'App\Http\Controllers\AdminController@admin_msgs')->name('admin_msgs')->middleware('auth');
Route::post('/admin-msgs-search', 'App\Http\Controllers\AdminController@admin_msgs_search')->name('admin_msgs_search')->middleware('auth');
Route::post('/admin-msgs-bulk', 'App\Http\Controllers\AdminController@admin_msgs_bulk')->name('admin_msgs_bulk')->middleware('auth');

//Admin User Search Routes
Route::post('/admin-search-user', 'App\Http\Controllers\AdminController@user_search')->name('user_search')->middleware('auth');
Route::post('/admin-search-sad', 'App\Http\Controllers\AdminController@sad_search')->name('sad_search')->middleware('auth');
Route::post('/admin-search-student', 'App\Http\Controllers\AdminController@student_search')->name('student_search')->middleware('auth');
//Admin Batch
Route::get('/admin-teacher-batches/{id}', 'App\Http\Controllers\GroupController@admin_teacher_batches')->name('admin_teacher_batches')->middleware('auth');
Route::get('/admin-teacher-class-single/{id}', 'App\Http\Controllers\GroupController@admin_teacher_batch_single')->name('admin_teacher_batch_single')->middleware('auth');
Route::post('/admin-teacher-batch', 'App\Http\Controllers\GroupController@admin_teacher_batch')->name('admin_teacher_batch')->middleware('auth');
Route::post('/admin-delete-batch', 'App\Http\Controllers\GroupController@admin_delete_batch')->name('admin_delete_batch')->middleware('auth');
Route::put('/admin-teacher-batch-update/{id}', 'App\Http\Controllers\GroupController@admin_teacher_batch_update')->name('admin_teacher_batch_update')->middleware('auth');
Route::get('/admin-teacher-batch-online/{id}', 'App\Http\Controllers\GroupController@admin_teacher_batch_online')->name('admin_teacher_batch_online')->middleware('auth');
Route::get('/admin-teacher-batch-students/{id}', 'App\Http\Controllers\GroupController@admin_teacher_batch_students')->name('admin_teacher_batch_students')->middleware('auth');
//Admin Batch Tutorial
Route::get('/admin-teacher-batch-tutorial/{id}', 'App\Http\Controllers\GroupController@admin_teacher_batch_tutorial')->name('admin_teacher_batch_tutorial')->middleware('auth');
Route::post('/admin-teacher-batch-t-add', 'App\Http\Controllers\GroupController@admin_teacher_batch_t_add')->name('admin_teacher_batch_t_add')->middleware('auth');
Route::get('/admin-teacher-batch-tutorial_status/{id}', 'App\Http\Controllers\GroupController@admin_teacher_batch_tutorial_status')->name('admin_teacher_batch_tutorial_status')->middleware('auth');
Route::get('/admin-teacher-batch-tutorial_delete/{id}', 'App\Http\Controllers\GroupController@admin_teacher_batch_tutorial_delete')->name('admin_teacher_batch_tutorial_delete')->middleware('auth');
//Admin Batch video
Route::get('/admin-teacher-batch-video/{id}', 'App\Http\Controllers\GroupController@admin_teacher_batch_video')->name('admin_teacher_batch_video')->middleware('auth');
Route::post('/admin-teacher-batch-v-add', 'App\Http\Controllers\GroupController@admin_teacher_batch_v_add')->name('admin_teacher_batch_v_add')->middleware('auth');
Route::get('/admin-teacher-batch-video_status/{id}', 'App\Http\Controllers\GroupController@admin_teacher_batch_video_status')->name('admin_teacher_batch_video_status')->middleware('auth');
Route::get('/admin-teacher-batch-video_delete/{id}', 'App\Http\Controllers\GroupController@admin_teacher_batch_video_delete')->name('admin_teacher_batch_video_delete')->middleware('auth');
//Admin Batch MCQ
Route::get('/admin-teacher-batch-mcq/{id}', 'App\Http\Controllers\GroupController@admin_teacher_batch_mcq')->name('admin_teacher_batch_mcq')->middleware('auth');
Route::post('/admin-teacher-batch-m-add', 'App\Http\Controllers\GroupController@admin_teacher_batch_m_add')->name('admin_teacher_batch_m_add')->middleware('auth');
Route::get('/admin-teacher-batch-mcq_status/{id}', 'App\Http\Controllers\GroupController@admin_teacher_batch_mcq_status')->name('admin_teacher_batch_mcq_status')->middleware('auth');
Route::get('/admin-b-mcq-result/{id}', 'App\Http\Controllers\GroupController@b_mcq_result')->name('admin_b_mcq_result')->middleware('auth');
Route::get('/admin-b-mcq-result-s/{id}', 'App\Http\Controllers\GroupController@b_mcq_result_s')->name('admin_b_mcq_result_s')->middleware('auth');

Route::get('/admin-teacher-batch-mcq_delete/{id}', 'App\Http\Controllers\GroupController@admin_teacher_batch_mcq_delete')->name('admin_teacher_batch_mcq_delete')->middleware('auth');
//Admin Batch Essay
Route::get('/admin-teacher-batch-essay/{id}', 'App\Http\Controllers\GroupController@admin_teacher_batch_essay')->name('admin_teacher_batch_essay')->middleware('auth');
//Admin Batch Zoom
Route::post('/teacher-zoom-meeting', 'App\Http\Controllers\GroupController@teacher_zoom_meeting')->name('teacher_zoom_meeting')->middleware('auth');
//Admin Group Tutorial
Route::get('/admin-teacher-group-tutorial/{id}', 'App\Http\Controllers\GroupController@admin_teacher_group_tutorial')->name('admin_teacher_group_tutorial')->middleware('auth');
Route::post('/admin-create-group-tutorial', 'App\Http\Controllers\GroupController@admin_create_group_tutorial')->name('admin_create_group_tutorial')->middleware('auth');
Route::post('/admin-delete-group-tutorial', 'App\Http\Controllers\GroupController@admin_delete_group_tutorial')->name('admin_delete_group_tutorial')->middleware('auth');
Route::put('/admin-update-group-tutorial/{id}', 'App\Http\Controllers\GroupController@admin_update_group_tutorial')->name('admin_update_group_tutorial')->middleware('auth');
Route::get('/admin-teacher-group-tutorial_s/{id}', 'App\Http\Controllers\GroupController@admin_teacher_group_tutorial_s')->name('admin_teacher_group_tutorial_s')->middleware('auth');
//Admin Group Video
Route::get('/admin-teacher-group-video/{id}', 'App\Http\Controllers\GroupController@admin_teacher_group_video')->name('admin_teacher_group_video')->middleware('auth');
Route::post('/admin-create-group-video', 'App\Http\Controllers\GroupController@admin_create_group_video')->name('admin_create_group_video')->middleware('auth');
Route::post('/admin-delete-group-video', 'App\Http\Controllers\GroupController@admin_delete_group_video')->name('admin_delete_group_video')->middleware('auth');
Route::put('/admin-update-group-video/{id}', 'App\Http\Controllers\GroupController@admin_update_group_video')->name('admin_update_group_video')->middleware('auth');
Route::get('/admin-teacher-group-video_s/{id}', 'App\Http\Controllers\GroupController@admin_teacher_group_video_s')->name('admin_teacher_group_video_s')->middleware('auth');
//Admin Group MCQ
Route::get('/admin-teacher-group-mcq/{id}', 'App\Http\Controllers\GroupController@admin_teacher_group_mcq')->name('admin_teacher_group_mcq')->middleware('auth');
Route::post('/admin-create-group-mcq', 'App\Http\Controllers\GroupController@admin_create_group_mcq')->name('admin_create_group_mcq')->middleware('auth');
Route::post('/admin-delete-group-mcq', 'App\Http\Controllers\GroupController@admin_delete_group_mcq')->name('admin_delete_group_mcq')->middleware('auth');
Route::put('/admin-update-group-mcq/{id}', 'App\Http\Controllers\GroupController@admin_update_group_mcq')->name('admin_update_group_mcq')->middleware('auth');
Route::get('/admin-teacher-group-mcq_s/{id}', 'App\Http\Controllers\GroupController@admin_teacher_group_mcq_s')->name('admin_teacher_group_mcq_s')->middleware('auth');
Route::post('/admin-create-group-mqu', 'App\Http\Controllers\GroupController@admin_create_group_mqu')->name('admin_create_group_mqu')->middleware('auth');
Route::get('/admin-delete-group-mqu/{id}', 'App\Http\Controllers\GroupController@admin_delete_group_mqu')->name('admin_delete_group_mqu')->middleware('auth');
//Admin Group Essay
Route::get('/admin-teacher-group-essay/{id}', 'App\Http\Controllers\GroupController@admin_teacher_group_essay')->name('admin_teacher_group_essay')->middleware('auth');


//Student Profile
Route::get('/student-profile/{id}', 'App\Http\Controllers\StudentController@student_profile')->name('student_profile')->middleware('auth');
//Student Class
Route::get('/student-my-classes', 'App\Http\Controllers\StudentController@student_my_classes')->name('student_my_classes')->middleware('auth');
Route::get('/student-find-classes', 'App\Http\Controllers\StudentController@student_find_classes')->name('student_find_classes')->middleware('auth');
Route::post('/student-search-classes', 'App\Http\Controllers\StudentController@student_search_classes')->name('student_search_classes')->middleware('auth');
Route::post('/student-single-class', 'App\Http\Controllers\StudentController@student_single_class')->name('student_single_class')->middleware('auth');
Route::get('/student-single-batch/{id}', 'App\Http\Controllers\StudentController@student_single_batch')->name('student_single_batch')->middleware('auth');
Route::post('/student-enrol', 'App\Http\Controllers\StudentController@student_enrol')->name('student_enrol')->middleware('auth');
Route::get('/student-view-cart', 'App\Http\Controllers\StudentController@student_view_cart')->name('student_view_cart')->middleware('auth');
Route::post('/student-item-add', 'App\Http\Controllers\StudentController@student_item_add')->name('student_item_add')->middleware('auth');
Route::get('/student-invoice-index', 'App\Http\Controllers\StudentController@student_invoice_index')->name('student_invoice_index')->middleware('auth');
Route::get('/student-invoice-single/{id}', 'App\Http\Controllers\StudentController@student_invoice_single')->name('student_invoice_single')->middleware('auth');
Route::get('/student-zoom', 'App\Http\Controllers\StudentController@student_zoom')->name('student_zoom')->middleware('auth');
//Student Paper
Route::get('/student-paper-do/{id}', 'App\Http\Controllers\StudentController@paper_do')->name('student_paper_do')->middleware('auth');
Route::post('/student-mcq-submit', 'App\Http\Controllers\StudentController@mcq_submit')->name('student_mcq_submit')->middleware('auth');
Route::get('/student-paper-result/{id}', 'App\Http\Controllers\StudentController@paper_result')->name('student_paper_result')->middleware('auth');
//Student Tutorial
Route::get('/student-tutorial-single/{id}', 'App\Http\Controllers\StudentController@tutorial_single')->name('student_tutorial_single')->middleware('auth');
Route::get('/student-video-single/{id}', 'App\Http\Controllers\StudentController@video_single')->name('student_video_single')->middleware('auth');

//Payment Gateway controller

Route::post('/payment-notify', 'App\Http\Controllers\PaymentController@payment_notify')->name('payment_notify');
Route::get('/payment-return', 'App\Http\Controllers\PaymentController@payment_return')->name('payment_return');
Route::get('/payment-cancel', 'App\Http\Controllers\PaymentController@payment_cancel')->name('payment_cancel');

//Zoom Controller
Route::post('/create-zoom-meeting', 'App\Http\Controllers\AdminController@create_zoom_meeting')->name('create_zoom_meeting')->middleware('auth');
Route::post('/select-zoom-meeting', 'App\Http\Controllers\StudentController@select_zoom_meeting')->name('select_zoom_meeting')->middleware('auth');
Route::get('/zoommeeting', 'App\Http\Controllers\StudentController@zoommeeting')->middleware('auth');
Route::get('/zoom/accounts', 'App\Http\Controllers\AdminController@zoom_accounts')->name('zoom_accounts')->middleware('auth');
Route::post('/create-zoom-account', 'App\Http\Controllers\AdminController@create_zoom_account')->name('create_zoom_account')->middleware('auth');
Route::get('/zoom/account-single/{id}', 'App\Http\Controllers\AdminController@zoom_account_single')->name('zoom_account_single')->middleware('auth');
Route::put('/zoom/account-update/{id}', 'App\Http\Controllers\AdminController@zoom_account_update')->name('zoom_account_update')->middleware('auth');
Route::post('/delete-zoom-account', 'App\Http\Controllers\AdminController@delete_zoom_account')->name('delete_zoom_account')->middleware('auth');


//teacher Profile
Route::get('/teacher-profile/{id}', 'App\Http\Controllers\TeacherController@teacher_profile')->name('teacher_profile')->middleware('auth');
Route::get('/teacher-my-courses', 'App\Http\Controllers\TeacherController@teacher_courses')->name('teacher_courses')->middleware('auth');
Route::get('/teacher-my-course-single/{id}', 'App\Http\Controllers\TeacherController@teacher_c_single')->name('teacher_c_single')->middleware('auth');
Route::get('/teacher-my-c-classes/{id}', 'App\Http\Controllers\TeacherController@teacher_c_classes')->name('teacher_c_classes')->middleware('auth');
Route::get('/teacher-my-c-tutorial/{id}', 'App\Http\Controllers\TeacherController@teacher_c_tutorial')->name('teacher_c_tutorial')->middleware('auth');
Route::get('/teacher-my-c-tutorial-single/{id}', 'App\Http\Controllers\TeacherController@teacher_c_tutorial_s')->name('teacher_c_tutorial_s')->middleware('auth');
Route::post('/teacher-my-c-tutorial-delete', 'App\Http\Controllers\TeacherController@teacher_c_tutorial_d')->name('teacher_c_tutorial_d')->middleware('auth');
Route::post('/teacher-my-c-tutorial-create', 'App\Http\Controllers\TeacherController@teacher_c_tutorial_c')->name('teacher_c_tutorial_c')->middleware('auth');

Route::get('/teacher-my-c-video/{id}', 'App\Http\Controllers\TeacherController@teacher_c_video')->name('teacher_c_video')->middleware('auth');
Route::get('/teacher-my-c-video-single/{id}', 'App\Http\Controllers\TeacherController@teacher_c_video_s')->name('teacher_c_video_s')->middleware('auth');
Route::post('/teacher-my-c-video-delete', 'App\Http\Controllers\TeacherController@teacher_c_video_d')->name('teacher_c_video_d')->middleware('auth');
Route::post('/teacher-my-c-video-create', 'App\Http\Controllers\TeacherController@teacher_c_video_c')->name('teacher_c_video_c')->middleware('auth');

Route::get('/teacher-my-c-mcq/{id}', 'App\Http\Controllers\TeacherController@teacher_c_mcq')->name('teacher_c_mcq')->middleware('auth');
Route::get('/teacher-my-c-mcq-single/{id}', 'App\Http\Controllers\TeacherController@teacher_c_mcq_s')->name('teacher_c_mcq_s')->middleware('auth');
Route::post('/teacher-my-c-mcq-delete', 'App\Http\Controllers\TeacherController@teacher_c_mcq_d')->name('teacher_c_mcq_d')->middleware('auth');
Route::post('/teacher-my-c-mcq-create', 'App\Http\Controllers\TeacherController@teacher_c_mcq_c')->name('teacher_c_mcq_c')->middleware('auth');

Route::get('/teacher-my-c-essay/{id}', 'App\Http\Controllers\TeacherController@teacher_c_essay')->name('teacher_c_essay')->middleware('auth');

Route::get('/teacher-my-batches', 'App\Http\Controllers\TeacherController@teacher_batches')->name('teacher_batches')->middleware('auth');

Route::get('/teacher-my-batch-single/{id}', 'App\Http\Controllers\TeacherController@teacher_b_single')->name('teacher_b_single')->middleware('auth');
Route::get('/teacher-my-b-online/{id}', 'App\Http\Controllers\TeacherController@teacher_b_online')->name('teacher_b_online')->middleware('auth');
Route::post('/teacher-my-b-zoom', 'App\Http\Controllers\TeacherController@teacher_b_zoom')->name('teacher_b_zoom')->middleware('auth');
Route::get('/teacher-my-b-students/{id}', 'App\Http\Controllers\TeacherController@teacher_b_students')->name('teacher_b_students')->middleware('auth');
Route::get('/teacher-my-b-tutorial/{id}', 'App\Http\Controllers\TeacherController@teacher_b_tutorial')->name('teacher_b_tutorial')->middleware('auth');
Route::get('/teacher-my-b-video/{id}', 'App\Http\Controllers\TeacherController@teacher_b_video')->name('teacher_b_video')->middleware('auth');
Route::get('/teacher-my-b-mcq/{id}', 'App\Http\Controllers\TeacherController@teacher_b_mcq')->name('teacher_b_mcq')->middleware('auth');
Route::get('/teacher-my-b-essay/{id}', 'App\Http\Controllers\TeacherController@teacher_b_essay')->name('teacher_b_essay')->middleware('auth');

//Finance Controller
Route::get('/admin-accountants', 'App\Http\Controllers\FinanceController@admin_accountants')->name('admin_accountants')->middleware('auth');
Route::get('/admin-accountant-create', 'App\Http\Controllers\FinanceController@admin_accountant_create')->name('admin_accountant_create')->middleware('auth');
Route::post('/admin-accountant-store', 'App\Http\Controllers\FinanceController@admin_accountant_store')->name('admin_accountant_store')->middleware('auth');
Route::post('/admin-accountant-delete', 'App\Http\Controllers\FinanceController@admin_accountant_delete')->name('admin_accountant_delete')->middleware('auth');
Route::get('/admin-accountant-single/{id}', 'App\Http\Controllers\FinanceController@admin_accountant_single')->name('admin_accountant_single')->middleware('auth');
Route::get('/accountant-profile/{id}', 'App\Http\Controllers\FinanceController@accountant_profile')->name('accountant_profile')->middleware('auth');
Route::get('/accountant-cart/{id}', 'App\Http\Controllers\FinanceController@accountant_cart')->name('accountant_cart')->middleware('auth');

Route::post('/accountant-payment', 'App\Http\Controllers\FinanceController@accountant_payment')->name('accountant_payment')->middleware('auth');

Route::get('/accountant-invoice/{id}', 'App\Http\Controllers\FinanceController@accountant_invoice')->name('accountant_invoice')->middleware('auth');
Route::get('/accountant-history/{id}', 'App\Http\Controllers\FinanceController@accountant_history')->name('accountant_history')->middleware('auth');
Route::get('/accountant-student-class/{id}', 'App\Http\Controllers\FinanceController@student_class')->name('accountant_student_class')->middleware('auth');
Route::get('/accountant-student-online/{id}', 'App\Http\Controllers\FinanceController@student_online')->name('accountant_student_online')->middleware('auth');
Route::get('/accountant-student-pay-delete/{id}', 'App\Http\Controllers\FinanceController@student_pay_delete')->name('accountant_student_pay_delete')->middleware('auth');
Route::put('/accountant-student-class-update/{id}', 'App\Http\Controllers\FinanceController@student_class_update')->name('accountant_student_class_update')->middleware('auth');
Route::get('/accountant-student-payment/{id}', 'App\Http\Controllers\FinanceController@student_payment')->name('accountant_student_payment')->middleware('auth');
Route::post('/accountant-student-payment-add', 'App\Http\Controllers\FinanceController@student_payment_add')->name('accountant_student_payment_add')->middleware('auth');

Route::get('/accountant-institute-accounts', 'App\Http\Controllers\FinanceController@institute_accounts')->name('accountant_institute_accounts')->middleware('auth');

Route::get('/accountant-class-accounts', 'App\Http\Controllers\FinanceController@class_accounts')->name('accountant_class_accounts')->middleware('auth');
Route::get('/accountant-teacher-account/{id}', 'App\Http\Controllers\FinanceController@teacher_account')->name('accountant_teacher_account')->middleware('auth');
Route::get('/accountant-class-account/{id}', 'App\Http\Controllers\FinanceController@class_account')->name('accountant_class_account')->middleware('auth');

Route::get('/accountant-paid-invoices', 'App\Http\Controllers\FinanceController@paid_invoices')->name('accountant_paid_invoices')->middleware('auth');
Route::get('/accountant-paid-invoice-s/{id}', 'App\Http\Controllers\FinanceController@paid_invoice_s')->name('accountant_paid_invoice_s')->middleware('auth');

//Designer Controller
Route::get('/admin-designers', 'App\Http\Controllers\DesignerController@admin_designers')->name('admin_designers')->middleware('auth');
Route::get('/admin-designer-create', 'App\Http\Controllers\DesignerController@admin_designer_create')->name('admin_designer_create')->middleware('auth');

Route::post('/admin-designer-store', 'App\Http\Controllers\DesignerController@admin_designer_store')->name('admin_designer_store')->middleware('auth');
Route::post('/admin-designer-delete', 'App\Http\Controllers\DesignerController@admin_designer_delete')->name('admin_designer_delete')->middleware('auth');
Route::get('/admin-designer-single/{id}', 'App\Http\Controllers\DesignerController@admin_designer_single')->name('admin_designer_single')->middleware('auth');
Route::get('/designer-profile/{id}', 'App\Http\Controllers\DesignerController@designer_profile')->name('designer_profile')->middleware('auth');
Route::get('/designer-web', 'App\Http\Controllers\DesignerController@designer_web')->name('designer_web')->middleware('auth');

});