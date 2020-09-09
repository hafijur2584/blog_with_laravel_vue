
require('./bootstrap');

import Vue from 'vue'

import VueMarkdownEditor from '@kangc/v-md-editor';
import '@kangc/v-md-editor/lib/style/base-editor.css';
import vuepressTheme from '@kangc/v-md-editor/lib/theme/vuepress.js';
VueMarkdownEditor.use(vuepressTheme);
Vue.use(VueMarkdownEditor);



//support vuex
import storeData from './store/index'
import Vuex from 'vuex'
Vue.use(Vuex)
const store = new Vuex.Store(
		storeData
)

//vue router
import VueRouter from 'vue-router'
import {routes} from './routes'
import {filter} from './filter'

Vue.use(VueRouter);

//v-form
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//sweet alert
import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000
});
window.Toast = Toast;



// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-master', require('./components/admin/AdminMaster.vue').default);
Vue.component('admin-login', require('./components/admin/Login.vue').default);
Vue.component('pagination', require('./components/Pagination.vue').default);
Vue.component('public-master', require('./components/public/PublicMaster.vue').default);


const router = new VueRouter({
  routes, // short for `routes: routes`
  mode: 'history'
})


const app = new Vue({
    el: '#app',
    router,
    store
});
