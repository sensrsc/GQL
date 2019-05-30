import Vue from 'vue';
import App from '@/App';
import router from '@/router';

window.$ = window.jQuery = require('jquery');
require('admin-lte');

new Vue({
  el: '#app',
  router: router,
  components: { App },
  template: '<App/>'
});
