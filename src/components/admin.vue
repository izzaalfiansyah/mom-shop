<script setup lang="ts">
	import './admin.css';
	import { onMounted } from 'vue';
	import AdminNavbar from '../components/admin_navbar.vue';
	import AdminSidebar from '../components/admin_sidebar.vue';
	import AdminFooter from '../components/admin_footer.vue';
	import { scrollTop } from '../lib';

	const scrollToTop = scrollTop;

	function initAsset() {
		if (feather) {
			feather.replace({ width: 14, height: 14 });
		}
	}

	onMounted(() => {
		initAsset();

		document.body.className = 'vertical-layout vertical-menu-modern  navbar-floating footer-static';
		document.body.dataset.open = 'click';
		document.body.dataset.menu = 'vertical-menu-modern';
		document.body.dataset.col = '';
	});
</script>

<template>
	<admin-navbar></admin-navbar>
	<admin-sidebar></admin-sidebar>
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<RouterView></RouterView>
	</div>
	<div class="sidenav-overlay"></div>
	<div class="drag-target"></div>
	<admin-footer></admin-footer>
	<button class="btn btn-primary btn-icon scroll-top" @click="scrollToTop" type="button">
		<i data-feather="arrow-up"></i>
	</button>
</template>
