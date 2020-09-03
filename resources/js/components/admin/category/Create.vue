<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Create Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control" id="name" placeholder="name" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" @click.prevent="addValue()" class="btn btn-primary">Submit</button>
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
                name: ''
            })
        }
    },
    methods:{
        addValue(){
            this.form.post('/api/category')
            .then((res)=>{
                this.form.reset();
                toast.fire({
                  icon: 'success',
                  title: 'Created Successfully!'
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
