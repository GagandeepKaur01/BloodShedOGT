@extends('layout.user_navbar_footer')

@section('navbar')
@parent
@endsection

@section('main_content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="{{asset(url('static_css/feedback_form.css'))}}">



<div class="container feedback mb-5">
    <div class="imagebg"></div>
    <div class="row " style="margin-top: 50px">
        <div class="col-md-8 col-sm-10 mx-auto form-container">
            <h2 class="pt-1 pb-1">Feedback</h2>
            <p> Please provide your feedback below: </p>
            <form role="form" method="post" id="reused_form">
                @csrf()
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label>How do you rate your overall experience?</label>
                        <p>
                            <label class="radio-inline">
                                <input type="radio" name="experience" id="radio_experience" value="bad">
                                Bad
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="experience" id="radio_experience" value="average">
                                Average
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="experience" id="radio_experience" value="good">
                                Good
                            </label>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="comments"> Comments:</label>
                        <textarea class="form-control" type="textarea" name="comment" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="name"> Your Name:</label>
                        <input type="text" class="form-control" id="feedback_name" name="name" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email"> Email:</label>
                        <input type="email" class="form-control" id="feedback_email" name="email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button type="submit" class="btn btn-lg btn-warning btn-block">Post </button>
                    </div>
                </div>
            </form>
            <div id="success_message" style="width:100%; height:100%; display:none; ">
                <h3>Posted your feedback successfully!</h3>
            </div>
            <div id="error_message" style="width:100%; height:100%; display:none; ">
                <h3>Error</h3> Sorry there was an error sending your form.
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {

        $('#reused_form').submit(function(e) {
            e.preventDefault();

            $form = $(this);
            //show some response on the button
            $('button[type="submit"]', $form).each(function() {
                $btn = $(this);
                $btn.prop('type', 'button');
                $btn.prop('orig_label', $btn.text());
                $btn.text('Sending ...');
            });


            $.ajax({
                type: "POST",
                url: "{{url('feedback_form_submission')}}",
                data: $form.serialize(),
                success: function(data) {
                    if (data == 'submitted') {
                        $('form#reused_form').hide();
                        $('#success_message').show();
                        $('#error_message').hide();
                    } else {
                        $('#error_message').append('<ul></ul>');

                        jQuery.each(data.errors, function(key, val) {
                            $('#error_message ul').append('<li>' + key + ':' + val + '</li>');
                        });
                        $('#success_message').hide();
                        $('#error_message').show();

                        //reverse the response on the button
                        $('button[type="button"]', $form).each(function() {
                            $btn = $(this);
                            label = $btn.prop('orig_label');
                            if (label) {
                                $btn.prop('type', 'submit');
                                $btn.text(label);
                                $btn.prop('orig_label', '');
                            }
                        });
                    }
                }
            });

        });
    });
</script>
<script src="{{asset(url('JavaScript/login.js'))}}"></script>
<script src="{{asset(url('JavaScript/Home.js'))}}"></script>

@endsection

@section('footer')

@parent

@endsection