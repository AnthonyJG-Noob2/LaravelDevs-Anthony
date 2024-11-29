import Dropzone from "dropzone";


Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage : "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxfiles: 1,
    uploadMultiple: false,

});


dropzone.on("success", function (file, response){
    console.log(response[1]);
    document.querySelector('[name="imagen"]').value = response[1];
})


dropzone.on('removedfile', function (){
    document.querySelector('[name="imagen"]').value = "";
})