import request from '@/graphql/request';

export const loginRequest = parameter => {
  const query = {
    query: `query auth($email: String!, $password: String!) {
      auth(email: $email, password: $password) {
        userId
        email
        name
        mobile
        avatar
        token
      }
    }`,
    variables: parameter
  };

  return request({
    method: 'post',
    data: query
  });
};

export const logoutRequest = parameter => {
  const query = {};

  return request({
    method: 'post',
    data: query
  });
};
