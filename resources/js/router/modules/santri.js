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
      component: () => import('@/views/form/index'),
      meta: { title: 'addSantri', icon: 'form' },
    },
    {
      path: 'icons',
      component: () => import('@/views/icons/index'),
      name: 'Icons',
      meta: { title: 'icons', icon: 'el-icon-info', noCache: true },
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
