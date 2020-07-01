<?php

namespace App\Http\Controllers;

use App\password_reset;
use Illuminate\Http\Request;
use App\registration;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class registration_page extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

    public function login_form(Request $request)
    {
        $check_login = registration::where('email', $request->login_email)->first();

        if (!empty($check_login)) {
            if (Hash::check($request->login_password, $check_login->password)) {
                Session::put('username', $check_login->username);
                Session::put('login_email', $check_login->email);
                Session::put('login_user_type', $check_login->user_type);
                Session::put('session_profile', $check_login->image);

                $today_date = date('d-m-Y');


                $login_stamp = registration::where('email', $request->login_email)->update(['login_stamp' => $today_date]);
                if ($check_login->user_type == 'user') {
                    return redirect('user_dashboard');
                } elseif ($check_login->user_type == 'organizer') {
                    return redirect('org_dashboard');
                } else {
                    return redirect('admin_dashboard');
                }
            } else {
                session()->flash('unauthorized', 'Your Email or Password is Incorrect.');
                return redirect('/');
            }
        } else {
            session()->flash('unauthorized', '.');
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert_data = new registration;

        $insert_data->username = strtolower($request['username']);
        $insert_data->email = strtolower($request['email']);
        $insert_data->password = Hash::make($request['password']);
        $insert_data->user_type = $request['type'];
        $number_of_digits = 30;
        $rand_number =  substr(number_format(time() * mt_rand(), 0, '', ''), 0, $number_of_digits);
        $insert_data->provider_user_id =  $rand_number;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path() . '/profile_image/', $image_name);
        } else {
            $name = 'default.jpg';
        }
        $insert_data->image = $image_name;
        $insert_data->save();

        session()->flash('register', 'REGISTERED SUCCESSFULLY WITH BLOODSHED');
        return redirect('/');
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
    public function update(Request $request)
    {
        $update_data = registration::where('email', $request->email)->update(['username' => $request->username, "password" => Hash::make($request->password), 'user_type' => $request->type]);
        Session()->flush();
        session()->flash('register', 'REGISTERED SUCCESSFULLY WITH BLOODSHED');
        return redirect('/');
    }

    public function check_email_in_db(Request $request)
    {
        // print_r($request->all());
        $get_register_user = registration::where('email', $request->email)->first();
        if (!$get_register_user) {
            return 'notregister';
        } else {
            $token = rand() . time();
            // return 'valid_email';
            $set_reset_password = new password_reset();
            $set_reset_password->email = $request->email;
            $set_reset_password->token = $token;
            $set_reset_password->save();
            $mail_array = array('email' => $request->email, 'token' => $token);
            Mail::send('send_email.password_reset_email', $mail_array, function ($m) use ($mail_array) {
                $m->to($mail_array['email'])->subject('Password Reset');
                $m->from('admin123@gmail.com', 'Admin');
            });
            return 'mail_send';
        }
    }

    public function forgot_password_url($token)
    {
        // echo $token;
        $get_token_data = password_reset::where('token', $token)->first();
        if (!$get_token_data) {
            session()->flash('no_token', 'Token is not valid. Please apply for new token');
            return redirect('/');
        } else {
            return view('reset_password_page')->with('token', $token);
        }
    }

    public function new_password_form(Request $request, $token)
    {
        echo $token;
        print_r($request->all());
        $get_email_data = password_reset::where('token', $token)->first();
        $get_register_data = registration::where('email', $get_email_data->email)->update(['password' => (Hash::make($request->new_password))]);
        $get_email_data->delete();
        session()->flash('password_reset_done', 'Your Password is reset Successfully');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
