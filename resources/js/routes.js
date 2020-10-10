import AdminHome from './components/admin/AdminHome.vue'
import Login from './components/admin/Login.vue'

import CategoryCreate from './components/admin/category/Create.vue'
import CategoryList from './components/admin/category/List.vue'
import CategoryEdit from './components/admin/category/Edit.vue'

import PostCreate from './components/admin/post/Create.vue'
import PostEdit from './components/admin/post/Edit.vue'
import PostList from './components/admin/post/List.vue'


import PublicHome from './components/public/PublicHome.vue'
import SinglePost from './components/public/page/SinglePost'

import store from './auth'



export const routes = [
  {
  	path: '/home',
    component: AdminHome,
    beforeEnter: (to, from, next) => {
      if(!store.state.token){
        return next({
          name:'login'
        })
      }
      next()
    }
  },
  {
  	path: '/admin/login',
    component: Login,
    name:'login'
  },
  {
  	path:'/category/create',
    component:CategoryCreate,
    beforeEnter: (to, from, next) => {
      if(!store.state.token){
        return next({
          name:'login'
        })
      }
      next()
    }
  },
  {
  	path:'/category/list',
    component:CategoryList,
    beforeEnter: (to, from, next) => {
      if(!store.state.token){
        return next({
          name:'login'
        })
      }
      next()
    }
  },
  {
    path:'/category/edit/:cat_id',
    component:CategoryEdit,
    beforeEnter: (to, from, next) => {
      if(!store.state.token){
        return next({
          name:'login'
        })
      }
      next()
    }
  },
  {
    path:'/post/create',
    component:PostCreate,
    beforeEnter: (to, from, next) => {
      if(!store.state.token){
        return next({
          name:'login'
        })
      }
      next()
    }
  },
  {
    path:'/post/list',
    component:PostList,
    beforeEnter: (to, from, next) => {
      if(!store.state.token){
        return next({
          name:'login'
        })
      }
      next()
    }
  },
  {
    path:'/post/edit/:post_id',
    component:PostEdit,
    beforeEnter: (to, from, next) => {
      if(!store.state.token){
        return next({
          name:'login'
        })
      }
      next()
    }
  },


  {
    path:'/',
    component:PublicHome
  },
  {
    path:'/singlepost/:id',
    component:SinglePost

  }


]