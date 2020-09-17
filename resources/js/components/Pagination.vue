<template>
  <div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <ul v-if="meta" class="pagination pagination-sm m-0 float-right">
        <li class="page-item">
          <a class="page-link" href="#">«</a>
        </li>
          <li style="display:inline" class="page-item" v-for="(p,index) in meta.last_page" :key = "index">
          <a class="page-link" href="#" @click.prevent="changePage(p)">{{p}}</a>
        </li>
        <!-- <li v-if="meta">{{ meta.current_page}}</li> -->
        <li class="page-item">
          <a class="page-link" href="#">»</a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
    //   meta: {},
    };
  },
  mounted() {
      

  },
  created() {
    
  },
  computed: {
      meta: {
          get(){
              
              if(this.$store.getters.getCategtory.meta){
                  return this.$store.getters.getCategtory.meta
              }
          }
      }
  },
  methods: {
    changePage(page) {},
  },
};
</script>