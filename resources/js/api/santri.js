import request from '@/utils/request';
import Resource from '@/api/resource';

class SantriResource extends Resource {
  constructor() {
    super('santri');
  }

  permissions(id) {
    return request({
      url: '/' + this.uri + '/' + id + '/permissions',
      method: 'get',
    });
  }

  updatePermission(id, permissions) {
    return request({
      url: '/' + this.uri + '/' + id + '/permissions',
      method: 'put',
      data: permissions,
    });
  }
}

export { SantriResource as default };
