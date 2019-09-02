import Vue from 'vue';
import App from '@/App';
import router from '@/router';
import store from '@/store';

window.$ = window.jQuery = require('jquery');
require('admin-lte');

new Vue({
  el: '#app',
  router: router,
  store: store,
  components: { App },
  template: '<App/>'
});
