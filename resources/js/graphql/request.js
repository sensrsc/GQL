import axios from 'axios';

export const request = (query) => axios.post(
  'http://127.0.0.1:8000/graphql', query
);
