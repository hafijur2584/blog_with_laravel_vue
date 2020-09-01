
require('./bootstrap');

import Vue from 'vue'

//support vuex
import Vuex from 'vuex'
Vue.use(Vuex)
const store = new Vuex.Store({
  
})

//vue router
import VueRouter from 'vue-router'
import {routes} from './routes'

Vue.use(VueRouter);

//v-form
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//sweet alert
import Swal from 'sweetalert2'
window.swal = Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000
});
window.toast = Toast;



// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-master', require('./components/admin/AdminMaster.vue').default);


const router = new VueRouter({
  routes, // short for `routes: routes`
  mode: 'history'
})


const app = new Vue({
    el: '#app',
    router
});
