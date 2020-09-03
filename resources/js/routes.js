import AdminHome from './components/admin/AdminHome.vue'

import CategoryCreate from './components/admin/category/Create.vue'
import CategoryList from './components/admin/category/List.vue'
import CategoryEdit from './components/admin/category/Edit.vue'

import PostCreate from './components/admin/post/Create.vue'
import PostEdit from './components/admin/post/Edit.vue'
import PostList from './components/admin/post/List.vue'

export const routes = [
  {
  	path: '/home',
  	component: AdminHome
  },
  {
  	path:'/category/create',
  	component:CategoryCreate
  },
  {
  	path:'/category/list',
  	component:CategoryList
  },
  {
    path:'/category/edit/:cat_id',
    component:CategoryEdit
  },
  {
    path:'/post/create',
    component:PostCreate
  },
  {
    path:'/post/list',
    component:PostList
  },
  {
    path:'/post/edit/:post_id',
    component:PostEdit
  }

]