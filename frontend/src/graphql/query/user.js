import axios from 'axios';

export const loginQuery = parameter => {
  return axios.post('http://127.0.0.1:8000/graphql',
    {
      query: `query auth($email: String!, $password: String!) {
        auth(email: $email, password: $password){
          userId
          email
          name
          mobile
          token
        }
      }`,
      variables: parameter
    });
};
