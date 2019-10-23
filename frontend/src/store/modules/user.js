import { loginQuery } from '@/graphql';

const state = {
  user: {}
};

const getters = {
  user: state => state.user
};

const mutations = {
  setUser(state, user) {
    state.user = user;
  }
};

const actions = {
  login({ commit }, { email, password }) {
    return new Promise((resolve, reject) => {
      loginQuery({ email, password })
        .then(res => {
          resolve();
        })
        .catch(err => {
          reject(err);
        });
    });
  }
};

export default {
  state,
  getters,
  mutations,
  actions
};
