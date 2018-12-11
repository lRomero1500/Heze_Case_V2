
window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
require('jquery-validation');
require('jquery-confirm');
require('jquery-ui');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});