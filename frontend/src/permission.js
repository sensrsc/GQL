import router from '@/router';
import store from '@/store';
import { Message } from 'element-ui';
import { getCookie } from '@/utils/auth';
import getPageTitle from '@/utils/get-page-title';

const whiteList = ['/login'];

router.beforeEach(async(to, from, next) => {
  document.title = getPageTitle(to.meta.title);

  const hasToken = getCookie();

  if (hasToken) {
    if (to.path === '/login') {
      next({ path: '/' });
    } else {
      const hasGetUserInfo = store.getters.name;
      if (hasGetUserInfo) {
        next();
      } else {
        try {
          next();
        } catch (error) {
          await store.dispatch('user/resetToken');
          Message.error(error || 'Has Error');
          next(`/login?redirect=${to.path}`);
        }
      }
    }
  } else {
    if (whiteList.indexOf(to.path) !== -1) {
      next();
    } else {
      next(`/login?redirect=${to.path}`);
    }
  }
});
