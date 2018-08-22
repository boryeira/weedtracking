<template>
  <div>
    {{growlog}}
    <div v-for="day in days">
      <div class="row">
        <div class="col-3" v-for="img in day.images.links">
          <img width="100%" :src="img.url" />
        </div>
      </div>

      <br />
      Line:
      {{day.title}}
      start
      {{day.start}}



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
    //scroll infinito con paginacion de laravel
    infiniteHandler($state) {
      setTimeout(() => {
        let vm = this;
        const temp = [];
        const days = [];
        axios.get('/api/growlogs/'+this.growlog+'/days?page='+this.page)
             .then(response => {
                console.log('entre');
                console.log('pagina:'+this.page);

                var data = response.data.data;
                var pagination = response.data.meta.pagination;
                this.days = this.days.concat(response.data.data);
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
