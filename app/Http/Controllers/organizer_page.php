<?php

namespace App\Http\Controllers;

use App\registration;
use Session;
use App\tournament;
use App\tournament_record;
use Illuminate\Http\Request;

class organizer_page extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetch_user_detail = registration::where('email', Session::get('login_email'))->first();
        $tournament = tournament::where('username_id', Session::get('username'))->get();
        $latest = tournament::where(['username_id' => Session::get('username'),])->latest()->get();
        $total_participant = 0;
        $total_event = count($tournament);

        $complete_event = 0;
        if (!empty($tournament)) {
            foreach ($tournament as $count_player) {

                if (!empty($count_player->player_list)) {
                    $player_list = explode(":", $count_player->player_list);
                    $make_string = implode(",", $player_list);
                    $player_list = explode(",", $make_string);
                    $total_participant = count($player_list);
                } else {
                    $total_participant = 0;
                }
                foreach ($tournament as $completed) {
                    if ($completed->status == 'completed') {
                        $complete_event++;
                    }
                }
            }
        }

        return view('organizer.dashboard')->with('org_detail', $fetch_user_detail)->with('latest', $latest)->with('total_event', $total_event)->with('complete_event', $complete_event)->with('total_participant', $total_participant);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function organizer_event_info($id)
    {
        $my_info = registration::where('email', Session::get('login_email'))->first();
        $particular_event = tournament::where('event_id', $id)->first();

        return view('organizer.Organizer_EventInfo')->with('event', $particular_event)->with('org_detail', $my_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_event(Request $request)
    {

        $create_event = new tournament;

        $username = Session::get('username');
        $number_of_digits = 15;
        $event_id =  substr(number_format(time() * mt_rand(), 0, '', ''), 0, $number_of_digits);

        $create_event->username_id = $username;
        $create_event->event_id = $event_id;
        $create_event->game = $request->select;
        $create_event->tournament_name = $request->event_name;
        $create_event->platform = $request->platform;
        $create_event->price = $request->price;
        $create_event->prize = $request->prize;
        $create_event->type = $request->type;
        $create_event->total_player = $request->player_number;
        $create_event->start_date = $request->date;
        $create_event->time = $request->time;
        $create_event->check_in = $request->check_in;
        if ($request->select == 'pubg') {
            $create_event->logo = $request->pubg_logo;
            $create_event->banner = $request->pubg_banner;
            $create_event->map = $request->pubg_map;
        } elseif ($request->select == 'cod') {
            $create_event->logo = $request->cod_logo;
            $create_event->banner = $request->cod_banner;
            $create_event->map = $request->cod_map;
        } elseif ($request->select == 'ff') {
            $create_event->logo = $request->ff_logo;
            $create_event->banner = $request->ff_banner;
            $create_event->map = $request->ff_map;
        } elseif ($request->select == 'fortnite') {
            $create_event->logo = $request->fortnite_logo;
            $create_event->banner = $request->fortnite_banner;
            $create_event->map = $request->fortnite_map;
        }
        $create_event->format = $request->format;
        $create_event->region = $request->region;
        $create_event->contact = $request->contact;
        $create_event->prize_list = implode(",", $request->prize_input);
        $address = $request->place . ' ' . $request->place_address . ' ' . $request->city . ' ' . $request->state . ' ' . $request->pincode . ' India';
        $create_event->address = $address;
        $create_event->save();
        session()->flash('created', 'Tournament Created ! Administrator Will Check and Post That Within Day');
        return redirect('create_event');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fetch_all_event()
    {
        $username = Session::get('username');
        $all_pending_event = tournament::where(['username_id' => $username, 'status' => 'pending'])->get();
        $all_granted_event = tournament::where(['username_id' => $username, 'status' => 'granted'])->get();
        return view('organizer.checkevent')->with('all_pending_event', $all_pending_event)->with('username', $username)->with('granted_event', $all_granted_event);
    }

    public function completed_event()
    {
        $username = Session::get('username');
        $all_granted_event = tournament::where(['username_id' => $username, 'status' => 'completed'])->get();
        return view('organizer.activity')->with('events', $all_granted_event)->with('username', $username);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_page_of_submission_result($id)
    {
        $fetch_tournament_for_result_submission = tournament::where('event_id', $id)->first();
        $total_records = tournament_record::where('event_id', $id)->get();
        $total_event_records = count($total_records);
        return view('organizer.result_submit')->with('event_detail', $fetch_tournament_for_result_submission)->with('total_records', $total_event_records);
    }

    public function submit_user_event_result(Request $request)
    {
        // print_r($request->all());
        // die();
        $insert_data = new tournament_record();

        $insert_data->organizer_username = $request->org;
        $insert_data->event_id = $request->event_id;
        $insert_data->user_username = $request->player_username;
        $insert_data->position = $request->position;
        $insert_data->prize = $request->prize;
        $insert_data->game = $request->game;
        $insert_data->type = $request->type;

        $insert_data->save();

        $fetch_records = tournament_record::where('event_id', $request->event_id)->get();
        $total_records = $fetch_records->count();

        return redirect('/submit_tournament_result/' . $request->event_id);
    }

    public function submit_tournament($id)
    {
        $change_status = tournament::where('event_id', $id)->update(['status' => 'completed']);

        return redirect('activity');
    }

    public function show_event_result($id)
    {
        $show_all_event_records = tournament_record::where('event_id', $id)->orderBy("position", "ASC")->get();

        return view('organizer.activity_table')->with('completed_event_record', $show_all_event_records);
    }

    public function organizer_profile()
    {
        $org_detail = registration::where('email', Session::get('login_email'))->first();

        return view('organizer.org_profile')->with('org_detail', $org_detail);
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
        // echo '<pre>';
        // print_r($request->all());
        // die();
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $image_name = $image->getClientOriginalName();
        //     $image->move(public_path() . '/profile_image/', $image_name);
        // } else {
        //     if (!empty($request->image)) {
        //         $image_name = $request->image;
        //     } else {
        //         $image_name = 'default.jpg';
        //     }
        // }
        $update_organizer_profile = registration::where('email', $request->email)->update(['fullname' => $request->fullname, 'about' => $request->about, 'address' => $request->address, 'mobile' => $request->mobile]);

        session()->flash('update_profile', 'Profile updated.');
        return redirect('organizer_profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
