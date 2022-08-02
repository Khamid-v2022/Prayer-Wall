$(function() { 

    $("#login_form").submit(function(e){
        e.preventDefault();
       
        if (!event.target.checkValidity()) {
            return false;
        }

        login();
    })

});

function login(){
    var url = site_url + 'login/login';

    $.post(url, 
        {
            admin_id: $("#admin_id").val(),
            password: $("#password").val()
        }, function(resp){
            if(resp == 'yes')
                window.location.href = site_url + 'admin';
            else{
                alert("wrong info");
            }
    })
}

