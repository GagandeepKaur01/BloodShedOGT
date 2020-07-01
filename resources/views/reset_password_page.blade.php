@extends('layout.user_navbar_footer')

@section('navbar')
@parent
@endsection


@section('main_content')
<div class="container position-relative mb-4" style="padding-top: 20%; min-height: 60vh;">
    <div class="row">
        <div class='col-md-6 col-11 col-sm-10  mx-auto mt-4 text-white text-center rounded p-2 position-absolute' style="background: #6db4aedb !important; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <div class="new_password_error"></div>
            <h3 class=" ">Password Reset Form</h3>
            <form action="{{url('new_password_form',[$token])}}" method="post">
                @csrf()
                <label for="">New Password</label>
                <input type="password" name='new_password' id='new_password' class='form-control'>
                <label for="">Confirm Password</label>
                <input type="password" name='conf_password' id='conf_password' class='form-control'>
                <input type="submit" id="change_password" class="btn btn-success">
            </form>
        </div>
    </div>
</div>

<script>
    $('#conf_password').keyup(function() {
        let new_pass = $('#new_password').val();
        let conf_pass = $(this).val();
        if (new_pass == conf_pass) {
            $('#change_password').attr('disabled', false);
            $('.new_password_error').html('Password Match');
            $('.new_password_error').addClass('bg-success').addClass('alert').removeClass('bg-danger');
        } else {
            $('#change_password').attr('disabled', true);
            $('.new_password_error').html('Password not Match');
            $('.new_password_error').addClass('bg-danger').addClass('alert').removeClass('bg-success');

        }
    })
</script>
@endsection

@section('footer')

@parent

@endsection