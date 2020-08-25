import axios from 'axios';
import { Message } from 'element-ui';

const service = axios.create({
  baseURL: process.env.VUE_APP_BASE_API,
  // withCredentials: true,
  timeout: 5000
});

service.interceptors.request.use(
  config => {
    // do something before request is sent

    // if (store.getters.token) {
    //   // let each request carry token
    //   // ['X-Token'] is a custom headers key
    //   // please modify it according to the actual situation
    //   config.headers['X-Token'] = getToken()
    // }
    return config;
  },
  error => {
    console.log(error);
    return Promise.reject(error);
  }
);

service.interceptors.response.use(
  response => {
    const res = response.data;

    if (res.errors) {
      Message({
        message: res.errors[0].message || 'Error',
        type: 'error',
        duration: 5 * 1000
      });
      return Promise.reject(new Error(res.errors[0].message || 'Error'));
    } else {
      return res;
    }
  },
  error => {
    console.log('err' + error);
    Message({
      message: error.message,
      type: 'error',
      duration: 5 * 1000
    });
    return Promise.reject(error);
  }
);

export default service;
