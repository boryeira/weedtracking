<template>

  <b-row>

    <b-col sm="12" md="6" lg="4"  v-for="growlog in growlogs" >
      <div class="card">
        <div class="rel">
            <img class="card-img-top" :src="growlog.images.links[0].url" alt="image">
        </div>
        <div class="card-body">
          <h4 class="card-title mb-2">
              <a class="text-primary" :href="growlog.links.growlog.href">{{growlog.links.growlog.name}}</a>
          </h4>
          <div class="text-muted mb-3">{{growlog.etapa}} día {{growlog.dia}}</div>
          <p class="text-light">{{growlog.texts.links[0].content}}</p>

        </div>
      </div>

    </b-col>

    <infinite-loading @distance="1" cols="12" @infinite="infiniteHandler"></infinite-loading>
  </b-row>
</template>

<script>
import InfiniteLoading from 'vue-infinite-loading';


Vue.prototype.$http = axios;

export default {
  mounted() {
      console.log('montado el componente growlog')
  },
  data() {
    return {
      slide: 0,
      sliding: null,
      growlogs: [],
      page: 1,
    };
  },
  props: {
    // growlog: Number,

  },
  methods: {
    //scroll infinito con paginacion de laravel
    infiniteHandler($state) {
      setTimeout(() => {
        let vm = this;
        const temp = [];
        const days = [];
        axios.get('/api/growlogsdays?page='+this.page)
             .then(response => {
                var data = response.data.data;
                var pagination = response.data.meta.pagination;
                this.growlogs = this.growlogs.concat(response.data.data);
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
