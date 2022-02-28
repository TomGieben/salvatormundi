

require('./bootstrap');
require('./vanilla-tilt')
require('./main.js')

window.Vue = require('vue').default;

const app = new Vue({
    el: '#app',
});

$(document).ready(function(){
    $('.alert-message').fadeIn().delay(10000).fadeOut();
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

tinymce.init({
    selector: 'textarea.tinymce',
    height: 500,
    menubar: false,
    plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table paste code help wordcount'
    ],
    toolbar: 'undo redo | formatselect | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat | help',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});