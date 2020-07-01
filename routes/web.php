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
// Static Page route
Route::get('/', 'user_page@index');
Route::get('/game', function () {
    return view('game_page');
});
Route::get('/tournament', 'user_page@tournament');
Route::get('/leaderboard', function () {
    return view('leaderboard');
});
Route::get('/contact', function () {
    return view('contactUs');
});
Route::get('/about', function () {
    return view('about_us');
});

Route::get('privacy', function () {
    return view('privacy_policy');
});
Route::get('terms', function () {
    return view('privacy_policy');
});
Route::get('legality', function () {
    return view('legality');
});

Route::get('feedback_form', function(){
    return view('feedback_form');
});

// registration
Route::post('registration', 'registration_page@store');


// Registration complete with google.
Route::get('registration_complete_view', function () {
    return view('index');
});

// Google Authentication Registration Routes
Route::get('/redirect', 'SocialAuthGoogleControllerController@redirect');
Route::get('/google_callback', 'SocialAuthGoogleControllerController@callback');

Route::post('complete_registration_form', 'registration_page@update');

// login
Route::post('login_form', 'registration_page@login_form');

// user
// contact form submission
Route::post('contact_form_submission', 'user_page@contact_form_submission');
Route::post('feedback_form_submission', 'user_page@feedback_form_submission');

Route::get('user_dashboard', 'user_page@user_dashboard');
Route::get('edit_user_profile', 'user_page@edit_user_profile');

Route::get('event_show/{id}', 'user_page@show_event_detail');
Route::get('single_user', 'user_page@duo_participation_validation');
Route::post('solo_participation_submission', 'user_page@solo_participation_submission');
Route::post('submission_duo_team', 'user_page@submission_duo_team');
Route::post('submission_squad_team', 'user_page@submission_squad_team');
Route::get('show_edit_profile', 'user_page@show_edit_profile');
Route::post('user_Edit_profile', 'user_page@update');
Route::post('user_Edit_game_id', 'user_page@user_Edit_game_id');
Route::post('check_current_password_for_change', 'user_page@check_current_password_for_change');
Route::post('user_change_password','user_page@user_change_password');

// Organizer
Route::get('org_dashboard', 'organizer_page@index');
Route::get('organizer_profile', 'organizer_page@organizer_profile');

Route::post('organizer_edit_profile_submit_data', 'organizer_page@update');

// create event page
Route::get('create_event', function () {
    return view('organizer.CreateEvent');
});
Route::post('create_event_form', 'organizer_page@create_event');
Route::get('organizer_event_info/{id}','organizer_page@organizer_event_info');
Route::get('check-event', 'organizer_page@fetch_all_event');
Route::get('activity', 'organizer_page@completed_event');
Route::get('submit_tournament_result/{id}', 'organizer_page@show_page_of_submission_result');
Route::post('submit_user_event_result', 'organizer_page@submit_user_event_result');
Route::get('submit_tournament/{id}', 'organizer_page@submit_tournament');
Route::get('show_event_result/{id}', 'organizer_page@show_event_result');

// Admin
Route::get('admin_dashboard', 'admin_page@index');
Route::get('admin_user_data', 'admin_page@user_data');
Route::get('admin_organizer_data', 'admin_page@organizer_data');
Route::get('org_profile/{id}', 'admin_page@org_profile');
Route::get('user_profile/{id}', 'admin_page@user_profile');
Route::get('org_delete/{id}', 'admin_page@org_delete');
Route::get('user_delete/{id}', 'admin_page@user_delete');
Route::get('event_privilige', 'admin_page@approve_event');
Route::get('approving_event', 'admin_page@approving_event');
Route::get('org_delete/{id}', 'admin_page@org_delete');
Route::get('user_delete/{id}', 'admin_page@user_delete');
// logout
Route::get('logout', 'registration_page@logout');

// forget password
Route::get('emailcheck', function () {
    return view('email_check');
});
Route::get('check_email_in_db', 'registration_page@check_email_in_db');
Route::get('forgot_password_url/{token}', 'registration_page@forgot_password_url');
Route::post('new_password_form/{token}', 'registration_page@new_password_form');


Route::get('/add_payment', 'user_page@add_payment');
Route::get('/make_payment', 'user_page@make_payment');
Route::post('/paytm-callback', 'user_page@paytmCallback');