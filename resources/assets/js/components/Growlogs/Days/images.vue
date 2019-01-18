<template>
  <div>
    <b-row v-if ="day.images">
      <b-col  v-for ="img in day.images.links ">
        <img :src="img.link" alt="image" >
      </b-col>
    </b-row>

  </div>
</template>

<script>

export default {
  mounted() {
      console.log('images');
      axios.get('/api/growlogs/'+this.growlogId+'/days/'+this.dayId)
           .then(response => {
             console.log('imagenesssss');
              return response.data.data;

            });
  },
  computed: {

  },
  name: 'images',
  props: {
    growlogId: Number,
    dayId: Number,
  },
  data: function () {
    return {
      day: [],
    }
  },
  methods: {

  }

}
</script>
