import Vue from 'vue';
import VueRouter from 'vue-router';
import { routers } from '@/config/router.config';

Vue.use(VueRouter);

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      name: 'index',
      path: '/',
      redirect: '/dashboard',
      children: routers,
      component: () => import('@/components/layout')
    }
  ]
});

export default router;
