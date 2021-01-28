function checkForInputErrors(regex, element, array, message){
    if(!regex.test(element.val().trim())) {
        array.push(message);
        element.addClass("border-danger");
    }
    else{
        element.removeClass("border-danger");
        $(".errors").empty();
    }
}
function printErrors(array) {
    if (array.length > 0) {
        let error = "";
        for (let item of array) {
            error += `<span class="h6 ">${item}</span> </br>`;
        }
        $(".errors").html(error);
    }
}
function sendCSRFToken(){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name='_token']").attr("content")
        },
        accept: "application/json"
    });
}
function checkIfDropDownListIsNotSelected(list, array, message){
    if(list.val() === '0' || list.val() === ''){
        array.push(message);
        list.addClass('border-danger')
    }
    else{
        list.removeClass('border-danger');
    }
}
function checkIfMultipleListIsNotSelected(list, array, message){
    if($('.multiple :selected').length === 0){
        array.push(message);
        list.addClass('border-danger');
    }
    else{
        list.removeClass('border-danger');
    }
}
function validatePicture(image, array){
    var file = null;
    if(image.val() === ""){
        array.push("Picture is not chosen");
        image.addClass('border-danger');
    }
    else{
        image.removeClass('border-danger');
        file = image.prop('files')[0];
        const fileName = file.name;
        const fileExtension = fileName.split(".").pop().toLowerCase();
        var validExtension = true;
        if(!jQuery.inArray(fileExtension))
        {
            let permittedExtensionsString = "";
            validExtension = false;
            $.each(permittedExtensions, function(index, value){
                permittedExtensionsString+= value + " ";
            });
            array.push("Permitted extensions are: <span class='text-uppercase'> " + permittedExtensionsString + "</span>");
        }
        if(file.size > 3000000  && validExtension === true ) {
            array.push("Picture can not be grater than 3 MB");
        }
    }
}
function toggleCrewList(){
    if($('#role').val() == 2){
        $('.ranks').css('display','block');
    }
    else{
        $('.ranks').css('display','none');
    }
}
