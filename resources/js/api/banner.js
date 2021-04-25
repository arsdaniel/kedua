import request from '@/utils/request';

export function fetchList(query) {
    return request({
      url: '/banner',
      method: 'get',
      params: query,
    });
  }