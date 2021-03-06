import Layout from '@/layout';

const configRoutes = {
  path: '/config',
  component: Layout,
  redirect: '/config',
  name: 'configuration',
  meta: {
    title: 'configuration',
    icon: 'admin',
    permissions: ['manage permission'],
  },
  children: [
    {
      path: 'banner',
      name: 'banner',
      component: () => import('@/views/sysconfig/banner/banner'),
      meta: { title: 'banner', icon: 'el-icon-plus' },
    },
    {
      path: 'banner/edit/:id',
      component: () => import('@/views/sysconfig/banner/Edit'),
      name: 'EditBanner',
      meta: { title: 'editBanner', noCache: true, permissions: ['manage article'] },
      hidden: true,
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
