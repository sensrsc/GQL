import { logout } from '@/api/user';
import { loginRequest } from '@/graphql';
import { getToken, setToken, removeToken } from '@/utils/auth';
import { resetRouter } from '@/router';

const state = {
  token: getToken(),
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
  // user login
  login({ commit }, userInfo) {
    const { email, password } = userInfo;
    return new Promise((resolve, reject) => {
      loginRequest({ email: email.trim(), password: password }).then(response => {
        const { token, ...user } = response.data.data.auth;
        commit('setToken', token);
        commit('setUser', user);
        setToken(token);
        resolve();
      }).catch(error => {
        reject(error);
      });
    });
  },

  // user logout
  logout({ commit, state }) {
    return new Promise((resolve, reject) => {
      logout(state.token).then(() => {
        commit('SET_TOKEN', '');
        removeToken();
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
      commit('SET_TOKEN', '');
      removeToken();
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
