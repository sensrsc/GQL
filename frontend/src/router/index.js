import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Login from '@/views/Login';

const router = new VueRouter({
  mode: 'history',
  base: '',
  routes: [
    {
      path: '/login',
      name: 'Login',
      component: Login,
      meta: {}
    }
  ]
});

export default router;
