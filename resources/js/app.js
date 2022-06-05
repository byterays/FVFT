require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('applicants', require('./components/Applicants.vue').default);
export const EventBus = new Vue();

Vue.mixin({
    methods: {
        getYearForm: function(year){
            return year > 1 ? 'years' : 'year';
        },
        getMonthForm: function(month){
            return month > 1 ? 'months' : 'month';
        },
    }
})
const app = new Vue({
    el: '#app',
});
