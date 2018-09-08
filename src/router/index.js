import Vue from 'vue'
import Router from 'vue-router'
import MainPage from '@/components/MainPage'
import Authorization from '../components/Authorization';
import Registration from '../components/Registration';

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'MainPage',
      component: MainPage,

    },
    {
          path:'/auth',
          name:'Authorization',
          component: Authorization
    },
      {
        path: '/reg',
          name: 'Registration',
          component: Registration

      }
  ]
})
