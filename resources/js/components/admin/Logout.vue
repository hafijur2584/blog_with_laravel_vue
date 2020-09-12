<template>
  <div>

  </div>
</template>

<script>
    export default {
        data(){
            return{
                email:'',
                password:''
            }
        },


        created(){
            this.$store.dispatch('logout').then(() => {
               this.$router.push('/admin/login') 
            })
        }
    };
</script>
