
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
  Vue.component('growlog', require('./components/Growlogs/growlog.vue'));
  Vue.component('growlog-days', require('./components/Growlogs/growlog-days.vue'));
  Vue.component('InfiniteLoading', require('vue-infinite-loading'));
  Vue.component('days-list', require('./components/Growlogs/days-list.vue'));
  Vue.component('add-media', require('./components/Growlogs/add-media.vue'));


  Vue.prototype.$http = axios;

  import BootstrapVue from 'bootstrap-vue';
  import 'bootstrap/dist/css/bootstrap.css';
  import 'bootstrap-vue/dist/bootstrap-vue.css';

  // register the plugin on vue
  import Toasted from 'vue-toasted';

  Vue.use(Toasted)


  Vue.use(BootstrapVue);


var app = new Vue({
    el: '#app',
    data () {
      return {
        message: 'Hello World!',
        info: null,
        info2: null,
        uploadImage: '/',
      }
    },
    methods:{
        //receive uploaded files info
        //@type Array

    }

});
