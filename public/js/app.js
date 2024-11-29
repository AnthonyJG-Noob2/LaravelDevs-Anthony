import * as Dropzone from 'dropzone';
const Dropzone = require('dropzone');


Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage : "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxfiles: 1,
    uploadMultiple: false,

});

dropzone.on("sending", function (file, xrh, formData){
    console.log(file);
});