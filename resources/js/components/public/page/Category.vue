<template>
    <div>
        <div class="single_widget cat_widget">
            <h4 class="text-uppercase pb-20">post categories</h4>
            <ul>
                <li v-for = "(category, index) in categories" :key="index">
                    <router-link :to="`/blog/category/${category.id}`">
                        {{category.name}}
                        <span>{{category.posts.length}}</span>
                    </router-link>
                </li>

            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        mounted(){
            this.$store.dispatch('category')
        },
        computed:{
            categories(){
                return this.$store.getters.getCategories
            }
        }
    };
</script>
