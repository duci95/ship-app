$('#btn').on('click', function(){
    let ship = $('#id');
    let name = $('#name');
    let serial = $('#serial');
    let image = $('#image');
    let crews = $('#crews');
    let old = $('#old').val();

    let errors = [];

    if(image.prop('files')[0] !== undefined){

        checkForInputErrors(reShipName, name, errors, nameWarning);
        checkForInputErrors(reSerial, serial, errors, serialWarning);
        checkIfMultipleListIsNotSelected(crews,errors,listWarning);
        validatePicture(image,errors);

        if(errors.length > 0){
            printErrors(errors);
        }
        else {
            const data = new FormData;
            data.append('name', name.val());
            data.append('serial', serial.val());
            data.append('picture', image.prop('files')[0]);
            data.append('old_image', old);
            data.append('crews', crews.val());
            data.append('_method','PUT');

            sendCSRFToken();

            $.ajax({
                url: '/ships/' + ship.val(),
                method: 'POST',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function () {
                    $.notify('Ship successfully altered', {
                        className: 'success',
                        position: 'top right'
                    });
                },
                error: function (xhr) {
                    switch (xhr.status) {
                        case 422:
                            $('.errors').html('Ship with serial number ' + serial.val() + ' already exists');
                            break;
                        default:
                            $('.errors').html('There is problem with server, try later');
                    }
                }
            });
        }
    }
    else{
        checkForInputErrors(reShipName, name, errors, nameWarning);
        checkForInputErrors(reSerial, serial, errors, serialWarning);
        checkIfMultipleListIsNotSelected(crews,errors,listWarning);

        if(errors.length > 0){
            printErrors(errors);
        }
        else {
            const data = new FormData;
            data.append('name', name.val());
            data.append('serial', serial.val());
            data.append('crews', crews.val());
            data.append('_method','PUT');

            sendCSRFToken();

            $.ajax({
                url: '/ships/' + ship.val(),
                method: 'POST',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function () {
                    $.notify('Ship successfully altered', {
                        className: 'success',
                        position: 'top right'
                    });
                },
                error: function (xhr) {
                    switch (xhr.status) {
                        case 422:
                            $('.errors').html('Ship with serial number ' + serial.val() + ' already exists');
                            break;
                        default:
                            $('.errors').html('There is problem with server, try later');
                    }
                }
            });
        }
    }
});
