<template>
    <div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item" v-for = "p in meta.last_page">
                <a class="page-link" href="#" @click.prevent = "changePage(p)">{{p}}</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return{
            meta:{}
        }
    },
    mounted(){

            // console.log(this.meta)

        },
        created(){
            
        },
        computed:{

        },
        methods:{
            changePage(page){
                
            }
        }
    }
    </script>