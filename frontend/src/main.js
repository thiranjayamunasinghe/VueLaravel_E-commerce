import Vue from 'vue'
import './plugins/vuetify'
import './plugins/vuetify'
import './plugins/vuetify'
import './plugins/vuetify'
import './plugins/vuetify'
import './plugins/vuetify'
import './plugins/vuetify'
import App from './App.vue'
import Router from './routes.js'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import VeeValidate from 'vee-validate'

import VueResource from 'vue-resource';
import 'roboto-fontface/css/roboto/roboto-fontface.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
Vue.use(VueResource);



Vue.use(VeeValidate);
Vue.use(BootstrapVue);
new Vue({
  el: '#app',
  render: h => h(App),
  router:Router
})


