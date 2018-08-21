<template>
  <div>
    {{growlog}}
    <div v-for="day in days">
      <div class="image" v-for="img in day.images.links">
        {{img.url}}
      </div>
      <br />
      Line:
      {{day.title}}
      start
      {{day.start}}
      <br />
      <br />
      <br />
      <br />
      <br />


    </div>
    <infinite-loading @distance="1" @infinite="infiniteHandler"></infinite-loading>
  </div>
</template>

<script>
import InfiniteLoading from 'vue-infinite-loading';
Vue.prototype.$http = axios;

export default {
  mounted() {
      console.log('montado el componente')
  },
  data() {
    return {
      days: [],
      page: 1,
    };
  },
  props: {
    growlog: Number,

  },
  methods: {
    infiniteHandler($state) {
      setTimeout(() => {
        let vm = this;
        const temp = [];
        const days = [];
        axios.get('/api/growlogs/'+this.growlog+'/days?page='+this.page)
             .then(response => {
               console.log('entre');
               console.log('pagina:'+this.page);
                   // var events = [];
                    var data = response.data.data;
                    var pagination = response.data.meta.pagination;

                    this.days = this.days.concat(response.data.data);

                     // data.forEach(function(u) {
                     //   console.log(u.id);
                     //   vm.days.push({
                     //      title: u.id,
                     //      start: u.start, // will be parsed
                     //    });
                     // });
                     $state.loaded();
              });
              this.page = this.page + 1;
              console.log('fin pagina:'+this.page);
      }, 1000);
    },
  },
  components: {
    InfiniteLoading,
  },
};
</script>
