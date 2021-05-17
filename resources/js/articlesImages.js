$(function(){

    if($("#drophere").length > 0){

        let csrfToken = $('meta[name="csrf-Token"]').attr('content');
        let uniqueSecret = $('input[name="uniqueSecret"]').attr('value');

        let myDropzone = new Dropzone('#drophere', {
            url: '/articles/images/upload',

            params: {
                _token: csrfToken,
                uniqueSecret: uniqueSecret
            }

        });
    }

})