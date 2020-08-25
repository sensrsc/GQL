import request from '@/graphql/request';

export const productList = () => {
  const query = {
    query: `query products {
      products {
        productId
        slug
      }
    }`
  };

  return request({
    url: '/products',
    method: 'post',
    data: query
  });
};
