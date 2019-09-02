import { request } from '@/graphql/request';

export const login = (email, password) => {
  return request({
    query: `{
      user (email: "${email}", password: "${password}") {
        userId,
        email
      }
    }`
  });
};
