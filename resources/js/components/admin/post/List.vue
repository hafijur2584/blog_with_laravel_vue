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
                    <td width="150"><img style="height:auto;width:40%" :src="imgPath(post.image)" alt=""></td>
                    <td width="200">
                      <a style="cursor:pointer;margin-left:10px;" class="" data-toggle="modal" data-target="#viewModal1" @click.prevent="showPost(post)">
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
    <div class="modal fade" id="viewModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <span><strong>Title: </strong>{{post.title}}</span><br>
            <span><strong>Created By: </strong>{{user.name}}</span><br>
            <span><strong>Category: </strong>{{category.name}}</span><br>
            <span><strong>Date: </strong>{{post.created_at | timeFormat}}</span>
            <div>
              <strong>Image: </strong>
              <img style="width30%;height:auto;" :src="imgPath(post.image)" alt="">
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
      post:{},
      category:{},
      user:{}

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
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          axios.get('/api/post/destroy/'+id)
          .then((res)=>{
            this.$store.dispatch("allPost")
            Toast.fire({
              icon: 'success',
              title: 'File Deleted Successfully.'
            })
          })
          .catch(()=>{
            Toast.fire({
              icon: 'error',
              title: 'Something!'
            })
          })
          
        }
      })
    },
    imgPath(img){
      return '/'+img;
    },
    showPost(post){
      this.post = post
      this.category = post.category
      this.user = post.user
    }
    
  }
}

</script>


