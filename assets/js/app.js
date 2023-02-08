$(function() { 

    var key = "7967cf9c7b724f988614a8e4dad3ba1b";
    var url = "https://ipgeolocation.abstractapi.com/v1/?api_key=" + key;
    
    $.getJSON(url, function(data) {
        $("#ip_address").val(data.ip_address);
    });
    

    $("#pray_form").submit(function(e){
        e.preventDefault();
        $(".dpm-response").addClass('d-none');
        $(".dpm-response .alert").addClass('d-none');
        if (!event.target.checkValidity()) {
            return false;
        }
        submit();
    })

    $("#m_pray_form").submit(function(e){
        e.preventDefault();
        $(".dpm-response").addClass('d-none');
        $(".dpm-response .alert").addClass('d-none');
        if (!event.target.checkValidity()) {
            return false;
        }

        submit_modal_form();
    })

    $("#michael_pray_form").submit(function(e){
        e.preventDefault();
        $(".dpm-response").addClass('d-none');
        $(".dpm-response .alert").addClass('d-none');
        if (!event.target.checkValidity()) {
            return false;
        }
        submit_michael_form();
    })
    
    $(".card_main").on('click', function(){
        var _url = site_url + "oraclecard/random_article";
        location.href = _url;
    })

    $(".btn-read").on('click', function(){
        var _url = site_url + "OurLordMessage/random_article";
        location.href = _url;
    })

    $(".hear-your-angel-btn").on('click', function(){
        var _url = site_url + "HearYourAngel/random_article";
        location.href = _url;
    })

    $(".angel-number-btn").on('click', function(){
        var _url = site_url + "AngelNumber/random_article";
        location.href = _url;
    })

    $(".quiz-btn").on('click', function(){
        var quiz_topic = $(this).attr("data-topic");
        var _url = site_url + "YourAreaPrayer/random_article/" + quiz_topic;
        location.href = _url;
    })

    $(".archangel-post-btn").on('click', function(){
        var _url = site_url + "MotherMaryMessage/random_article_angel_message";
        location.href = _url;
    })

    $(".horoscope-btn").on('click', function(){
        var selected_horoscope = $(this).attr("data-name");
        location.href = site_url + "DailyHoroscope/horoscope/" + selected_horoscope + "/today";
    })

    $(".horoscope-select-date").on('click', function(){
        var selected_horoscope = $("#sel_horo").val();
        var selected_date = $(this).attr("data-date");
        location.href = site_url + "DailyHoroscope/horoscope/" + selected_horoscope + "/" + selected_date;
    })


    $(".chakra-item-img-wrapper").on("click", function(){
        const category_name = $(this).attr("data-category_name");
        location.href = site_url + "ChakraAffirmations/random_article/" + category_name;
    })

    $(".chakra-stone-item").on("click", function(){
        const category_name = $(this).parents(".chakra-stone-list-item").attr("data-stone_category");
        location.href = site_url + "ChakraStone/random_article/" + category_name;
    })
});

function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0]=parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

function submit(){
    $(".request-form").addClass('d-none');
    $(".loader").removeClass('d-none');

    $(".dpm-response").removeClass('d-none');

    // var email_verify_url = "https://disposable.debounce.io/?email=" + $("#email").val();
    var email_verify_url = site_url + "welcome/verify_email";
    
    $(".alert-info").removeClass('d-none');
    $.post(email_verify_url, {
        email: $("#email").val()
    }, function(resp){ 
        console.log(resp);
        if(resp == "Valid"){ 
            $(".dpm-response .alert").addClass('d-none');
            $(".dpm-response .alert-success").removeClass('d-none');

            let current_url = window.location;
            let params = (new URL(current_url)).searchParams;
            let tid = params.get('tid');
            
            var url = site_url + 'welcome/submit_pray';
            
            $.post(url, {
                    ip_address: $("#ip_address").val(),
                    email: $("#email").val(),
                    first_name: $("#first_name").val(),
                    note: $("#note").val(),
                    is_publish: $('#display').prop('checked')?"yes":"no",
                    tag: tid
                }, 
                function(resp){
                    // $(".loader").addClass('d-none');
                    // $(".request-form").removeClass('d-none');
                    // if(resp == 'ok'){
                        // window.location.href = "https://angelgraceblessing.com/prayer-thank-you/";
                    // }
                    // else{
                    //     $(".request-form").removeClass('d-none');
                    //     // $('.alert-danger').html("");
                    //     // $(".dpm-response").removeClass('d-none');
                    // }
            })
            window.location.href = "https://angelgraceblessing.com/prayer-thank-you/";
        } else {
            $(".loader").addClass('d-none');
            $(".request-form").removeClass('d-none');
            
            $(".dpm-response .alert").addClass('d-none');
            $(".dpm-response .alert-danger").removeClass('d-none');
        }
    })   
}


