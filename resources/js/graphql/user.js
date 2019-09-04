import { request } from '@/graphql/request';

export const login = (email, password) => {
  return request({
    query: `{
      auth (email: "${email}", password: "${password}") {
        userId,
        email,
        name,
        token
      }
    }`
  });
};
