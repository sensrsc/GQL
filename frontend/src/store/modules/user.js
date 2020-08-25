// import { logout } from '@/api/user';
import { loginRequest, logoutRequest } from '@/graphql/user';
import { getCookie, setCookie, removeCookie } from '@/utils/auth';
import { resetRouter } from '@/router';

const state = {
  token: getCookie(),
  name: '',
  userId: '',
  avatar: ''
};

const mutations = {
  setToken: (state, token) => {
    state.token = token;
  },
  setUser: (state, user) => {
    state.name = user.name;
    state.userId = user.userId;
    state.avatar = user.avatar;
  }
};

const actions = {
  login({ commit }, userInfo) {
    const { email, password } = userInfo;
    return new Promise((resolve, reject) => {
      loginRequest({ email: email.trim(), password: password }).then(response => {
        const { token, ...user } = response.data.auth;
        commit('setToken', token);
        commit('setUser', user);
        setCookie(token);
        resolve();
      }).catch(error => {
        reject(error);
      });
    });
  },

  logout({ commit, state }) {
    return new Promise((resolve, reject) => {
      logoutRequest(state.token).then(() => {
        commit('setToken', '');
        removeCookie();
        resetRouter();
        resolve();
      }).catch(error => {
        reject(error);
      });
    });
  },

  // remove token
  resetToken({ commit }) {
    return new Promise(resolve => {
      commit('setToken', '');
      removeCookie();
      resolve();
    });
  }
};

export default {
  namespaced: true,
  state,
  mutations,
  actions
};
