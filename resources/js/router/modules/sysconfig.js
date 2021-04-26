import Layout from '@/layout';

const configRoutes = {
  path: '/config',
  component: Layout,
  redirect: '/config',
  name: 'configuration',
  meta: {
    title: 'configuration',
    icon: 'admin',
    permissions: ['view menu element ui'],
  },
  children: [
    {
      path: 'banner',
      name: 'banner',
      component: () => import('@/views/sysconfig/banner'),
      meta: { title: 'banner', icon: 'el-icon-plus' },
    },
    {
      path: 'listsantri',
      component: () => import('@/views/santri/index'),
      name: 'List Santri',
      meta: { title: 'listsantri', icon: 'list', noCache: true },
    },
  ],
};

export default configRoutes;