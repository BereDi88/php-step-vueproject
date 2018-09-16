import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import App from './App'
import router from './router'
import VeeValidate from 'vee-validate';

import VueIziToast from 'vue-izitoast';

// You need a specific loader for CSS files like https://github.com/webpack/css-loader
// If you would like custom styling of the toastr the css file can be replaced
import '@deveodk/vue-toastr/dist/@deveodk/vue-toastr.css'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'izitoast/dist/css/iziToast.css';


import axios from 'axios'
import VueAxios from 'vue-axios'


//Vue.use(VueIziToast, defaultOptionsObject);

Vue.use(VeeValidate);
Vue.use(VueAxios, axios);
Vue.config.productionTip = false;

Vue.use(BootstrapVue);

Vue.use(VueIziToast);

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  render: h => h(App)
})
