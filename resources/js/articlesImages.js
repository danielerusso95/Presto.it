$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(function () {
    if ($("#drophere").length > 0) {
        let csrfToken = $('input[name="_token"]').attr("value");
        let uniqueSecret = $('input[name="uniqueSecret"]').attr("value");

        let myDropzone = new Dropzone("#drophere", {
            url: "/articoli/caricamento/immagini",
            params: {
                _token: csrfToken,
                uniqueSecret: uniqueSecret,
            },
            addRemoveLinks: true,
        });
    }
});
