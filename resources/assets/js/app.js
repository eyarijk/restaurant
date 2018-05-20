
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-resource'));
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

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

//Rotate fix
/*$("input").each(function() {
    var $this = $(this),
        child = $this.children(":first");
    $this.css("minHeight", function() {
        return child[0].getBoundingClientRect()
    });
});*/

const app = new Vue({
    el: '#app',
    data:{
        table_id: null,
        place_id: document.getElementById('placeID') ? document.getElementById('placeID').value : null,
        activeStep: 0,
        person_size: 4,
        products: [],
        time: '21:00:00',
        date: '2018-05-19',
        order: {},
        customer: {
            customer: {
                first_name: 'Undefined',
                last_name: 'Undefined',
                phone: null
            }
        }

    },
    methods: {
        openPicker: function () {
            picker.open();
        },
        formatDate: function () {
            return this.date + ' '+ this.time;
        },
        setStep: function (step) {
            this.activeStep = step;
        },
        checkStep: function (step) {
            if (this.activeStep == step)
                return true;
            return false;
        },
        formatQuery: function () {
           return '?time=' + this.formatDate() + '&person_size=' + this.person_size;
        },
        getPersons: function () {
          return this.person_size + ' ПЕРСОНИ';
        },
        getTable: function () {
            this.$http.get('/api/places/list').then(function(response){
               console.log(response);
            }, function(error){
                console.log(error);
            });
        },
        formatData: function () {
           this.order = {
               order: {
                   table_id: this.table_id,
                   customer_id: 2,
                   note: 'This is test note for table reservation order',
                   total_price: 0,
                   payment: 'PB',
                   is_finished: 0,
                   time: this.formatDate(),
                   place_id: 5
               }
           };
        },
        nextStep: function () {
           this.activeStep = this.activeStep + 1;
        },
        saveCustomer: function () {
            this.$http.post('/api/create/customer', this.customer).then(function(response) {
                console.log(response)
            }, function (error) {
                console.log(error);
            });
        },
        saveOrder: function () {
           this.saveCustomer();
           this.formatData();
           console.log(this.order);
            this.$http.post('/api/reservation', this.order).then(function(response) {
                console.log(response)
            }, function (error) {
                console.log(error);
            });
        },
        checkTable: function () {
            this.$http.get('/api/table/' + this.table_id + this.formatQuery()).then(function(response){
                if (response.data == true)
                   this.saveOrder();
                else
                    alert('Вибачте стіл вже зайнятий!');
            }, function(error){
                console.log(error);
            });

        }
    }
});
