<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-1">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Category List</h3>
              <div class="pull-right">
                <router-link type="button" class="btn bg-gradient-success btn-sm text-white" to="/category/create">Create</router-link>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th style="width: 10px">SL</th>
                    <th>Name</th>
                    <th>Time</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(category,index) in getCategtory" :key="category.id">
                    <td>{{index+1}}</td>
                    <td width="300">{{category.name}}</td>
                    <td width="300">{{category.created_at | timeFormat}}</td>
                    <td>
                      <a style="cursor:pointer;margin-left:10px;" class="" data-toggle="modal" data-target="#viewModal" @click.prevent="showCategory(category)">
                        <i class="fa fa-eye"></i>
                      </a>
                      <router-link class="" :to="`/category/edit/${category.id}`">
                        <i class="fa fa-edit"></i>
                      </router-link>
                      <a style="cursor:pointer;margin-right:10px;" class="" @click.prevent="deleteCategory(category.id)">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                    
                  </tr>
                </tbody>
              </table>
            </div>
            <pagination ></pagination>
            
          </div>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <span><strong>Category Name: </strong>{{name}}</span><br>
            <span><strong>Date: </strong>{{date | timeFormat}}</span>
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
      name:'',
      date:''
    }
  },

  mounted() {
    this.$store.dispatch("allCategory")

  },
  computed:{
    getCategtory(){
      return this.$store.getters.getCategtory
    }
    
  },
  methods:{
    deleteCategory(id){
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
          axios.get('/api/category/destroy/'+id)
          .then((res)=>{
            this.$store.dispatch("allCategory")
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
    showCategory(cat){
      this.name = cat.name;
      this.date = cat.created_at
    }
  }
}

</script>

