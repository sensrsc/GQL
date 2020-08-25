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

export const productDetail = parameter => {
  const query = {
    query: `query products($productId: Int!) {
      products(productId: $productId) {
        productId
        slug
      }
    }`,
    variables: parameter
  };

  return request({
    url: '/products',
    method: 'post',
    data: query
  });
};
