<template>
    <div>
        <div class="container">
            <div class="row">
                <div style="margin-top: 20%;" class="col-md-6 offset-3 ">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Admin Login</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" v-model="form.email" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" v-model="form.password" class="form-control" id="inputPassword3"
                                               placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                            <label class="form-check-label" for="exampleCheck2">Remember me</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" @click.prevent="login()" class="btn btn-info">Sign in</button>
                                <!--<router-link to="/" type="submit" class="btn btn-default float-right">Cancel</router-link>-->
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                form:{
                    email:'',
                    password:''
                }
            }
        },
        methods:{
            login(){
                let headers = {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
                axios.post('/api/auth/login',this.form,headers)
                    .then((res)=>{
                        console.log(res.data.access_token);
                    })
            }
        }
    };
</script>