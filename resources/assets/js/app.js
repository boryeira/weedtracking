
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
  Vue.component('growlogday', require('./components/Growlogs/growlogday.vue'));
  Vue.component('growlog', require('./components/Growlogs/growlog.vue'));
  Vue.component('InfiniteLoading', require('vue-infinite-loading'));

  Vue.prototype.$http = axios;

  import BootstrapVue from 'bootstrap-vue';
  import 'bootstrap/dist/css/bootstrap.css';
  import 'bootstrap-vue/dist/bootstrap-vue.css';

  Vue.use(BootstrapVue);


var app = new Vue({
    el: '#app',
    data () {
      return {
        message: 'Hello World!',
        info: null,
        info2: null,
        events: null,
        // eventSources: [
        //   {
        //     events: this.eventotest
        //   },
        //   {
        //     events: function(start, end, timezone, callback) {
        //       axios
        //         .get('http://weedtracking.test/api/growlogs/1/days/')
        //         .then(response => {
        //                 var events = [];
        //                 var array = response.data.data;
        //
        //
        //                 array.forEach(function(u) {
        //                 //  console.log(u.id);
        //                   events.push({
        //                      title: u.id,
        //                      start: u.start, // will be parsed
        //                    });
        //
        //                 });
        //                 console.log(JSON.stringify(events));
        //                 callback(JSON.stringify(events));
        //               })
        //       }
        //
        //     },
        // ],
      }
    },

  	methods: {
  		clickedButton: function() {

  		},
      // fetchData() {
      //   this.events =  axios
      //           .get('http://weedtracking.test/api/growlogs/1/days/')
      //           .then(response => {
      //                   var events = [];
      //                   var array = response.data.data;
      //
      //
      //                   array.forEach(function(u) {
      //                   //  console.log(u.id);
      //                     events.push({
      //                        title: u.id,
      //                        start: u.start, // will be parsed
      //                      });
      //
      //                   });
      //                   console.log(JSON.stringify(events));
      //                   this.events = JSON.stringify(events);
      //                   r
      //                 })
      // }

  	}

});
