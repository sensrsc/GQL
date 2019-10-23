import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const router = new VueRouter({
  mode: 'history',
  base: '',
  routes: [
    {
      name: 'login',
      path: '/login',
      meta: {
        title: 'Login'
      },
      component: () => import('@/views/user/Login')
    }
  ]
});

export default router;
