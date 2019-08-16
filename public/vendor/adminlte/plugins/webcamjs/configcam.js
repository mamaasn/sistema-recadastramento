Webcam.set({

    width: 490,

    height: 390,

    image_format: 'jpeg',

    jpeg_quality: 90

});

function abrirCamera() {
    $('#wrapper-cam').html("<div id='my_camera'></div>");
    $('#hidden-foto').html("<input type='hidden' id='foto' name='foto' class='image-tag'>");
    Webcam.reset();
    Webcam.attach('#my_camera');
}

function fecharCamera() {
    $('#foto').remove();
    $('#my_camera').remove();
    Webcam.reset();
}

function tirarFoto() {
    Webcam.snap(function (data_uri) {

        $(".image-tag").val(data_uri);

        document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';

    });
}