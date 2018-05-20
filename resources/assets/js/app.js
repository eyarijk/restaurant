
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
const picker = new MaterialDateTimePicker()
    .on('submit', (val) => console.log(`data: ${val}`))
    .on('open', () => console.log('opened'))
    .on('close', () => console.log('closed'));

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data: function () {
        return {
            table_id: 1,
            activeStep: 1,
            person_size: 4,
            phone: null,
            products: [],
            time: '21:00:00',
            date: '2018-05-19',
            order: {},
        }
    },
    methods: {
        openPicker: function () {
            picker.open();
        },
        formatDate: function () {
            return this.date + ' '+ this.time;
        },
        checkStep: function (step) {
            this.activeStep === step;
        },
        formatQuery: function () {
           return '?time=' + this.formatDate() + '&person_size=' + this.person_size;
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
        saveOrder: function () {
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
