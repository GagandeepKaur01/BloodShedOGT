// // checking javascript function is that email contain gmail or not
// function gmail(email) {

//     if (email.endsWith('@gmail.com') == true || email.endsWith('@yahoo.com') == true) {
//         return 'true';
//     } else {
//         return 'false';
//     }
// }

// // Jquery
// $(function () {
//     $('#error_msg').hide();
//     $('#login_button').click(function () {
//         let login_email = $('#login_email').val();
//         let login_password = $('#login_password').val();
//         console.log('js hit login');
//         if (login_email != '' && login_password != '') {
//             console.log('enter login section');
//             console.log(login_email);

//             $.ajax({
//                 url: "",
//                 method: "POST",
//                 data: {
//                     login_email: login_email,
//                     login_password: login_password
//                 },
//                 success: (data) => {
//                     console.log(data);
//                     data = $.trim(data);
//                     if (data == 'No') {
//                         $('#error_msg').show();
//                         $('#error_msg').html('Your Email or Password credential is not matched');
//                     } else {
//                         if (data == 'organizer') {
//                             window.location.href = "http://localhost/bloodshed_core/organizer/Organizer_Dashboard.php";
//                         } else if (data == 'admin') {
//                             window.location.href = "http://localhost/bloodshed_core/Admin/";
//                         } else {
//                             window.location.href = "http://localhost/bloodshed_core/user_module/userprofile.php";
//                         }
//                     }
//                 }
//             });
//         }
//     });

//     var username_state = true;
//     var email_state = true;
//     // $('#username').on('keyup', function () {
//     //     var username = $('#username').val();
//     //     if (username == '') {
//     //         username_state = false;
//     //         return;
//     //     }
//     //     $.ajax({
//     //         url: 'http://localhost/bloodshed_core/registration.php',
//     //         type: 'post',
//     //         data: {
//     //             'username_check': 1,
//     //             'username': username,
//     //         },
//     //         success: function (response) {
//     //             if (response == 'taken') {
//     //                 console.log(response);
//     //                 username_state = false;
//     //                 $('#username').removeClass('is-valid');
//     //                 $('#username').addClass("is-invalid");
//     //             } else if (response == 'not_taken') {
//     //                 console.log(response);
//     //                 username_state = true;
//     //                 $('#username').removeClass('is-invalid');
//     //                 $('#username').addClass("is-valid");
//     //             }
//     //         }
//     //     });
//     // });
//     // $('#email').on('keyup', function () {
//     //     var email = $('#email').val();
//     //     if (email == '') {
//     //         email_state = false;
//     //         return;
//     //     }
//     //     $.ajax({
//     //         url: 'http://localhost/bloodshed_core/registration.php',
//     //         type: 'post',
//     //         data: {
//     //             'email_check': 1,
//     //             'email': email,
//     //         },
//     //         success: function (response) {
//     //             if (response == 'taken') {
//     //                 email_state = false;
//     //                 $('#email').removeClass('is-valid');
//     //                 $('#email').addClass("is-invalid");
//     //             } else if (response == 'not_taken') {
//     //                 let response = gmail(email);

//     //                 if (response == 'true') {
//     //                     console.log('contain @gmail.com');
//     //                     email_state = true;
//     //                     $('#email').removeClass('is-invalid');
//     //                     $('#email').addClass("is-valid");
//     //                 } else {
//     //                     email_state = false;
//     //                     $('#email').removeClass('is-valid');
//     //                     $('#email').addClass("is-invalid");
//     //                 }
//     //             }
//     //         }
//     //     });
//     // });

//     $('#registeration').on('click', function () {
//         var username = $('#username').val();
//         var email = $('#email').val();
//         var password = $('#password').val();
//         var role = $('#role').val();
//         if (username_state == false || email_state == false) {
//             alert('Fix the errors in the form first');
//         } else {
//             // proceed with form submission
//             $.ajax({
//                 url: '{{url("registration")}}',
//                 type: 'post',
//                 data: {
//                     'save': 1,
//                     'email': email,
//                     'username': username,
//                     'password': password,
//                     'role': role
//                 },
//                 success: function (response) {
//                     if (response == 'Saved') {
//                         alert('user saved');
//                         $('#username').val('');
//                         $('#email').val('');
//                         $('#password').val('');
//                     } else {
//                         alert('Something Wrong');
//                     }
//                 }
//             });
//         }
//     });
// });