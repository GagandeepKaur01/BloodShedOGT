@extends('layout.user_navbar_footer')

@section('navbar')
@parent
@endsection

@section('main_content')
<title>Edit Profile</title>

<link rel="stylesheet" href="{{asset(url('user/Edit_User.css'))}}">

</head>

<!-- Gap -->
<div class="gap_top_main" style="height: 20vh;"></div>
<!-- Tabs Container -->
<div class="container-fluid second-section">
    <div class="row">

        <!-- Container / Page main heading -->
        <div class="col-12 text-center">
            <h1 class="page_heading">EDIT <span class="heading_2">PROFILE</span></h1>
            <p>Change your profile settings and gaming preferences</p>
        </div>

        <!-- Tabs -->
        <div class="col-12">
            <main>
                <div id="tabs" class="">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#user_profile">
                                Profile
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#game_id">
                                Game ID's
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#password">
                                Password
                            </a>
                        </li>
                    </ul>
                </div>

                <div id="content">

                </div>
            </main>
        </div>
        <div class="col-12 p-0 m-0 mx-auto">
            @if(session()->get('update_profile'))
            <div class="col-11 alert alert-success rounded p-2 mt-1 mb-1">
                {{session()->get('update_profile')}}
            </div>
            @elseif(session()->get('updated_game_id'))
            <div class="col-11 alert alert-success rounded p-2 mt-1 mb-1">
                {{session()->get('updated_game_id')}}
            </div>
            @endif
        </div>
        <!-- Tabs Content -->
        <div class="col-11 mx-auto mt-4">
            <div class="tab-content d-block" id="pills-tabContent">

                <!-- Tab UserProfile -->
                <div class="tab-pane fade show active" id="user_profile">
                    <form action="{{url('user_Edit_profile')}}" method="post" class="w-100">
                        @csrf()
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="username">Username: </label>
                                    <input type="text" name="username" class="form-control" value="{{$my_info->username}}" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label for="fullname">Fullname: </label>
                                    <input type="text" name="fullname" class="form-control" value="{{$my_info->fullname}}">
                                </div>

                                <div class="col-md-6">
                                    <label for="email">Email: </label>
                                    <input type="text" name="email" class="form-control" value="{{$my_info->email}}" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label for="mobile">Mobile:</label>
                                    <input type="number" name="mobile" class="form-control" value="{{$my_info->mobile}}">
                                </div>

                                <div class="col-md-6">
                                    <label for="dob">Date of Birth:</label>
                                    <input type="date" name="dob" class="form-control" value="{{$my_info->dob}}">
                                </div>

                                <div class="col-md-6 pt-3">

                                    <label for="gender" class="d-block">Gender:</label>
                                    @if(!empty($my_info->gender))
                                    @if($my_info->gender == 'Male')
                                    <label for="gender">Male</label>
                                    <input type="radio" name="gender" value="Male" class="" checked>
                                    <label for="gender">Female</label>
                                    <input type="radio" name="gender" value="Female" class="">
                                    @else
                                    <label for="gender">Male</label>
                                    <input type="radio" name="gender" value="Male" class="">
                                    <label for="gender">Female</label>
                                    <input type="radio" name="gender" value="Female" class="" checked>
                                    @endif

                                    @else


                                    <label for="gender">Male</label>
                                    <input type="radio" name="gender" value="Male" class="">
                                    <label for="gender">Female</label>
                                    <input type="radio" name="gender" value="Female" class="">
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <label for="country">Country:</label>
                                    <select name="country" class="form-control" readonly>
                                        <option value="">India</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="state">State:</label>
                                    <select name="state" class="form-control">
                                        <option value=""></option>
                                        <option value="punjab">Punjab</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="city">City:</label>
                                    <select name="city" class="form-control">
                                        <option value=""></option>
                                        <option value="amritsar">Amritsar</option>
                                        <option value="patiala">Patiala</option>
                                        <option value="chhehrata">Chhehrata</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="about">About me:</label>
                                    <textarea name="about" id="" class="form-control">{{$my_info->about}}</textarea>
                                </div>
                            </div>
                            <div class="col-12 mx-auto mt-5 text-center">
                                <button type="submit" id="update_my_info" class="btn">Update Info</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Tab Game_ID -->
                <div class="tab-pane fade" id="game_id">
                    <form action="{{url('user_Edit_game_id')}}" method="post" class="w-100">
                        @csrf()
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="pubg">PUBG ID: </label>
                                    <input type="text" name="pubg_id" class="form-control" value="{{$my_info->pubg_id}}">
                                </div>

                                <div class="col-md-6">
                                    <label for="cod">COD ID: </label>
                                    <input type="text" name="cod_id" class="form-control" value="{{$my_info->cod_id}}">
                                </div>

                                <div class="col-md-6">
                                    <label for="freefire">Free Fire ID: </label>
                                    <input type="text" name="ff_id" class="form-control" value="{{$my_info->ff_id}}">
                                </div>

                                <div class="col-md-6">
                                    <label for="fortnite">Fortnite: </label>
                                    <input type="text" name="fortnite_id" class="form-control" value="{{$my_info->fortnite_id}}">
                                </div>
                            </div>
                            <div class="col-12 mx-auto mt-5 text-center">
                                <button type="submit" id="update_game_id" class="btn">Update My Game ID</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Tab Password -->
                <div class="tab-pane fade" id="password">
                    <form action="{{url('user_change_password')}}" id="change_password_confirm" method="post" class="w-100">
                        @csrf()
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <label for="current_pass_2">Current password: </label>
                                    <input type="text" id="current" class="form-control">
                                </div>

                                <div class="col-12">
                                    <label for="new_password">New password:</label>
                                    <input type="text" id="new_pass" class="form-control">
                                </div>

                                <div class="col-12">
                                    <label for="confirm_password">Confirm password:</label>
                                    <input type="text" id="confirm_pass" name="confirm_password" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 mx-auto mt-5 text-center">
                                <button type="submit" id="submit_pass" class="btn">Update Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script -->
