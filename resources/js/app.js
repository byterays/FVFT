require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('applicants', require('./components/Applicants.vue').default);
export const EventBus = new Vue();

const app = new Vue({
    el: '#app',
});
