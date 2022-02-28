

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