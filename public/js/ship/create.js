$('#btn').on('click', function(){
   let name = $('#name');
   let serial = $('#serial');
   let image = $('#image');
   let file = image.prop('files')[0];
   let crews = $('#crews');

   let errors = [];

   checkForInputErrors(reShipName, name, errors, nameWarning);
   checkForInputErrors(reSerial, serial, errors, serialWarning);
   validatePicture(image, errors);
   checkIfMultipleListIsNotSelected(crews,errors,listWarning);

   if(errors.length > 0){
       printErrors(errors);
   }
   else{
       const data = new FormData;
       data.append('name', name.val());
       data.append('serial', serial.val());
       data.append('image', file);
       data.append('crews', crews.val());

       sendCSRFToken();

       $.ajax({
           url: '/ships',
           method: 'POST',
           data: data,
           cache: false,
           processData: false,
           contentType: false,
           success:function (){
               $.notify('User successfully added',{
                   className : 'success',
                   position:'top right'
               });
           },
           error: function (xhr){
                 switch (xhr.status)
                 {
                     case 422:
                         $('.errors').html('Ship with serial number ' + serial.val() + ' already exists');
                         break;
                     default:
                         $('.errors').html('There is problem with server, try later');
                 }
           }
       });
   }
});