<script>
    $(function() {
        var current = false;
        var confirm = false;
        $('body').find('.form-control').attr('required', 'true');


        $('#current').keyup(function(e) {
            e.preventDefault();
            let current_pass = $('#current').val();
            $.ajax({
                type: 'POST',
                url: '{{url("check_current_password_for_change")}}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'current_password': current_pass,
                },
                success: function(data) {
                    if (data == 'correct') {
                        current = true;
                        $('#current').addClass('is-valid').removeClass('is-invalid');
                    } else {
                        current = false;
                        $('#current').addClass('is-invalid').removeClass('is-valid');
                    }
                }
            });
        });

        $('#confirm_pass').keyup(function() {
            let new_pass = $('#new_pass').val();
            let confirm_pass = $('#confirm_pass').val();

            if (new_pass == confirm_pass) {
                confirm = true;
                console.log('true');
                $('#new_pass').addClass('is-valid').removeClass('is-invalid');
                $('#confirm_pass').addClass('is-valid').removeClass('is-invalid');
                $('#pass_sub').show();
                console.log('show')
            } else {
                $('#pass_sub').hide();
                console.log('hide');
                confirm = false;
                $('#new_pass').addClass('is-invalid').removeClass('is-valid');
                $('#confirm_pass').addClass('is-invalid').removeClass('is-valid');
            }

        });

        $('#pass_sub').click(function() {
            let final_password = $('#confirm_pass').val();
            console.log(current + '' + confirm)
            if (current == true && confirm == true) {
              $('#change_password_confirm').submit();
            } else {
                alert('Fill the password correctly');
            }
        });
    });
</script>
<script src="{{asset(url('JavaScript/login.js'))}}"></script>
<script src="{{asset(url('JavaScript/Home.js'))}}"></script>

@endsection

@section('footer')

@parent

@endsection