<template>
  <!-- bind event 'done' to receive file uploaded info -->
  <div>
    <datepicker v-model="today" name="date" input-class="form-control"></datepicker>
    <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" @vdropzone-files-added="vfileAdded" v-on:vdropzone-success="showSuccess" v-on:vdropzone-sending="sending" v-on:vdropzone-error="error">


    </vue-dropzone>
    <b-form-textarea id="textarea1"
                 v-model="text"
                 placeholder="Enter something"
                 :rows="3"
                 :max-rows="6">
    </b-form-textarea>

    <button class="btn btn-success" v-on:click="sendme()">Guardar</button>
  </div>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
import Datepicker from 'vuejs-datepicker'
import {en, es} from 'vuejs-datepicker/dist/locale'


export default {
  mounted() {
      console.log('componente dropzone');
  },
  name: 'app',
  components: {
    vueDropzone: vue2Dropzone,
    Datepicker
  },
  props:{
    url: String,
  },
  data: function () {
    return {
      today:Date.now(),
      text:'',
      en: en,
      es: es,
      dropzoneOptions: {
          url: 'http://weedtracking.test/api/growlogs/59/image',
          autoProcessQueue: false,
          autoDiscover: false,
          thumbnailWidth: 150,
          maxFilesize: 3,
          headers: { "My-Awesome-Header": "header value" },
          dictDefaultMessage: 'subir una foto',
          headers: {
            "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
           }
      },
      fileAdded: false,
    }
  },
  methods: {
    vfileAdded(file) {
      this.fileAdded = true;
      console.log(file);
      // window.toastr.info('', 'Event : vdropzone-file-added')
    },
    sendme() {
      console.log('click');
      //this.$refs.myVueDropzone.processQueue();
      this.$refs.myVueDropzone.dropzone.processQueue();
      // window.toastr.info('', 'Event : vdropzone-file-added')
    },
    sending(file, xhr, formData){
      console.log('sending');
      formData.append('date', this.today);
      formData.append('text', this.text);
    },
    error(file, message, xhr){
      console.log('error: '+ message);

      //formData.append('text', this.text);
    },
    showSuccess(file, response) {

      console.log(response);

      // window.toastr.info('', 'Event : vdropzone-file-added')
    },
  }

}
</script>
