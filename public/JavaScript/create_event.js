window.onresize = function () {
    console.log('hit');
    if (window.innerWidth > 450 && window.innerWidth < 991) {
        console.log(window.innerWidth);
        document.getElementById('navbarSupportedContent').style.marginTop = "30px !important";
    }
}


// Tabs Information
$(document).ready(function () {
    // Tab 2 Headings -> Game -> type -> 
    var game_name, game_type;

    // Counting team input tag, appear when orgnaizer select duo or squad only
    $('#team_number').hide();

    pubg_hide();
    cod_hide();
    ff_hide();
    fortnite_hide();


    // hide and show function for logo and banner
    function pubg_hide() {
        $('#pubg_radio_image_logo').hide();
        $('#pubg_radio_image').hide();
        $('#pubg_map').hide();
    }

    function cod_hide() {
        $('#cod_radio_image_logo').hide();
        $('#cod_radio_image').hide();
        $('#cod_map').hide();

    }

    function ff_hide() {
        $('#ff_radio_image_logo').hide();
        $('#ff_radio_image').hide();
        $('#ff_map').hide();
    }

    function fortnite_hide() {
        $('#fortnite_radio_image_logo').hide();
        $('#fortnite_radio_image').hide();
        $('#fortnite_map').hide();
    }

    function pubg_show() {
        $('#pubg_radio_image_logo').show();
        $('#pubg_radio_image').show();
        $('#pubg_map').show();
    }

    function cod_show() {
        $('#cod_radio_image_logo').show();
        $('#cod_radio_image').show();
        $('#cod_map').show();
    }

    function ff_show() {
        $('#ff_radio_image_logo').show();
        $('#ff_radio_image').show();
        $('#ff_map').show();
    }

    function fortnite_show() {
        $('#fortnite_radio_image_logo').show();
        $('#fortnite_radio_image').show();
        $('#fortnite_map').show();
    }

    // select value from select tag of name and type of the game and then print it on tab 2
    $('#select').change(function () {
        game_name = $(this).children("option:selected").val();
        console.log('select hit');
        if (game_name == 'pubg') {
            pubg_show();
            cod_hide();
            ff_hide();
            fortnite_hide();
        } else if (game_name == 'cod') {
            pubg_hide();
            cod_show();
            ff_hide();
            fortnite_hide();
        } else if (game_name == 'freefire') {
            pubg_hide();
            cod_hide();
            ff_show();
            fortnite_hide();
        } else if (game_name == 'fortnite') {
            pubg_hide();
            cod_hide();
            ff_hide();
            fortnite_show();
        }
    });

    $('#type').change(function () {
        game_type = $(this).children("option:selected").val();
    });

    $('#select').change(function () {
        $(this).children("option:selected")
    });


    $('#player_number').keyup(() => {
        if (game_type == 'duo') {
            let number_of_player = $('#player_number').val();
            let calc_team = number_of_player / 2;
            $('#team_number').attr('value', calc_team);

        } else if (game_type == 'squad') {
            let number_of_player = $('#player_number').val();
            let calc_team = number_of_player / 4;
            $('#team_number').attr('value', calc_team);
        }
    });

    $('#player_number').click(() => {
        if (game_type == 'duo') {
            let number_of_player = $('#player_number').val();
            let calc_team = number_of_player / 2;
            $('#team_number').attr('value', calc_team);
        } else if (game_type == 'squad') {
            let number_of_player = $('#player_number').val();
            let calc_team = number_of_player / 4;
            $('#team_number').attr('value', calc_team);
        }
    });

    $(".add_prize").click(function () {
        var lsthmtl = $(".prize_input_group");
        
        $(".prize_increment").after('<tr>' + lsthmtl + '</tr>');
    });
    $("body").on("click", ".prize_delete_btn", function () {
        alert($(this))
        $(this).parents(".prize_input_group").remove();
    });

    function romanize(num) {
        var lookup = {
            M: 1000,
            CM: 900,
            D: 500,
            CD: 400,
            C: 100,
            XC: 90,
            L: 50,
            XL: 40,
            X: 10,
            IX: 9,
            V: 5,
            IV: 4,
            I: 1
        },
            roman = '',
            i;
        for (i in lookup) {
            while (num >= lookup[i]) {
                roman += i;
                num -= lookup[i];
            }
        }
        return roman;
    }

    // First tab next button
    $('#tab1_button').click(function () {
        // print game name at top the the tab
        $('#game_name').html(game_name);

        //print type of the game on player number input tag
        if (game_type == 'solo') {
            $('#type_name').text('Solo Player Count');
        } else if (game_type == 'duo') {
            $('#type_name').text('Duo Player Count');
            $('#player_number').attr('step', '2');
            $('#team_number').show();
        } else {
            $('#type_name').text('Squad Player Count');
            $('#player_number').attr('step', '4');
            $('#team_number').show();
        }

        let submission = [];


        let select_tag_1 = $('#select');
        let plat_form = $('#platform');
        let game_type_select = $('#type');
        let name_select = $('#event_name');
        let price_select = $('#price');
        let prize_select = $('#prize');
        let date_select = $('#date');
        let time_select = $('#time');
        if (select_tag_1.val() === '') {
            alert("Please select a game for further proceed.");
            $('#select').focus();
        } else if (plat_form.val() === '') {
            alert("Please select a platform for further proceed.");
            $('#platform').focus();
        } else if (game_type_select.val() === '') {
            alert("Please select a game type for further proceed.");
            $('#type').focus();
        } else if (name_select.val() === '' || name_select.val().length <= 10) {
            alert("Please select a tournament name. [min 10 character]");
            $('#event_name').focus();
        } else if (price_select.val() === '') {
            alert("Please select a entry price.");
            $('#price').focus();
        } else if (prize_select.val() === '') {
            alert("Please select a prize");
            $('#prize').focus();
        } else if (date_select.val() === '') {
            alert("Please select a tournament date");
            $('#date').focus();
        } else if (time_select.val() === '') {
            alert("Please select a time for tournament");
            $('#time').focus();
        } else {
            $('#basic_tab').removeClass('active');
            $('#basic_tab').removeAttr('href data-toggle');
            $('#tab1').removeClass('active show');
            $('#tab1').removeClass('active_tab');
            $('#tab1').addClass('inactive_tab');
            $('#info_tab').addClass('active');
            $('#info_tab').attr('href', '#tab2');
            $('#info_tab').attr('data-toggle', 'tab');
            $('#tab1').removeClass('inactive_tab');
            $('#tab1').addClass('active_tab');
            $('#tab2').addClass('active show');
        }
    });

    // Second tab previous button
    $('#previous_btn_1').click(function () {
        $('#info_tab').removeClass('active');
        $('#info_tab').removeAttr('href data-toggle');
        $('#tab2').removeClass('active show');
        $('#basic_tab').addClass('active');
        $('#basic_tab').attr('href', '#tab1');
        $('#basic_tab').attr('data-toggle', 'tab');
        $('#tab1').addClass('active show');
    });

    // Second tab next button
    $('#tab2_button').click(function () {
        if ($('#region').val() === '') {
            alert("Please select a region for further proceed.");
            $('#region').focus();
        } else if ($('#format').val() === '') {
            alert("Please select a format for further proceed.");
            $('#format').focus();
        } else if ($("#player_number").val() === '' || $('#player_number').val().length > 100) {
            alert("Please select a player number for further proceed. [Max 100 Pax]");
            $('#player_number').focus();
        } else if ($("#contact_option").val() === '') {
            alert("Please select a contact option for further proceed.");

            $('#contact_option').focus();
        } else if ($("#contact").val() === '') {
            alert("Please select a conatct for further proceed.");

            $('#contact').focus();
        } else {

            let time_set = $('#time').val();
            $('#schedule_time_1').attr('value', time_set);


            $('#info_tab').removeClass('active');
            $('#info_tab').removeAttr('href data-toggle');
            $('#tab2').removeClass('active show');
            $('#setting_tab').addClass('active');
            $('#setting_tab').attr('href', '#tab3');
            $('#setting_tab').attr('data-toggle', 'tab');
            $('#tab3').addClass('active show');

            // print prize on prize section third tab
            let prize_value = $('#prize').val();
            $('#prize_value').html(prize_value);

        }
    });

    // Third tab previous button
    $('#previous_btn_2').click(function () {
        $('#setting_tab').removeClass('active');
        $('#setting_tab').removeAttr('href data-toggle');
        $('#tab3').removeClass('active show');
        $('#info_tab').addClass('active');
        $('#info_tab').attr('href', '#tab2');
        $('#info_tab').attr('data-toggle', 'tab');
        $('#tab2').addClass('active show');
    });

    $('#submit_data').click(function () {
        if ($('#place').val() === '') {
            $('#place').focus();
        } else if ($('#place_address').val() === '') {
            $('#place_address').focus();
        } else if ($('#city').val() === '') {
            $('#city').focus();
        } else if ($('#state').val() === '') {
            $('#state').focus();
        } else if ($('#pincode').val() === '') {
            $('#pincode').focus();
        } else if ($('#check-in').val() === '') {
            $('#check-in').focus();
        } else {
            $(document).css('cursor', 'progress');
            $('#create_tournament').submit();
        }
    });

});