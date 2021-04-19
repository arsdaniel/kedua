import Layout from '@/layout';

const santriRoutes = {
  path: '/santri',
  component: Layout,
  redirect: '/santri/form',
  name: 'Santri',
  meta: {
    title: 'santri',
    icon: 'peoples',
    permissions: ['view menu element ui'],
  },
  children: [
    {
      path: 'addsantri',
      name: 'Add Santri',
      component: () => import('@/views/santri/addsantri'),
      meta: { title: 'addSantri', icon: 'el-icon-plus' },
    },
    {
      path: 'listsantri',
      component: () => import('@/views/santri/index'),
      name: 'listsantri',
      meta: { title: 'listsantri', icon: 'list', noCache: true },
    },
    {
      path: 'tab',
      component: () => import('@/views/tab'),
      name: 'Tab',
      meta: { title: 'tab', icon: 'tab' },
    },
  ],
};

export default santriRoutes;
