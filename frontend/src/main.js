import Vue from 'vue';
import App from '@/App.vue';
import Antd from 'ant-design-vue';
import 'ant-design-vue/dist/antd.css';
import { sync } from 'vuex-router-sync';

import router from '@/router';
import store from '@/store';

Vue.use(Antd);
Vue.config.productionTip = false;

sync(store, router);

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app');
