<template>
    <div>
      <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Post List</h3>
              <div class="pull-right">
                <router-link type="button" class="btn bg-gradient-success btn-sm text-white" to="/post/create">Create</router-link>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th style="width: 10px">SL</th>
                    <th>Title</th>
                    <th>Created By</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Photo</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(post,index) in getPost" :key="post.id">
                    <td>{{index+1}}</td>
                    <td>{{post.title | sortForm(10,"...")}}</td>
                    <td v-if = "post.user">{{post.user.name}}</td>
                    <td v-if = "post.category">{{post.category.name}}</td>
                    <td>{{post.created_at | timeFormat}}</td>
                    <td width="150"><img style="height:auto;width:40%" :src="post.image" alt=""></td>
                    <td width="200">
                      <a style="cursor:pointer;margin-left:10px;" class="" data-toggle="modal" data-target="#viewModal" @click.prevent="">
                        <i class="fa fa-eye"></i>
                      </a>
                      <router-link class="" :to="`/post/edit/${post.id}`">
                        <i class="fa fa-edit"></i>
                      </router-link>
                      <a style="cursor:pointer;margin-right:10px;" class="" @click.prevent="deletePost(post.id)">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                    
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
</template>

<style>
.btn-app {
  background: #f8f9fa;
  border-color: #aaaaaa;
  color: #444;
}
</style>

<script>
export default {
  data(){
    return{
      
    }
  },

  mounted() {
    this.$store.dispatch("allPost")

  },
  computed:{
    getPost(){
      return this.$store.getters.getPost
    }
    
  },
  methods:{
    deletePost(id){
      axios.get('/api/post/destroy/'+id)
      .then((res)=>{
        this.$store.dispatch("allPost")
        toast.fire({
          icon: 'success',
          title: 'Deleted Successfully!'
        })
      })
      .catch(()=>{
        toast.fire({
          icon: 'error',
          title: 'Something!'
        })
      })
    }
    
  }
}

</script>


