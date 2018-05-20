
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.MaterialDatetimePicker = require('material-datetime-picker');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import MaterialDateTimePicker from 'material-datetime-picker';

let date = null;
let time = null;
let formattedDateTime = null;

const picker = new MaterialDateTimePicker()
    .on('submit', (val) => {
        date = val.format('YYYY-MM-DD');
        time = val.format('hh:mm');
        formattedDateTime = date+' '+time+':00';
        console.log(`date: ${date} time: ${time} formatted: ${formattedDateTime}`);
    })
    .on('open', () => console.log('opened'))
    .on('close', () => console.log('closed'));

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    methods: {
        openPicker: function () {
            picker.open();
        }
    }
});
