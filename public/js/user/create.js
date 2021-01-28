
$('#role').on('change', function (){
    if($('#role').val() == 2){
        $('.ranks').css('display','block');
    }
    else{
        $('.ranks').css('display','none');
    }
});

$('#btn').on('click', function(){
    let name = $('#name');
    let surname = $('#surname');
    let email = $('#email');
    let password = $('#password');
    let errors = [];
    let roles = $('#role');
    let ranks = $('#rank');

    checkForInputErrors(reNameSurname, name,errors,nameWarning);

    checkForInputErrors(reNameSurname,surname,errors, surnameWarning);

    checkForInputErrors(reEmail, email, errors, emailWarning);

    checkForInputErrors(rePassword, password, errors, passwordWarning);

    checkIfDropDownListIsNotSelected(roles,errors,listWarning);

    if(roles.val() == 2){
        checkIfMultipleListIsNotSelected(ranks,errors,listWarning);
    }

    if(errors.length > 0){
        printErrors(errors);
    }

    else{
        sendCSRFToken();
        if(roles.val() == 2){
            $.ajax({
                url: '/users',
                method: 'POST',
                data:{
                    name: name.val(),
                    surname: surname.val(),
                    email: email.val(),
                    password: password.val(),
                    role_id: roles.val(),
                    rank_id: ranks.val()
                },
                success:function(response){
                    $.notify('User successfully added',{
                        className : 'success',
                        position:'bottom right'
                    });
                    console.log(response.data);
                },
                error:function(){
                    $.notify('User was not successfully added',{
                        className : 'error',
                        position:'bottom right'
                    })
                }
            })
        }
        else{
            $.ajax({
                url: '/users',
                method: 'POST',
                data:{
                    name: name.val(),
                    surname: surname.val(),
                    email: email.val(),
                    password: password.val(),
                    role: roles.val()
                },
                success:function(response){
                    $.notify('User successfully added',{
                        className : 'success',
                        position:'bottom right'
                    });
                },
                error:function(){
                    $.notify('User was not successfully added',{
                        className : 'error',
                        position:'bottom right'
                    });
                }
            })
        }
    }


});
