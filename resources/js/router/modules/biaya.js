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
      path: 'biayaPendaftaran',
      name: 'biayaPendaftaran',
      component: () => import('@/views/biayapendaftaran/biayapendaftaran'),
      meta: { title: 'biayaPendaftaran', icon: 'el-icon-plus' },
    },
  ],
};

export default biayaRoutes;
