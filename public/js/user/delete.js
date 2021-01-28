$('.delete').click(function (){
   let user = $(this).data('id');
   bootbox.dialog({
      title: 'Delete user',
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
                      url: '/users/' + user,
                      method: 'DELETE',
                      success:function(){
                          location.reload();
                      },
                      error:function (){
                          $.notify('User was not successfully deleted',{
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
