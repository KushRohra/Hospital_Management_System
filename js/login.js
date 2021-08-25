function login() {
    if($('#username').val() == '') {
        $('#username').parent('td').addClass('has-error');
        return false;
    }
    if($('#password').val() == '') {
        $('#password').parent('td').addClass('has-error');
        return false;
    }
    if($('#utype').val() == '') {
        $('#utype').parent('td').addClass('has-error');
        return false;
    }

    var data = $('#form_login').serialize();
    $.ajax({
        type: 'POST',
        url: 'php/login/validate_login.php',
        data: data,
        success: function(response) {
            if (response == 1) {
                window.location.replace('index.php');
            } else if (response == 3) {
                $('#err').hide().html("Username or Password or Role incorrect. Please Check").fadeIn('slow');
            }
        }
    })
}

function resetForm() {
    $("#username").val("");
    $("#password").val("");
    $("#utype").val("");
}
