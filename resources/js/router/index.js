import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Main from '@/components/Main';
import ProductList from '@/components/ProductList';
import Login from '@/components/Login';

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      redirect: '/product',
      name: 'Main',
      component: Main,
      meta: { guarded: true },
      children: [
        {
          path: '/product',
          name: 'ProductList',
          component: ProductList,
          meta: { guarded: true }
        }
      ]
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '*',
      redirect: '/'
    }
  ]
});

export default router;
