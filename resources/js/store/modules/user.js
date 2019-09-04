import { login } from '@/graphql';
import { setCookie } from '@/utils/cookie';

const state = {};
const getters = {};
const mutations = {};

const actions = {
  handleLogin({ commit }, parameter) {
    return new Promise((resolve, reject) => {
      login(parameter.email, parameter.password)
        .then(response => {
          const { errors, data } = response.data;
          if (errors) {
            reject(errors);
          } else {
            const { token, ...user } = data.auth;
            setCookie('userInfo', user);
            setCookie('token', token);
            resolve();
          }
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
