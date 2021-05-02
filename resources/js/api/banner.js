import request from '@/utils/request';

export function fetchList(query) {
  return request({
    url: '/banner',
    method: 'get',
    params: query,
  });
}

export function fetchBanner(id) {
  return request({
    url: '/banner/' + id,
    method: 'get',
  });
}

export function updateArticle(data) {
  return request({
    url: '/banner/update',
    method: 'post',
    data: data,
  });
}
