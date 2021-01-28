$('.delete').click(function (){
   let notification = $(this).data('id');
   bootbox.dialog({
      title: 'Delete notification',
      message: 'Are you sure?',
      buttons: {
          cancel:{
              className: 'btn-secondary',
              label: 'Cancel'
          },
          ok:{
              className: 'btn-danger',
              label: 'Delete',
              callback: function(){
                  sendCSRFToken();
                  $.ajax({
                      url: '/notifications/' + notification,
                      method: 'DELETE',
                      success:function(){
                          // location.reload();
                      },
                      error:function (){
                          $.notify('Notification was not successfully deleted',{
                              className : 'error',
                              position:'bottom right'
                          });
                      }
                  });
              }
          }
      }
   });
});
