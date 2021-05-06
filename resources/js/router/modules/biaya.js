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
    {
      path: 'biayaPendaftaran/edit/:id',
      component: () => import('@/views/biayapendaftaran/Edit'),
      name: 'EditBiayapendaftaran',
      meta: { title: 'editBiayapendaftaran', noCache: true, permissions: ['manage article'] },
      hidden: true,
    },
  ],
};

export default biayaRoutes;
