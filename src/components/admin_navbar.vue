<script lang="ts" setup="">
	import { reactive } from 'vue';
	import Modal from './modal.vue';

	const modal = reactive({
		logout: false,
	});

	function logout() {
		localStorage.removeItem('id');
		window.location.href = window.location.origin + window.location.pathname;
	}
</script>

<template>
	<form @submit.prevent="logout">
		<Modal v-model="modal.logout" title="Logout">
			Anda yakin akan logout? Sesi anda akan diakhiri!

			<template #footer>
				<button @click="modal.logout = false" class="btn" type="button">Batal</button>
				<button class="btn btn-danger" type="submit">Logout</button>
			</template>
		</Modal>
	</form>

	<nav
		class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl"
	>
		<div class="navbar-container d-flex content">
			<div class="bookmark-wrapper d-flex align-items-center">
				<ul class="nav navbar-nav d-xl-none">
					<li class="nav-item">
						<a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a>
					</li>
				</ul>
				<ul class="nav navbar-nav bookmark-icons">
					<li class="nav-item d-none d-lg-block">
						<a
							class="nav-link"
							href="app-email.html"
							data-bs-toggle="tooltip"
							data-bs-placement="bottom"
							title="Home"
							><i class="ficon" data-feather="home"></i
						></a>
					</li>
				</ul>
			</div>
			<ul class="nav navbar-nav align-items-center ms-auto">
				<li class="nav-item dropdown dropdown-user">
					<a
						class="nav-link dropdown-toggle dropdown-user-link"
						id="dropdown-user"
						href="#"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
						<div class="user-nav d-sm-flex d-none">
							<span class="user-name fw-bolder">Muhammad Izza Alfiansyah</span
							><span class="user-status">Admin</span>
						</div>
						<span class="avatar"
							><img
								class="round"
								src="https://izzaalfiansyah.vercel.app/assets/me.png"
								alt="avatar"
								height="40"
								width="40" /><span class="avatar-status-online"></span></span
					></a>
					<div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
						<a class="dropdown-item" href="/profil"
							><i class="me-50" data-feather="user"></i> Profile</a
						>
						<a class="dropdown-item" @click.prevent="modal.logout = true" href="/logout"
							><i class="me-50" data-feather="power"></i> Logout</a
						>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</template>
