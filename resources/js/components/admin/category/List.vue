<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-1">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mr-5">Category List</h3>

              <!-- SEARCH FORM -->
              <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                  <input
                    @keyup="CategorySearch"
                    v-model="keyword"
                    class="form-control form-control-navbar"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                  />
                  <div class="input-group-append">
                    <button
                      class="btn btn-navbar"
                      @click.prevent="CategorySearch"
                      type="submit"
                    >
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>

              <div style="margin-top: -2%" class="pull-right">
                <router-link type="button" class="btn bg-gradient-success btn-sm text-white" to="/admin/category/create">Create</router-link>
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
                  <tr v-for="(category,index) in getCategtory" :key="category.id" v-if="getCategtory.length">
                    <td>{{index+1}}</td>
                    <td width="300">{{category.name}}</td>
                    <td width="300">{{category.created_at | timeFormat}}</td>
                    <td>
                      <a style="cursor:pointer;margin-left:10px;" class="" data-toggle="modal" data-target="#viewModal" @click.prevent="showCategory(category)">
                        <i class="fa fa-eye"></i>
                      </a>
                      <router-link class="" :to="`/admin/category/edit/${category.id}`">
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
import _ from 'lodash'
export default {
  data(){
    return{
      name:'',
      date:'',
      keyword:''
    }
  },

  mounted() {
    this.$store.dispatch("allCategory")

  },
  computed:{
    getCategtory(){
      return this.$store.getters.getCategtory
      console.log(this.$store.getters.getCategtory.meta)
    }
    
  },
  methods:{
    CategorySearch:_.debounce(function () {
      this.$store.dispatch("adminSearchCategory", this.keyword);
    }, 1000),
    
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
          axios.get('/category/destroy/'+id)
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

