<template>

  <div>
    {{growlog}}

    <div v-for="day in days">
      <!-- if you don't want to use the buttons Flickity provides -->
      <div class="row">
        <div class="col-3" v-for="img in day.images.links">
          <img width="100%" :src="img.url" />
        </div>
      </div>

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
      slide: 0,
      sliding: null,
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
                var data = response.data.data;
                var pagination = response.data.meta.pagination;
                this.days = this.days.concat(response.data.data);
                $state.loaded();
              });
              this.page = this.page + 1;
      }, 1000);
    },

  },
  components: {
    InfiniteLoading,


  },
};
</script>
