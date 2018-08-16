
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
  Vue.component('example', require('./components/Growlogs/calendar.vue'));
  Vue.prototype.$http = axios;


const message = {}
const app = new Vue({
    el: '#app',
    data () {
      return {
        message: 'Hello World!',
        info: null,
      }
    },
    mounted () {
        axios
          .get('http://weedtracking.test/api/growlogs/1/days/24')
          .then(response => (this.info = response))
    },
  	methods: {
  		clickedButton: function() {
        this.message = 'hola';

  		},
  	}

});
