$('#btn').on('click', function(){
    let content = $('#content');
    let ranks = $("#rank");
    let notification = $('#id').val();

    let errors = [];

    checkForInputErrors(reShipName, content, errors, nameWarning);
    checkIfMultipleListIsNotSelected(ranks, errors, listWarning);

    if(errors.length > 0){
        printErrors(errors);
    }
    else{
        sendCSRFToken();
        $.ajax({
            url : '/notifications/' + notification,
            method: 'POST',
            data:{
                content: content.val(),
                ranks: ranks.val(),
                _method: 'PUT'
            },
            success:function(){
                $.notify('Notification successfully altered',{
                    className : 'success',
                    position:'bottom right'
                });
            },
            error:function(){
                $.notify('Notification was not successfully altered',{
                    className : 'error',
                    position:'bottom right'
                });
            }
        });
    }
});