function submit_modal_form(){
    $(".request-form").addClass('d-none');
    $(".loader").removeClass('d-none');
    $(".dpm-response").removeClass('d-none');
 
    // var email_verify_url = "https://disposable.debounce.io/?email=" + $("#m_email").val();
    var email_verify_url = site_url + "welcome/verify_email";

    $.post(email_verify_url, {
        email: $("#m_email").val()
    }, function(resp){ 
        if(resp== "Valid"){ 
            $(".dpm-response .alert").addClass('d-none');
            $(".dpm-response .alert-success").removeClass('d-none');

            let current_url = window.location;
            let params = (new URL(current_url)).searchParams;
            let tid = params.get('tid');

            var url = site_url + 'welcome/submit_pray';
            
            $.post(url, {
                    ip_address: $("#ip_address").val(),
                    email: $("#m_email").val(),
                    first_name: $("#m_first_name").val(),
                    note: $("#m_note").val(),
                    is_publish: $('#m_display').prop('checked')?"yes":"no",
                    tag: tid
                }, 
                function(resp){
                    // $(".loader").addClass('d-none');
                    // $(".request-form").removeClass('d-none');
                    // if(resp == 'ok'){
                    //     window.location.href = "https://angelgraceblessing.com/prayer-thank-you/";
                    // }
                    // else{
                    //     // $('.alert-danger').html("");
                    //     // $(".dpm-response").removeClass('d-none');
                    // }
            })
            window.location.href = "https://angelgraceblessing.com/prayer-thank-you/";
        } else {
            $(".loader").addClass('d-none');
            $(".request-form").removeClass('d-none');
            
            $(".dpm-response .alert").addClass('d-none');
            $(".dpm-response .alert-danger").removeClass('d-none');
        }
    })
}

function submit_michael_form(){
    $("#michael_pray_form").addClass('d-none');
    $(".loader").removeClass('d-none');

    $(".dpm-response").removeClass('d-none');

    var email_verify_url = site_url + "hanielPrayer/verify_email";
    
    $(".alert-info").removeClass('d-none');
    $.post(email_verify_url, {
        email: $("#email").val()
    }, function(resp){ 
        if(resp == "Valid"){ 
            $(".dpm-response .alert").addClass('d-none');
            $(".dpm-response .alert-success").removeClass('d-none');

            let current_url = window.location;
            let params = (new URL(current_url)).searchParams;
            let tid = params.get('tid');
            
            var url = site_url + 'hanielPrayer/submit_pray';
            
            $.post(url, {
                    ip_address: $("#ip_address").val(),
                    email: $("#email").val(),
                    first_name: $("#first_name").val(),
                    tag: tid
                }, 
                function(resp){
            })
            window.location.href = "https://angelgraceblessing.com/thank-you-prayer/";
        } else {
            $(".loader").addClass('d-none');
            $("#michael_pray_form").removeClass('d-none');
            $(".dpm-response .alert").addClass('d-none');
            $(".dpm-response .alert-danger").removeClass('d-none');
        }
    })   
}