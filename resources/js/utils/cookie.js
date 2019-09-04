import Cookies from 'js-cookie';

export const setCookie = (name, source, expires = 1) => {
  if (source) {
    Cookies.set(name, source, { expires: expires });
  }
};

export const getCookie = name => {
  return Cookies.get(name) || null;
};

export const destroyCookie = (name = null) => {
  if (!name) return false;
  const target = Cookies.get(name) || null;
  if (target) {
    Cookies.remove(name);
    return true;
  } else {
    return false;
  }
};

export const isLogin = () => {
  const token = getCookie('token');
  return !!token;
};
