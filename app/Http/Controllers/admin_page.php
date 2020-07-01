<?php

namespace App\Http\Controllers;

use App\registration;
use App\tournament;
use Illuminate\Http\Request;
use Session;

class admin_page extends Controller
{
    public function index()
    {
        if (!Session::get('username')) {
            return redirect("/");
        } else {
            $chk_user = registration::where('email', Session::get('login_email'))->first();

            if ($chk_user->user_type == 'user') {
                return redirect('user_dashboard');
            } elseif ($chk_user->user_type == 'organizer') {
                return redirect('organizer_dashboard');
            } else {
                $registration = registration::all();
                $my_info = registration::where('email', Session::get('login_email'))->first();
                $tournament = tournament::all();
                $organizer = registration::where('user_type', 'organizer')->get();
                $user = registration::where('user_type', 'user')->get();
                return view('admin.index')->with('detail', $registration)->with('my_info', $my_info)->with('events', $tournament)->with('all_user_data', $user)->with('all_organizer_data', $organizer);
            }
        }
    }

    public function organizer_data()
    {
        $my_info = registration::where('email', Session::get('login_email'))->first();

        $organizer = registration::where('user_type', 'organizer')->get();
        return view('admin.organizer.org_data')->with('my_info', $my_info)->with('organizer_all_data', $organizer);
    }

    public function user_data()
    {
        $my_info = registration::where('email', Session::get('login_email'))->first();

        $user = registration::where('user_type', 'user')->get();
        return view('admin.user.user_data')->with('my_info', $my_info)->with('user_info', $user);
    }

    public function org_profile($id)
    {
        $my_info = registration::where('email', Session::get('login_email'))->first();

        $user_info = registration::where('id', $id)->first();

       
        $pending = tournament::where(['id'=>$id, 'status'=>'pending'])->get();
        $granted = tournament::where(['id'=>$id, 'status'=>'granted'])->get();
        $completed = tournament::where(['id'=>$id, 'status'=>'completed'])->get();
        return view('admin.organizer.org_profile')->with('user_info', $user_info)->with('my_info', $my_info)->
        with('pending', $pending)->with('granted', $granted)->with('completed', $completed);

    }

    public function user_profile($id)
    {
        $my_info = registration::where('email', Session::get('login_email'))->first();

        $user_info = registration::where('id', $id)->first();

        $user_event = explode(',',$user_info->event_list);
        $user_event_list = array();
        foreach (array_reverse($user_event) as $event) {
            array_push($user_event_list, $event);
        }

        $user_event_count = count($user_event_list);

        $tournament = tournament::where('event_id', $user_event[0])->first();
        
        
        return view('admin.user.u_profile')->with('user_info', $user_info)->with('my_info', $my_info)->with('last_event', $tournament)->with('user_event_list', $user_event_count);

    }

    public function org_delete($id) {
        $delete = registration::where('id', $id)->delete();

        return redirect('admin_organizer_data');
    }
    public function user_delete($id) {
        $delete = registration::where('id', $id)->delete();

        return redirect('user_organizer_data');
    }



    public function approve_event()
    {
        $my_info = registration::where('email', Session::get('login_email'))->first();

        $pending = tournament::where('status', 'pending')->get();
        $granted = tournament::where('status', 'granted')->get();

        return view('admin.event_granted')->with('pending', $pending)->with('granted', $granted)->with('my_info', $my_info);
    }

    public function approving_event(Request $request)
    {
        
        $update_status = tournament::where('event_id', $request->event_id)->update(['status'=>'granted']);

        echo 'granted';
    }
}
