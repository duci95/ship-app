$(document).ready(function (){
    toggleCrewList();
});

$('#role').on('change', function (){
    toggleCrewList();
    $('.ranks').css('marginLeft', '100px');
});

$('#btn').on('click', function() {
    let name = $('#name');
    let surname = $('#surname');
    let email = $('#email');
    let password = $('#password');
    let errors = [];
    let roles = $('#role');
    let ranks = $('#rank');

    let user = $('#id').val();

    checkForInputErrors(reNameSurname, name, errors, nameWarning);

    checkForInputErrors(reNameSurname, surname, errors, surnameWarning);

    checkForInputErrors(reEmail, email, errors, emailWarning);

    checkIfDropDownListIsNotSelected(roles, errors, listWarning);

    if (roles.val() == 2) {
        checkIfMultipleListIsNotSelected(ranks, errors, listWarning);
    }

    if(password.val() !== '') {
        checkForInputErrors(rePassword, password, errors, passwordWarning);
    }

    if (errors.length > 0) {
        printErrors(errors);
    }
    else {
        sendCSRFToken();

        let data = {};
        data.name = name.val();
        data.surname = surname.val();
        data.email = email.val();

        if(password.val() !== ''){
            data.password = password.val();
        }

        if(roles.val() == 2){
            data.ranks = ranks.val();
        }
        data.role = roles.val();
        data._method = 'PUT';

        $.ajax({
            url: '/users/' + user,
            method: 'POST',
            data: data,
            success: function () {
                $.notify('User successfully altered', {
                    className: 'success',
                    position: 'bottom right'
                });
            },
            error: function () {
                $.notify('User was not successfully altered', {
                    className: 'error',
                    position: 'bottom right'
                });
            }
        });
    }
});
