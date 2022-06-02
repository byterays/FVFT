require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
export const EventBus = new Vue();

const app = new Vue({
    el: '#app',
});
