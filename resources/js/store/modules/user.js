import { login } from '@/graphql';

const state = {};
const getters = {};
const mutations = {};
const actions = {
  handleLogin({ commit }, parameter) {
    return new Promise((resolve, reject) => {
      login(parameter.email, parameter.password)
        .then(response => {
          console.log(response);
          resolve();
        })
        .catch(error => {
          console.log(error);
          reject(error);
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
