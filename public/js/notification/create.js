$('#btn').on('click', function(){
    let content = $('#content');
    let ranks = $("#rank");

    let errors = [];

    checkForInputErrors(reShipName, content, errors, nameWarning);
    checkIfMultipleListIsNotSelected(ranks, errors, listWarning);

    if(errors.length > 0){
        printErrors(errors);
    }
    else{
        sendCSRFToken();
        $.ajax({
            url : '/notifications',
            method: 'POST',
            data:{
                content: content.val(),
                ranks: ranks.val()
            },
            success:function(){
                $.notify('Notification successfully added',{
                    className : 'success',
                    position:'bottom right'
                });
            },
            error:function(){
                $.notify('Notification was not successfully added',{
                    className : 'error',
                    position:'bottom right'
                });
            }
        });
    }
});
