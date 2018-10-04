<template>

  <b-row>

    <b-col sm="12" md="6" lg="4"  v-for="growlog in growlogs" >
      <div class="card">
        <div class="rel">
            <div class="carousel slide" id="carousel_1" data-ride="carousel">
                <ol class="carousel-indicators" style="top:1.25rem;bottom:auto;">
                    <li class="active" data-target="#carousel_1" data-slide-to="0"></li>
                    <li data-target="#carousel_1" data-slide-to="1"></li>
                    <li data-target="#carousel_1" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="card-img-top" :src="growlog.images.links[0].url" alt="image">
                    </div>
                    <div class="carousel-item">
                        <img class="card-img-top" :src="growlog.images.links[0].url" alt="image">
                    </div>
                    <div class="carousel-item">
                        <img class="card-img-top" :src="growlog.images.links[0].url" alt="image">
                    </div>
                </div>
            </div>

            <div class="card-img-overlay">
                                <div class="overlay-panel overlay-panel-bottom overlay-panel-dark flexbox">
                                    <div class="d-inline-flex align-items-center">
                                        <a>
                                            <img class="img-circle img-bordered mr-3" :src="growlog.images.links[0].url" alt="image" width="48">
                                        </a>
                                        <div>
                                            <h5 class="m-0">
                                                <a :href="growlog.links.growlog.href">{{growlog.links.growlog.name}}</a>
                                            </h5><small>{{growlog.stage}} día {{growlog.day}}</small></div>
                                    </div>
                                    <div class="d-inline-flex">
                                        <span class="pl-3 pr-3 text-center" style="border-right: 1px solid rgba(255,255,255,.5);"><i class="la la-camera d-block font-26 mb-2"></i>124</span>
                                        <span class="pl-3 pr-3 text-center"><i class="la la-users d-block font-26 mb-2"></i>56</span>
                                    </div>
                                </div>
                            </div>
        </div>
        <div class="card-body">
          <p class="content-maxed">{{growlog.texts.links[0].content}}</p>

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
