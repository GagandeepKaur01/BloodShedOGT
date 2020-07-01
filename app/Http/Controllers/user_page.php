<?php

namespace App\Http\Controllers;

use App\contact_form;
use App\feedback_form;
use App\payment_table;
use App\registration;
use App\tournament;
use App\tournament_record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Exists;

class user_page extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recent_tournament = tournament::where('status', 'granted')->latest('created_at')->take(3)->get();

        if (!Session::get('username')) {
            return view('index')->with('event_card_detail', $recent_tournament);
        } else {
            $get_user_detail = registration::where('email', Session::get('login_email'))->first();
            if ($get_user_detail->user_type == 'user') {
                return view('index')->with('event_card_detail', $recent_tournament)->with('user_detail', $get_user_detail);
            } elseif ($get_user_detail->user_type == 'org') {
                return redirect('org_dashboard')->with('user_detail', $get_user_detail);
            } elseif ($get_user_detail->user_type == 'admin') {
                return redirect('admin_dashboard')->with('user_detail', $get_user_detail);
            }
        }
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function edit_user_profile()
    {
        if (!Session::get('username')) {
            return redirect('/');
        } else {
            $get_user_detail = registration::where('email', Session::get('login_email'))->first();
            if ($get_user_detail->user_type == 'user') {
                return view('user.user_info')->with('user_detail', $get_user_detail);
            } elseif ($get_user_detail->user_type == 'org') {
                return redirect('org_dashboard')->with('user_detail', $get_user_detail);
            } elseif ($get_user_detail->user_type == 'admin') {
                return redirect('admin_dashboard')->with('user_detail', $get_user_detail);
            }
        }
    }

    public function show_edit_profile()
    {
        $show_my_info = registration::where('email', Session::get('login_email'))->first();
        return view('user.user_info')->with('my_info', $show_my_info);
    }
    public function update(Request $request)
    {
        $address = $request->city . ' ' . $request->state . ' ' . $request->country;
        $update_profile = registration::where('email', Session::get('login_email'))->update(['fullname' => $request->fullname, 'mobile' => $request->mobile, 'dob' => $request->dob, 'about' => $request->about, 'gender' => $request->gender, 'address' => $address]);

        session()->flash('update_profile', 'Profile updated.');
        return redirect('show_edit_profile');
    }

    public function user_Edit_game_id(Request $request)
    {
        $update_profile = registration::where('email', Session::get('login_email'))->update(['pubg_id' => $request->pubg_id, 'cod_id' => $request->cod_id, 'ff_id' => $request->ff_id, 'fortnite_id' => $request->fortnite_id]);

        session()->flash('updated_game_id', 'Game ID Updated.');
        return redirect('show_edit_profile');
    }

    public function check_current_password_for_change(Request $request)
    {
        $check_current_pass = registration::where('email', Session::get('login_email'))->first();

        if (Hash::check($request->current_password, $check_current_pass->password)) {
            echo 'correct';
        } else {
            echo 'not_correct';
        }
    }

    public function user_change_password(Request $request)
    {
        $change_password = registration::where('email', Session::get('login_email'))->update(['password' => Hash::make($request->confirm_password)]);

        session()->flash('update_profile', 'Profile updated.');
        return redirect('show_edit_profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // contact form submission
    public function contact_form_submission(Request $request)
    {
        $contact_detail = new contact_form();

        $contact_detail->name = $request->name;
        $contact_detail->email = $request->email;
        $contact_detail->phone = $request->phone;
        $contact_detail->subject = $request->name;
        $contact_detail->message = $request->message;

        $contact_detail->save();

        session()->flash('contact_form_submit', 'Contact Form Submitted');
        return redirect('contact');
    }

    public function feedback_form_submission(Request $request)
    {
        $feedback = new feedback_form();

        $feedback->experience = $request->experience;
        $feedback->comments = $request->comment;
        $feedback->name = $request->name;
        $feedback->email = $request->email;

        $feedback->save();

        return 'submitted';
    }

    public function tournament()
    {
        $pubg = tournament::where(['game' => 'pubg', 'status' => 'granted'])->get();
        $cod = tournament::where(['game' => 'cod', 'status' => 'granted'])->get();
        $ff = tournament::where(['game' => 'ff', 'status' => 'granted'])->get();
        $fortnite = tournament::where(['game' => 'fortnite', 'status' => 'granted'])->get();

        return view('tournament')->with('pubg', $pubg)->with('cod', $cod)->with('ff', $ff)->with('fortnite', $fortnite);
    }

    public function show_event_detail($id)
    {
        $event_detail = tournament::where('event_id', $id)->first();
        $event_payment = payment_table::where(['user_email' => Session::get('login_email')])->first();
        return view('event')->with('event_detail', $event_detail)->with('payment_detail', $event_payment);
    }

    // Solo Participation submit function
    public function solo_participation_submission(Request $request)
    {
        // print_r($request->all());
        // die();
        $fetch_tournament = tournament::where('event_id', $request->event_id)->first();
        $fetch_user_list_first = registration::where('username', $request->username)->first();
        if (!empty($fetch_tournament->player_list)) {
            $fetch_event_list = explode(",", $fetch_tournament->player_list);
            $fetch_event_list[] = $request->username;
            $imploded_list_into_string = implode(',', $fetch_event_list);

            $fetch_tournament->player_list = $imploded_list_into_string;
            $tournament_submit = $fetch_tournament->save();

            // Make an entry of user event_list
            if (!empty($fetch_user_list_first->event_list)) {
                $user_event_list = explode(",", $fetch_user_list_first->event_list);
                $user_event_list[] = $request->event_id;
                $imploded_user_event_list = implode(",", $user_event_list);

                $fetch_user_list_first->event_list = $imploded_user_event_list;

                $user_submit = $fetch_user_list_first->save();
            } else {
                $fetch_user_list_first->event_list = $request->event_id;
                $user_submit = $fetch_user_list_first->save();
            }

            if ($tournament_submit == 'true' && $user_submit == 'true') {
                session()->flash('Your Participated Successfully. You will receive email of participation and text message before a day of event.');
                return redirect('/event_show/' . $request->event_id);
            }
        } else {
            $fetch_tournament->player_list = $request->username;
            $tournament_submit = $fetch_tournament->save();

            // Make an entry of user event_list
            if (!empty($fetch_user_list_first->event_list)) {
                $user_event_list = explode(",", $fetch_user_list_first->event_list);
                $user_event_list[] = $request->event_id;
                $imploded_user_event_list = implode(",", $user_event_list);

                $fetch_user_list_first->event_list = $imploded_user_event_list;
                $user_submit = $fetch_user_list_first->save();
            } else {
                $fetch_user_list_first->event_list = $request->event_id;
                $user_submit = $fetch_user_list_first->save();
            }

            if ($tournament_submit == 'true' && $user_submit == 'true') {
                session()->flash('Your Participated Successfully. You will receive email of participation and text message before a day of event.');
                return redirect('/event_show/' . $request->event_id);
            }
        }
    }

    public function duo_participation_validation(Request $request)
    {
        $tournament_check = tournament::where('event_id', $request->event_id)->first();
        $user_exist_check = registration::where('username', $request->check_username)->first();

        if (!empty($user_exist_check)) {
            if ($tournament_check->player_list == '') {
                return 'empty';
            } else {
                $player_list = explode(",", $tournament_check->player_list);
                if (in_array($request->check_username, $player_list)) {
                    return 'exist';
                } else {
                    return 'not_participated';
                }
            }
        } else {
            return 'user_not_registered';
        }
    }

    public function squad_participation_validation(Request $request)
    {
        $tournament_check = tournament::where('event_id', $request->event_id)->first();
        $user_exist_check = registration::where('username', $request->check_username)->first();

        if (!empty($user_exist_check)) {
            if ($tournament_check->player_list == '') {
                return 'empty';
            } else {
                $remove_colon_from_array = explode(":", $tournament_check->player_list);
                $player_list = explode(",", $remove_colon_from_array);
                if (in_array($request->check_username, $player_list)) {
                    return 'exist';
                } else {
                    return 'not_participated';
                }
            }
        } else {
            return 'user_not_registered';
        }
    }

    public function submission_duo_team(Request $request)
    {
        $logged_in_user = Session::get('username');
        $fetch_tournament = tournament::where('event_id', $request->event_id)->first();
        $fetch_user_list_first = registration::where('username', $logged_in_user)->first();
        $fetch_user_list_second = registration::where('username', $request->player_1)->first();
        if (!empty($fetch_tournament->player_list)) {
            $fetch_event_list = explode(",", $fetch_tournament->player_list);
            $fetch_event_list[] = Session::get('username') . ':' . $request->player_1;
            $imploded_list_into_string = implode(',', $fetch_event_list);

            $fetch_tournament->player_list = $imploded_list_into_string;
            $tournament_submit = $fetch_tournament->save();

            // Make an entry of user event_list
            if (!empty($fetch_user_list_first->event_list)) {
                $user_event_list = explode(",", $fetch_user_list_first->event_list);
                $user_event_list[] = $request->event_id;
                $imploded_user_event_list = implode(",", $user_event_list);

                $fetch_user_list_first->event_list = $imploded_user_event_list;
                $user_submit = $fetch_user_list_first->save();
            } else {
                $fetch_user_list_first->event_list = $request->event_id;
                $user_submit = $fetch_user_list_first->save();
            }

            // Make an entry of user event_list
            if (!empty($fetch_user_list_second->event_list)) {
                $user_event_list = explode(",", $fetch_user_list_second->event_list);
                $user_event_list[] = $request->event_id;
                $imploded_user_event_list = implode(",", $user_event_list);

                $fetch_user_list_second->event_list = $imploded_user_event_list;
                $user_submit = $fetch_user_list_second->save();
            } else {
                $current_username = Session::get('username');
                $fetch_user_list_second->event_list = $request->event_id;
                $user_submit = $fetch_user_list_second->save();
            }

            if ($tournament_submit == 'true' && $user_submit == 'true') {
                session()->flash('Your Participated Successfully. You will receive email of participation and text message before a day of event.');
                return redirect('/event_show/' . $request->event_id);
            }
        } else {
            $fetch_tournament->player_list = Session::get('username') . ':' . $request->player_1;
            $tournament_submit = $fetch_tournament->save();

            // Make an entry of user event_list
            if (!empty($fetch_user_list_first->event_list)) {
                $user_event_list = explode(",", $fetch_user_list_first->event_list);
                $user_event_list[] = $request->event_id;
                $imploded_user_event_list = implode(",", $user_event_list);

                $fetch_user_list_first->event_list = $imploded_user_event_list;
                $user_submit = $fetch_user_list_first->save();
            } else {
                $fetch_user_list_first->event_list = $request->event_id;
                $user_submit = $fetch_user_list_first->save();
            }

            // Make an entry of user event_list
            if (!empty($fetch_user_list_second->event_list)) {
                $user_event_list = explode(",", $fetch_user_list_second->event_list);
                $user_event_list[] = $request->event_id;
                $imploded_user_event_list = implode(",", $user_event_list);

                $fetch_user_list_second->event_list = $imploded_user_event_list;
                $user_submit = $fetch_user_list_second->save();
            } else {
                $current_username = Session::get('username');
                $fetch_user_list_second->event_list = $request->event_id;
                $user_submit = $fetch_user_list_second->save();
            }

            if ($tournament_submit == 'true' && $user_submit == 'true') {
                session()->flash('Your Participated Successfully. You will receive email of participation and text message before a day of event.');
                return redirect('/event_show/' . $request->event_id);
            }
        }
    }

    public function submission_squad_team(Request $request)
    {
        $all_username[] = Session::get('username');
        $all_username[] = $request->player_2;
        $all_username[] = $request->player_3;
        $all_username[] = $request->player_4;
        $fetch_tournament = tournament::where('event_id', $request->event_id)->first();

        // print_r($fetch_tournament);
        // die();
        if (!empty($fetch_tournament->player_list)) {
            $break_event_list_by_comma = explode(",", $fetch_tournament->player_list);
            $current_username = Session::get('username');
            $combine_username_string = $current_username . ':' . $request->player_2 . ':' . $request->player_3 . ':' . $request->player_4;
            $break_event_list_by_comma[] = $combine_username_string;
            $imploded_list_into_string = implode(',', $break_event_list_by_comma);

            $fetch_tournament->player_list = $imploded_list_into_string;
            $tournament_submit = $fetch_tournament->save();

            // Make an entry of user event_list
            foreach ($all_username as $user_submit) {
                $fetch_user_list = registration::where('username', $user_submit)->first();
                if (!empty($fetch_user_list->event_list)) {
                    $user_event_list = explode(",", $fetch_user_list->event_list);
                    $user_event_list[] = $request->event_id;
                    $imploded_user_event_list = implode(",", $user_event_list);

                    $fetch_user_list->event_list = $imploded_user_event_list;
                    $user_submit = $fetch_user_list->save();
                } else {
                    $fetch_user_list->event_list = $request->event_id;
                    $user_submit = $fetch_user_list->save();
                }
            }
            if ($tournament_submit == 'true' && $user_submit == 'true') {
                session()->flash('Your Participated Successfully. You will receive email of participation and text message before a day of event.');
                return redirect('/event_show/' . $request->event_id);
            }
        } else {
            $current_username = Session::get('username');
            $combine_username = $current_username . ':' . $request->player_2 . ':' . $request->player_3 . ':' . $request->player_4;
            $fetch_tournament->player_list = $combine_username;

            // echo $combine_username;
            // die();
            $tournament_submit = $fetch_tournament->save();

            // Make an entry of user event_list
            foreach ($all_username as $user_submit) {
                $fetch_user_list = registration::where('username', $user_submit)->first();
                if (!empty($fetch_user_list->event_list)) {
                    $user_event_list = explode(",", $fetch_user_list->event_list);
                    $user_event_list[] = $request->event_id;
                    $imploded_user_event_list = implode(",", $user_event_list);

                    $fetch_user_list->event_list = $imploded_user_event_list;
                    $user_submit = $fetch_user_list->save();
                } else {
                    $fetch_user_list->event_list = $request->event_id;
                    $user_submit = $fetch_user_list->save();
                }
            }
            if ($tournament_submit == 'true' && $user_submit == 'true') {
                session()->flash('Your Participated Successfully. You will receive email of participation and text message before a day of event.');
                return redirect('/event_show/' . $request->event_id);
            }
        }
    }

    public function user_dashboard()
    {
        $get_user_details = registration::where('email', Session::get('login_email'))->first();
        $fetch_user_completed_event_records = tournament_record::where('user_username', Session::get('username'))->get();

        $user_event_list = explode(",", $get_user_details->event_list);

        $all_event_list_played_by_user = array();
        foreach ($user_event_list as $fetch_every_event) {
            $fetching_event = tournament::where('event_id', $fetch_every_event)->first();
            array_push($all_event_list_played_by_user, $fetching_event);
        }

        // completed tournament
        $all_event_which_is_completed = array();
        foreach ($fetch_user_completed_event_records as $fetch_every_event_detail) {
            $fetching_completed_event = tournament::where(['event_id' => $fetch_every_event_detail->event_id, 'status' => 'completed'])->first();
            array_push($all_event_which_is_completed, $fetching_completed_event);
        }
        // echo '<pre>';
        // print_r($all_event_which_is_completed);
        // die();

        // $combine_completed_or_tournament_records = array_merge($fetch_user_completed_event_records, $all_event_which_is_completed);

        return view('user.userprofile')->with('user_detail', $get_user_details)->with('completed_event_detail', $all_event_which_is_completed)->with('event_records', $fetch_user_completed_event_records)->with('all_events', $all_event_list_played_by_user);
    }


    // Paytm Function Start

    public function add_payment(Request $request)
    {
        $insert_data = new payment_table();


        $insert_data->event_id = $request->event_id;
        $insert_data->user_email = $request->user_email;
        $insert_data->price = $request->price;
        Session::put('event_id', $request->event_id);
        Session::put('price', $request->price);
        $insert_data->save();

        return redirect('make_payment');
    }

    public function make_payment(Request $request)
    {
        // echo '<pre>';
        $order_id = rand() . time();
        // echo $order_id;
        // print_r($request->all());
        // die();
        $update_course_data = payment_table::where('event_id', Session::get('event_id'))->update(['order_id' => $order_id]);


        // print_r($update_course_data);


        $data_for_request = $this->handlePaytmRequest($order_id, Session::get('price'));
        $paytm_txn_url = 'https://securegw-stage.paytm.in/theia/processTransaction';
        $paramList = $data_for_request['paramList'];
        $checkSum = $data_for_request['checkSum'];
        return view('paytm-merchant-form', compact('paytm_txn_url', 'paramList', 'checkSum'));
    }

    public function handlePaytmRequest($order_id, $amount)
    {
        // Load all functions of encdec_paytm.php and config-paytm.php
        $this->getAllEncdecFunc();
        $this->getConfigPaytmSettings();

        $checkSum = "";
        $paramList = array();

        // Create an array having all required parameters for creating checksum.
        $paramList["MID"] = 'apWgkb45173154247758';
        $paramList["ORDER_ID"] = $order_id;
        $paramList["CUST_ID"] = $order_id;
        $paramList["INDUSTRY_TYPE_ID"] = 'Retail';
        $paramList["CHANNEL_ID"] = 'WEB';
        $paramList["TXN_AMOUNT"] = $amount;
        $paramList["WEBSITE"] = 'WEBSTAGING';
        $paramList["CALLBACK_URL"] = url('/paytm-callback');
        $paytm_merchant_key = 'D1ommub@SxOechhX';

        //Here checksum string will return by getChecksumFromArray() function.
        $checkSum = getChecksumFromArray($paramList, $paytm_merchant_key);

        return array(
            'checkSum' => $checkSum,
            'paramList' => $paramList
        );
    }



    // paytm fn
    function getAllEncdecFunc()
    {
        function encrypt_e($input, $ky)
        {
            $key   = html_entity_decode($ky);
            $iv = "@@@@&&&&####$$$$";
            $data = openssl_encrypt($input, "AES-128-CBC", $key, 0, $iv);
            return $data;
        }

        function decrypt_e($crypt, $ky)
        {
            $key   = html_entity_decode($ky);
            $iv = "@@@@&&&&####$$$$";
            $data = openssl_decrypt($crypt, "AES-128-CBC", $key, 0, $iv);
            return $data;
        }

        function pkcs5_pad_e($text, $blocksize)
        {
            $pad = $blocksize - (strlen($text) % $blocksize);
            return $text . str_repeat(chr($pad), $pad);
        }

        function pkcs5_unpad_e($text)
        {
            $pad = ord($text[
                strlen($text) - 1]);
            if ($pad > strlen($text))
                return false;
            return substr($text, 0, -1 * $pad);
        }

        function generateSalt_e($length)
        {
            $random = "";
            srand((float) microtime() * 1000000);

            $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
            $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
            $data .= "0FGH45OP89";

            for ($i = 0; $i < $length; $i++) {
                $random .= substr($data, (rand() % (strlen($data))), 1);
            }

            return $random;
        }

        function checkString_e($value)
        {
            if ($value == 'null')
                $value = '';
            return $value;
        }

        function getChecksumFromArray($arrayList, $key, $sort = 1)
        {
            if ($sort != 0) {
                ksort($arrayList);
            }
            $str = getArray2Str($arrayList);
            $salt = generateSalt_e(4);
            $finalString = $str . "|" . $salt;
            $hash = hash("sha256", $finalString);
            $hashString = $hash . $salt;
            $checksum = encrypt_e($hashString, $key);
            return $checksum;
        }
        function getChecksumFromString($str, $key)
        {

            $salt = generateSalt_e(4);
            $finalString = $str . "|" . $salt;
            $hash = hash("sha256", $finalString);
            $hashString = $hash . $salt;
            $checksum = encrypt_e($hashString, $key);
            return $checksum;
        }

        function verifychecksum_e($arrayList, $key, $checksumvalue)
        {
            $arrayList = removeCheckSumParam($arrayList);
            ksort($arrayList);
            $str = getArray2StrForVerify($arrayList);
            $paytm_hash = decrypt_e($checksumvalue, $key);
            $salt = substr($paytm_hash, -4);

            $finalString = $str . "|" . $salt;

            $website_hash = hash("sha256", $finalString);
            $website_hash .= $salt;

            $validFlag = "FALSE";
            if ($website_hash == $paytm_hash) {
                $validFlag = "TRUE";
            } else {
                $validFlag = "FALSE";
            }
            return $validFlag;
        }

        function verifychecksum_eFromStr($str, $key, $checksumvalue)
        {
            $paytm_hash = decrypt_e($checksumvalue, $key);
            $salt = substr($paytm_hash, -4);

            $finalString = $str . "|" . $salt;

            $website_hash = hash("sha256", $finalString);
            $website_hash .= $salt;

            $validFlag = "FALSE";
            if ($website_hash == $paytm_hash) {
                $validFlag = "TRUE";
            } else {
                $validFlag = "FALSE";
            }
            return $validFlag;
        }

        function getArray2Str($arrayList)
        {
            $findme   = 'REFUND';
            $findmepipe = '|';
            $paramStr = "";
            $flag = 1;
            foreach ($arrayList as $key => $value) {
                $pos = strpos($value, $findme);
                $pospipe = strpos($value, $findmepipe);
                if ($pos !== false || $pospipe !== false) {
                    continue;
                }

                if ($flag) {
                    $paramStr .= checkString_e($value);
                    $flag = 0;
                } else {
                    $paramStr .= "|" . checkString_e($value);
                }
            }
            return $paramStr;
        }

        function getArray2StrForVerify($arrayList)
        {
            $paramStr = "";
            $flag = 1;
            foreach ($arrayList as $key => $value) {
                if ($flag) {
                    $paramStr .= checkString_e($value);
                    $flag = 0;
                } else {
                    $paramStr .= "|" . checkString_e($value);
                }
            }
            return $paramStr;
        }

        function redirect2PG($paramList, $key)
        {
            $hashString = getchecksumFromArray($paramList, $key);
            $checksum = encrypt_e($hashString, $key);
        }

        function removeCheckSumParam($arrayList)
        {
            if (isset($arrayList["CHECKSUMHASH"])) {
                unset($arrayList["CHECKSUMHASH"]);
            }
            return $arrayList;
        }

        function getTxnStatus($requestParamList)
        {
            return callAPI(PAYTM_STATUS_QUERY_URL, $requestParamList);
        }

        function getTxnStatusNew($requestParamList)
        {
            return callNewAPI(PAYTM_STATUS_QUERY_NEW_URL, $requestParamList);
        }

        function initiateTxnRefund($requestParamList)
        {
            $CHECKSUM = getRefundChecksumFromArray($requestParamList, PAYTM_MERCHANT_KEY, 0);
            $requestParamList["CHECKSUM"] = $CHECKSUM;
            return callAPI(PAYTM_REFUND_URL, $requestParamList);
        }

        function callAPI($apiURL, $requestParamList)
        {
            $jsonResponse = "";
            $responseParamList = array();
            $JsonData = json_encode($requestParamList);
            $postData = 'JsonData=' . urlencode($JsonData);
            $ch = curl_init($apiURL);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($postData)
            ));
            $jsonResponse = curl_exec($ch);
            $responseParamList = json_decode($jsonResponse, true);
            return $responseParamList;
        }

        function callNewAPI($apiURL, $requestParamList)
        {
            $jsonResponse = "";
            $responseParamList = array();
            $JsonData = json_encode($requestParamList);
            $postData = 'JsonData=' . urlencode($JsonData);
            $ch = curl_init($apiURL);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($postData)
            ));
            $jsonResponse = curl_exec($ch);
            $responseParamList = json_decode($jsonResponse, true);
            return $responseParamList;
        }
        function getRefundChecksumFromArray($arrayList, $key, $sort = 1)
        {
            if ($sort != 0) {
                ksort($arrayList);
            }
            $str = getRefundArray2Str($arrayList);
            $salt = generateSalt_e(4);
            $finalString = $str . "|" . $salt;
            $hash = hash("sha256", $finalString);
            $hashString = $hash . $salt;
            $checksum = encrypt_e($hashString, $key);
            return $checksum;
        }
        function getRefundArray2Str($arrayList)
        {
            $findmepipe = '|';
            $paramStr = "";
            $flag = 1;
            foreach ($arrayList as $key => $value) {
                $pospipe = strpos($value, $findmepipe);
                if ($pospipe !== false) {
                    continue;
                }

                if ($flag) {
                    $paramStr .= checkString_e($value);
                    $flag = 0;
                } else {
                    $paramStr .= "|" . checkString_e($value);
                }
            }
            return $paramStr;
        }
        function callRefundAPI($refundApiURL, $requestParamList)
        {
            $jsonResponse = "";
            $responseParamList = array();
            $JsonData = json_encode($requestParamList);
            $postData = 'JsonData=' . urlencode($JsonData);
            $ch = curl_init($apiURL);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_URL, $refundApiURL);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $headers = array();
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $jsonResponse = curl_exec($ch);
            $responseParamList = json_decode($jsonResponse, true);
            return $responseParamList;
        }
    }

    function getConfigPaytmSettings()
    {
        define('PAYTM_ENVIRONMENT', 'TEST'); // PROD
        define('PAYTM_MERCHANT_KEY', 'D1ommub@SxOechhX'); //Change this constant's value with Merchant key downloaded from portal
        define('PAYTM_MERCHANT_MID', 'apWgkb45173154247758'); //Change this constant's value with MID (Merchant ID) received from Paytm
        define('PAYTM_MERCHANT_WEBSITE', 'WEBSTAGING'); //Change this constant's value with Website name received from Paytm

        $PAYTM_STATUS_QUERY_NEW_URL = 'https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
        $PAYTM_TXN_URL = 'https://securegw-stage.paytm.in/theia/processTransaction';
        if (PAYTM_ENVIRONMENT == 'PROD') {
            $PAYTM_STATUS_QUERY_NEW_URL = 'https://securegw.paytm.in/merchant-status/getTxnStatus';
            $PAYTM_TXN_URL = 'https://securegw.paytm.in/theia/processTransaction';
        }
        define('PAYTM_REFUND_URL', '');
        define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
        define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
        define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
    }

    public function paytmCallback(Request $request)
    {
        $order_id = $request['ORDERID'];
        $price = $request['TXNAMOUNT'];
        // return $request;
        if ('TXN_SUCCESS' === $request['STATUS']) {
            $transaction_id = $request['TXNID'];
            $order = payment_table::where('order_id', $order_id)->update(['transaction_id' => $transaction_id, 'payment_status' => '1', 'price' => $price]);
            // print_r($order);
            // die();
            session()->flash('payment_done', 'Your Payment is Done! You will receive message before a day of tournament');
            return redirect('/event_show/' . Session::get('event_id'));
        } else if ('TXN_FAILURE' === $request['STATUS']) {
            // return view( 'payment-failed' );
            print_r($request->all());
            die();
        }
    }

    // Paytm Function End
}
