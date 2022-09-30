<script lang="ts" setup="">
	import Layout from './layout.vue';
</script>

<template>
	<Layout title="Akun">
		<div class="card">
			<div class="card-body">
				<div class="mb-2">
					<label for="">Nama</label>
					<input type="text" class="form-control" required placeholder="Masukkan Nama" />
				</div>
				<div class="mb-2">
					<label for="">Password</label>
					<input type="password" class="form-control" required placeholder="Masukkan Password" />
					<small class="form-control-hint">Kosongkan jika tidak ingin mengganti password</small>
				</div>
				<div class="mb-2">
					<label for="">Username</label>
					<input type="text" class="form-control" required placeholder="Masukkan Username" />
				</div>
				<div class="mb-2">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div>
	</Layout>
</template>
