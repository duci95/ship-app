$('#btn').on('click', function(){
   let name = $('#name');

   let errors = [];

   checkForInputErrors(reShipName, name, errors, nameWarning);

   if(errors.length > 0){
       printErrors(errors);
   }
   else {
       sendCSRFToken();
       $.ajax({
           url: '/ranks',
           method: 'POST',
           data:{
               name: name.val()
           },
           success:function(){
               $.notify('Rank successfully added',{
                   className : 'success',
                   position:'bottom right'
               });
           },
           error:function(){
               $.notify('Rank was not successfully added',{
                   className : 'error',
                   position:'bottom right'
               });
           }
       })
   }
});
