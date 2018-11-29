<template>

  <b-row>

    <b-col sm="12" md="6" lg="4"  v-for="growlog in growlogs" >
      <div class="card">
        <div class="rel">
            <img class="card-img-top" :src="growlog.last_day.images.links[0].url" alt="image">
            <div class="card-img-overlay">
                <span class="badge badge-primary">VEGETATIVO</span>
            </div>
        </div>
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-4">
              <a class="d-inline-flex align-items-center" :href="growlog.links.self.href">
                  <img class="img-circle mr-3" :src="growlog.last_day.images.links[0].url" alt="image" width="40">
                  <div>
                      <h6 class="text-primary m-0">{{growlog.name}}</h6><small class="text-muted"></small></div>
              </a>
              <div class="d-inline-flex">
                  <span class="text-muted pl-3 pr-3 text-center" style="border-right:1px solid rgba(0,0,0,.1);"><i class="fa fa-heart-o d-block font-16 mb-2"></i>124</span>
                  <span class="text-muted pl-3 pr-3 text-center"><i class="fa fa-comment-o d-block font-16 mb-2"></i>56</span>
              </div>

          </div>
          <p class="text-light">{{growlog.last_day.texts.links[0].content}}</p>

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
      console.log('montado el componente growlog wii')
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
        console.log('pregunta');
        axios.get('/api/growlogs?page='+this.page)
             .then(response => {
              console.log('respuesta');
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
