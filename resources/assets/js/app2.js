
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');




window.Vue = require('vue');


import FullCalendar from 'vue-full-calendar';
Vue.use(FullCalendar);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
  Vue.component('example', require('./components/Growlogs/calendar.vue'));
  Vue.prototype.$http = axios;

  var eventotest = [
    {
        title  : 'event1',
        start  : '2018-08-01',
    },
    {
        title  : 'event2',
        start  : '2018-08-05',
        end    : '2018-08-07',
    },
    {
        title  : 'event3',
        start  : '2018-08-09',

    },
  ];



const app = new Vue({
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
    created () {
    // fetch the data when the view is created and the data is
    // already being observed
      this.fetchData()
    },

  	methods: {
  		clickedButton: function() {
        axios
          .get('http://weedtracking.test/api/growlogs/1/days/23')
          .then(response => (this.info = response.data.data))

  		},
      fetchData() {
        this.events =  axios
                .get('http://weedtracking.test/api/growlogs/1/days/')
                .then(response => {
                        var events = [];
                        var array = response.data.data;


                        array.forEach(function(u) {
                        //  console.log(u.id);
                          events.push({
                             title: u.id,
                             start: u.start, // will be parsed
                           });

                        });
                        console.log(JSON.stringify(events));
                        this.events = JSON.stringify(events);
                        
                      })
      }

  	}

});

console.log('vue');
