<script lang="ts" setup>
	import './login.css';
	import { onMounted, reactive } from 'vue';
	import { notif } from '../lib';

	onMounted(() => {
		document.body.className =
			'vertical-layout vertical-menu-modern blank-page navbar-floating footer-static';
		document.body.dataset.open = 'click';
		document.body.dataset.menu = 'vertical-menu-modern';
		document.body.dataset.col = 'blank-page';
	});

	const req = reactive({
		username: '',
		password: '',
	});

	const state = reactive({
		loading: false,
	});

	function login() {
		if (req.username == 'superadmin') {
			if (req.password == 'superadmin') {
				notif.info('berhasil login');
				localStorage.setItem('id', '1');
				state.loading = true;
				setTimeout(() => {
					window.location.href = window.location.origin + window.location.pathname;
				}, 1500);
			} else {
				notif.error('password salah');
			}
		} else {
			notif.error('username tidak ditemukan');
		}
	}
</script>

<template>
	<div class="loading-screen" v-if="state.loading">Mengalihkan. Memuat....</div>
	<!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<div class="content-wrapper">
			<div class="content-header row"></div>
			<div class="content-body">
				<div class="auth-wrapper auth-basic px-2">
					<div class="auth-inner my-2">
						<!-- Login basic -->
						<div class="card mb-0">
							<div class="card-body">
								<h4 class="card-title mb-1">Selamat Datang! 👋</h4>
								<p class="card-text mb-2">Masukkan data anda untuk memulai sesi!</p>

								<form
									class="auth-login-form mt-2"
									action="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/ltr/vertical-menu-template/index.html"
									method="POST"
									@submit.prevent="login"
								>
									<div class="mb-1">
										<label for="login-email" class="form-label">Username</label>
										<input
											type="text"
											class="form-control"
											placeholder="john@example.com"
											aria-describedby="login-email"
											tabindex="1"
											autofocus
											v-model="req.username"
										/>
									</div>

									<div class="mb-1">
										<div class="d-flex justify-content-between">
											<label class="form-label" for="login-password">Password</label>
										</div>
										<div class="input-group input-group-merge form-password-toggle">
											<input
												type="password"
												class="form-control form-control-merge"
												tabindex="2"
												placeholder="********"
												aria-describedby="login-password"
												v-model="req.password"
											/>
										</div>
									</div>
									<button class="btn btn-primary w-100" type="submit" tabindex="4">Sign in</button>
								</form>

								<p class="text-center mt-2">
									<span
										>Copyright &copy;
										<a target="_blank" href="https://izzaalfiansyah.vercel.app"
											>Muhammad Izza Alfiansyah</a
										></span
									>
								</p>
							</div>
						</div>
						<!-- /Login basic -->
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
