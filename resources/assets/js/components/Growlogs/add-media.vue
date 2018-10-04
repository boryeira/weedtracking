<template>
  <!-- bind event 'done' to receive file uploaded info -->
  <v-uploader @done="uploadDone" :multiple="true" ></v-uploader>
</template>

<script>
import vUploader from 'v-uploader';

// v-uploader plugin global config
const uploaderConfig = {
    // file uploader service url
    language: 'en',
    uploadFileUrl: 'http://xxx/upload/publicFileUpload',
    // file delete service url
    deleteFileUrl: 'http://xxx/upload/deleteUploadFile',
    // set the way to show upload message(upload fail message)
    showMessage: (vue, message) => {
        //using v-dialogs to show message
        vue.$vDialog.alert(message, null, {messageType: 'error'});
    }
};

// install plugin with options
Vue.use(vUploader, uploaderConfig);


export default {
  mounted() {
      console.log('montado el componente add-media')
  },
  data() {
    return {
    };
  },
  methods:{
      //receive uploaded files info
      //@type Array
      uploadDone(files){
          if(files && Array.isArray(files) && files.length){
              console.log(file);
          }
      }
  }

};
</script>
