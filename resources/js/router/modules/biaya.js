import Layout from '@/layout';

const biayaRoutes = {
  path: '/biaya',
  component: Layout,
  redirect: '/biaya',
  name: 'biaya',
  meta: {
    title: 'biaya',
    icon: 'dollar',
    permissions: ['view menu element ui'],
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

export default biayaRoutes;
