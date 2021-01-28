$('.delete').click(function (){
   let rank = $(this).data('id');
   bootbox.dialog({
      title: 'Delete rank',
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
                      url: '/ranks/' + rank,
                      method: 'DELETE',
                      success:function(){
                          location.reload();
                      },
                      error:function (){
                          $.notify('Rank was not successfully deleted',{
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
