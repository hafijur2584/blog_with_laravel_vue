<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-1">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Post</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" id="title" placeholder="title" v-model="form.title" :class="{ 'is-invalid': form.errors.has('title') }">
                      <has-error :form="form" field="title"></has-error>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Category</label>
                      <select name="category_id" class="form-control" v-model="form.category_id" :class="{ 'is-invalid': form.errors.has('category_id') }">
                        <option disabled="" value="">Select One</option>
                        <option :value="cat.id" v-for = "cat in categories">{{cat.name}}</option>
                      </select>
                      <has-error :form="form" field="category_id"></has-error>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <!-- <textarea class="form-control" rows="10" name="description" v-model="form.description" :class="{ 'is-invalid': form.errors.has('description') }"></textarea> -->
                      <v-md-editor v-model="form.description" height="400px" :class="{ 'is-invalid': form.errors.has('description') }"></v-md-editor>
                      <has-error :form="form" field="description"></has-error>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <input type="file" @change = "changeImage($event)" name="newImage" :class="{ 'is-invalid': form.errors.has('image') }">
                    <has-error :form="form" field="image"></has-error>
                  </div>
                  <img style="width:20%;height:auto;" :src="form.image" alt="">
                  <img style="width:20%;height:auto;" :src="`/`+form.image" alt="">
                </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" @click.prevent="editValue()" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name:"",
  data(){
    return{
      form: new Form({
        title: '',
        category_id:'',
        description:'',
        image:''
      }),
      categories:{},
      post:{}
    }
  },
  mounted(){
    axios.get(`/api/post/edit/${this.$route.params.post_id}`)
    .then((res)=>{
      this.post = res.data.post
      this.form.fill(res.data.post)
      this.categories = res.data.categories
    })
  },
  methods:{
    editValue(){
      this.form.patch(`/api/post/${this.$route.params.post_id}`)
      .then((res)=>{
        this.form.reset();
        this.$router.push('/post/list')
        Toast.fire({
          icon: 'success',
          title: 'Updated Successfully!'
        })
      })
      .catch(()=>{
        Toast.fire({
          icon: 'error',
          title: 'Something!'
        })
      })
    },
    changeImage(event){
      let file = event.target.files[0];
      if(file.size > 10008839){
        Toast.fire({
          icon: 'error',
          title: 'Something!'
        })
      }else{
        let reader = new FileReader();
        reader.onload = (e)=> {
          this.form.image = e.target.result
        };

        reader.readAsDataURL(file);
      }
    }
  }
}
</script>
