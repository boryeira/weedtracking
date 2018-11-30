<template>

</template>

<script>
    let options = {
        type : 'error',
        duration : 5000,
        fullWidth:true,
        fitToScreen: true,
        position:'bottom-center',
    };
    export default {
      props: {
        alertText: String,

      },
        mounted() {
            console.log('toasted entra.');
            console.log(this.alertText);
            this.$toasted.show(this.alertText,this.options);
        }
    }
</script>
