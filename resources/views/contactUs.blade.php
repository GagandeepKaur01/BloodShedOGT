@extends('layout.user_navbar_footer')

@section('navbar')
@parent
@endsection

@section('main_content')
<link rel="stylesheet" href="{{asset(url('static_css/contact1.css'))}}">

<div>
    <div class="container">
        <div class="contact-parent">
            <div class="contact-child child1">
                <p>
                    <i class="fas fa-map-marker-alt"></i> Address <br />
                    <span> Ash Lane 110
                        <br />
                        Mohali, Punjab
                    </span>
                </p>

                <p>
                    <i class="fas fa-phone-alt"></i> Let's Talk <br />
                    <span> 0099887766</span>
                </p>

                <p>
                    <i class=" far fa-envelope"></i> General Support <br />
                    <span>andreea@Playinggame.co.in</span>
                </p>
            </div>

            <div class="contact-child child2">
                <div class="inside-contact">
                    <h2>Contact Us</h2>
                    <h3>
                        <span id="confirm">
                    </h3>

                    <form action="{{url('contact_form_submission')}}" method="post">
                        @csrf()
                        <p>Name *</p>
                        <input id="txt_name" name="name" type="text" Required="required">

                        <p>Email *</p>
                        <input id="txt_email" name="email" type="text" Required="required">

                        <p>Phone *</p>
                        <input id="txt_phone" name="phone" type="text" Required="required">

                        <p>Subject *</p>
                        <input id="txt_subject" name="subject" type="text" Required="required">

                        <p>Message *</p>
                        <textarea id="txt_message" name="message" rows="4" cols="20" Required="required"></textarea>

                        <input type="submit" name="contactus" class="btn-dark" id="btn_send" value="SEND">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset(url('JavaScript/login.js'))}}"></script>
<script src="{{asset(url('JavaScript/Home.js'))}}"></script>

@endsection

@section('footer')

@parent

@endsection