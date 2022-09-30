import { createRouter, createWebHashHistory } from 'vue-router';
import dashboardVue from './views/dashboard.vue';
import produkVue from './views/produk.vue';
import transaksiVue from './views/transaksi.vue';
import laporanVue from './views/laporan.vue';
import profilVue from './views/profil.vue';

const routes: Array<any> = [
	{
		path: '/',
		component: dashboardVue,
	},
	{
		path: '/produk',
		component: produkVue,
	},
	{
		path: '/transaksi',
		component: transaksiVue,
	},
	{
		path: '/laporan',
		component: laporanVue,
	},
	{
		path: '/profil',
		component: profilVue,
	},
];

export default createRouter({
	history: createWebHashHistory(),
	routes,
});
