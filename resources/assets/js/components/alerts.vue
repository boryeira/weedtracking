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
            console.log(alert);
            this.$toasted.show('peoo',this.options);
        }
    }
</script>
