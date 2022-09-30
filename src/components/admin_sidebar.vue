<script lang="ts" setup>
	import { useRoute } from 'vue-router';

	const route = useRoute();
</script>

<template>
	<div
		class="main-menu menu-fixed menu-light menu-accordion menu-shadow"
		data-scroll-to-active="true"
	>
		<div class="navbar-header">
			<ul class="nav navbar-nav flex-row">
				<li class="nav-item me-auto">
					<RouterLink class="navbar-brand" to="/"> <h2 class="brand-text">Mom Shop</h2></RouterLink>
				</li>
				<li class="nav-item nav-toggle">
					<a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"
						><i
							class="d-block d-xl-none text-primary toggle-icon font-medium-4"
							data-feather="x"
						></i
						><i
							class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary"
							data-feather="disc"
							data-ticon="disc"
						></i
					></a>
				</li>
			</ul>
		</div>
		<div class="shadow-bottom"></div>
		<div class="main-menu-content">
			<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
				<li class="nav-item" :class="{ active: route.path == '/' }">
					<RouterLink class="d-flex align-items-center" to="/"
						><i data-feather="home"></i
						><span class="menu-title text-truncate" data-i18n="Dashboard"
							>Dashboard</span
						></RouterLink
					>
				</li>
				<li class="navigation-header">
					<span data-i18n="Apps &amp; Pages">MAIN MENU</span><i data-feather="more-horizontal"></i>
				</li>
				<li class="nav-item" :class="{ active: route.path == '/produk' }">
					<RouterLink class="d-flex align-items-center" to="/produk"
						><i data-feather="grid"></i
						><span class="menu-title text-truncate" data-i18n="Produk">Produk</span></RouterLink
					>
				</li>
				<li class="nav-item" :class="{ active: route.path == '/transaksi' }">
					<RouterLink class="d-flex align-items-center" to="/transaksi"
						><i data-feather="shopping-cart"></i
						><span class="menu-title text-truncate" data-i18n="Transaksi"
							>Transaksi</span
						></RouterLink
					>
				</li>
				<li class="nav-item" :class="{ active: route.path == '/laporan' }">
					<RouterLink class="d-flex align-items-center" to="/laporan"
						><i data-feather="check-square"></i
						><span class="menu-title text-truncate" data-i18n="Laporan">Laporan</span></RouterLink
					>
				</li>
				<li class="nav-item" :class="{ active: route.path == '/profil' }">
					<RouterLink class="d-flex align-items-center" to="/profil"
						><i data-feather="user"></i
						><span class="menu-title text-truncate" data-i18n="Akun">Akun</span></RouterLink
					>
				</li>
			</ul>
		</div>
	</div>
</template>
