import Vue from 'vue';
import Vuex from 'vuex';
import { routers } from '@/config/router.config';

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    menu: [...routers]
  },
  getters: {
    menu: state => state.menu
  },
  modules: {}
});

export default store;
