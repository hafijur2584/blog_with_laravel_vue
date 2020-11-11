<template>
  <div id="adminmain">
    <navbar v-if="login"></navbar>

    <sidebar v-if="login"></sidebar>
    <div v-bind:class="this.content_wrapper? '':'content-wrapper'">
      <betcon v-if="login"></betcon>
      <section class="content">
        <router-view></router-view>
      </section>
    </div>
    <footers v-if="login"></footers>
  </div>
</template>
<script>
export default {
    data(){
        return{
            content_wrapper: true
        }
    },
    computed:{
        login(){
            if(this.$route.name != 'login'){
            this.content_wrapper = false
            }else{
                this.content_wrapper = true
            }
            return this.$route.name != 'login' 
        }
    }
    
}
</script>
<style lang="scss" scoped>
    
</style>


