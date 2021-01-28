$("#btn").on('click', function(){
    let email = $('#email');
    let password = $('#password');
    let errors = [];

    checkForInputErrors(reEmail,email,errors, emailWarning);
    checkForInputErrors(rePassword, password, errors, passwordWarning);

    printErrors(errors);

    if(errors.length === 0){
        sendCSRFToken();
        $.ajax({
            url: '/login',
            method: 'POST',
            data:{
                email: email.val(),
                password: password.val()
            },
            success: function (data){
                window.location.href = '/index';
            },
            error: function (xhr){
                if(xhr.status === 404){
                    $('.errors').html('Wrong email and password combination');
                }
            }
        })
    }
});
