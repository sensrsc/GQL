import Vue from 'vue';
import Vuex from 'vuex';
import getters from '@/store/getters';
import app from '@/store/modules/app';
import settings from '@/store/modules/settings';
import user from '@/store/modules/user';
import product from '@/store/modules/product';

Vue.use(Vuex);

const store = new Vuex.Store({
  modules: {
    app,
    settings,
    user,
    product
  },
  getters
});

export default store;
