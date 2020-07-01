@extends('layout.user_navbar_footer')

@section('navbar')
@parent
@endsection


@section('main_content')
<div class="container mt-3 mb-3" style="padding-top: 10%; min-height: 70vh;">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2 class="text-center">Forget Password</h2>
            <h3 class="forgot_password_error"></h3>
            <label data-error="required" for="Form-email1">E-mail</label>
            <input type="email" placeholder="Enter registered email" class="form-control forgot_password_email" required>
            <button type="submit" class="btn btn-info mt-2" id='check_email'>Email Check</button>
        </div>
    </div>
</div>

<script>
    $('#check_email').click(function() {
        let email = $('.forgot_password_email').val()
        if (email == '') {
            $('.forgot_password_error').css('display', 'block');
            $('.forgot_password_error').html('Please Fill Something');
            $('.forgot_password_error').addClass('alert').addClass('alert-danger');
        } else {
            $('.forgot_password_error').css('display', 'none');
            $.ajax({
                url: '{{url("check_email_in_db")}}',
                type: 'get',
                data: {
                    email: email
                },
                success: function(data) {
                    if (data == 'notregister') {
                        $('.forgot_password_error').css('display', 'block');
                        $('.forgot_password_error').html('EMail is not recognised. Please check it  again');
                        $('.forgot_password_error').addClass('alert').addClass('alert-danger');
                    } else {
                        $('.forgot_password_error').css('display', 'block');
                        $('.forgot_password_error').html('A Token is send to your entered email');
                        $('.forgot_password_error').addClass('alert').addClass('alert-success').removeClass('bg-danger');
                        setTimeout(function() {
                            window.location.replace('{{url("/")}}');
                        }, 3000);
                    }
                }
            })
        }


    })
</script>
@endsection

@section('footer')

@parent

@endsection