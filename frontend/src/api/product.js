import request from '@/utils/request';

export function getProductList() {
  return request({
    url: '/products',
    method: 'get'
  });
}
