$(function() { 

    $("#login_form").submit(function(e){
        e.preventDefault();
       
        if (!event.target.checkValidity()) {
            return false;
        }

        login();
    })

    $("#m_form").submit(function(e){
        e.preventDefault();
        if (!event.target.checkValidity()) {
            return false;
        }
        submit();
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
                window.location.href = site_url + 'manage';
            else{
                alert("wrong info");
            }
    })
}

function submit(){

    $("#reset_password").html("Please wait...");
    $("#reset_password").attr("disabled", true);
    var url = site_url + 'login/reset_password';
    $.post(url, 
        {
            admin_id: $("#m_email").val()
        }, function(resp){
            $("#reset_password").html("Update");
            $("#reset_password").removeAttr("disabled");
            if(resp == 'yes'){
                alert('Please check your email address');
            }
            else{
                alert("You do not Admin");
            }
            $("#requestModal").modal('toggle');
    })
}