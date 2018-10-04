<template>
  <div>
    <ul class="media-list media-list-divider">
      <li class="media" v-for="day in days" v-b-modal.daymodal v-on:click="clickday = day">

          <div class="media-img pr-4">
              <img :src="day.images.links[0].url" alt="image" width="120">
          </div>
          <div class="media-body d-flex ">
            <div class="flex-1">

              <h5 class="media-heading font-strong mt-5">
                Día {{day.day}}
              </h5>
              <p class="text-muted">{{day.stage}}</p>

            </div>

          </div>
          <!-- modal -->


      </li>
    </ul>

      <infinite-loading @distance="0" @infinite="infiniteHandler"></infinite-loading>
      <b-modal id="daymodal"  title="Seguimiento">
        <h5 class="">Día {{clickday.day}} {{clickday.stage}}</h5>
        <b-row v-if ="clickday.images">
          <b-col  v-for ="img in clickday.images.links ">
            <img :src="img.url" alt="image" >
          </b-col>
        </b-row>
        <b-row v-if ="clickday.texts">
          <b-col sm="12" v-for ="text in clickday.texts.links ">
            <p>
              {{text.content}}
            </p>
          </b-col>
        </b-row>
      </b-modal>
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
      clickday:[],
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
