import AdminHome from './components/admin/AdminHome.vue'
import Ex from './components/ExampleComponent.vue'
import CategoryCreate from './components/admin/category/Create.vue'
import CategoryList from './components/admin/category/List.vue'

export const routes = [
  {
  	path: '/home',
  	component: AdminHome
  },
  {
  	path: '/post',
  	component: Ex
  },
  {
  	path:'/category/create',
  	component:CategoryCreate
  },
  {
  	path:'/category/list',
  	component:CategoryList
  }
]