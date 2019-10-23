import Vue from 'vue';
import App from '@/App';

import 'normalize.css/normalize.css'; // a modern alternative to CSS resets

import Element from 'element-ui';
import '@/styles/element-variables.scss';
import '@/styles/index.scss'; // global css

Vue.use(Element, { size: 'medium' });

import router from '@/router';
import store from '@/store';
import '@/icons'; // icon

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app');
