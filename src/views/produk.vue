<script lang="ts" setup="">
	import { onMounted, reactive, ref } from 'vue';
	import { http, notif, formatMoney, readFile } from '../lib';
	import Layout from './layout.vue';
	import Modal from '../components/modal.vue';

	export interface Produk {
		id?: number;
		nama?: string;
		foto?: string;
		stok?: number;
		harga?: number;
		fotoUrl?: string;
	}

	const req = ref<Produk>({});
	const items = ref<Array<Produk>>([]);

	const state = reactive({
		isEdit: false,
		items,
		req,
		totalCount: 0,
		modal: {
			save: false,
			delete: false,
		},
	});

	function nullable() {
		state.req = {};
	}

	function get() {
		nullable();
		http
			.get('/produk')
			.then((res) => {
				// state.data.totalCount = res.
				state.items = res.data;
			})
			.catch((err) => {
				notif.error(err);
			});
	}

	function save() {
		state.isEdit
			? http
					.put('/produk/' + state.req.id, state.req)
					.then((res) => {
						notif.success('data berhasil disimpan');
						state.modal.save = false;
						get();
					})
					.catch((err) => {
						notif.error(err);
					})
			: http
					.post('/produk', state.req)
					.then((res) => {
						notif.success('data berhasil disimpan');
						state.modal.save = false;
						get();
					})
					.catch((err) => {
						notif.error(err);
					});
	}

	function handleFotoChange(e: any) {
		readFile(e.currentTarget.files[0]).then((res) => {
			state.req.foto = res as string;
			state.req.fotoUrl = res as string;
		});
	}

	function destroy() {
		http
			.delete('/produk/' + state.req.id)
			.then((res) => {
				notif.success('data berhasil dihapus');
				state.modal.delete = false;
				get();
			})
			.catch((err) => {
				notif.error(err);
			});
	}

	onMounted(() => {
		get();
	});
</script>

<template>
	<Layout title="Produk">
		<div class="card">
			<div class="card-body">
				<button
					class="btn btn-primary"
					@click="
						nullable();
						state.isEdit = false;
						state.modal.save = true;
					"
				>
					+ Tambah
				</button>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-md-3 col-6" v-for="item in state.items">
				<div
					class="card produk-card"
					style="overflow: hidden"
					@click="
						state.req = item;
						state.req.foto = '';
						state.isEdit = true;
						state.modal.save = true;
					"
				>
					<img :src="item.fotoUrl" alt="" class="card-img produk-img" />
					<div class="card-body">
						<div class="text-center">
							<div class="text-truncate">
								<strong>
									{{ item.nama }}
								</strong>
							</div>
							<div>
								<small class="text-primary">{{ formatMoney(item.harga) }}</small>
							</div>
							<div>
								<small>Stok: {{ item.stok }}</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</Layout>
	<form @submit.prevent="save">
		<Modal v-model="state.modal.save" :title="state.isEdit ? 'Edit Produk' : 'Tambah Produk'">
			<div class="mb-2">
				<label for="">Nama</label>
				<input
					type="text"
					class="form-control"
					placeholder="Masukkan Nama"
					required
					v-model="state.req.nama"
				/>
			</div>
			<div class="mb-2">
				<label for="">Stok</label>
				<input
					type="number"
					class="form-control"
					placeholder="Masukkan Stok"
					required
					v-model="state.req.stok"
				/>
			</div>
			<div class="mb-2">
				<label for="">Harga</label>
				<input
					type="number"
					class="form-control"
					placeholder="Masukkan Harga"
					required
					v-model="state.req.harga"
				/>
			</div>
			<div class="mb-2">
				<label for="">Foto</label>
				<input type="file" class="form-control" title="Pilih Harga" @change="handleFotoChange" />
			</div>

			<div class="mb-2" v-if="state.req.foto">
				<div class="card">
					<div class="card-body">
						<img :src="state.req.fotoUrl" style="max-width: 100%" alt="" />
					</div>
				</div>
			</div>

			<template #footer>
				<button
					v-if="state.isEdit"
					type="button"
					class="btn btn-danger"
					@click="
						state.modal.save = false;
						state.modal.delete = true;
					"
				>
					Hapus
				</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</template>
		</Modal>
	</form>

	<form @submit.prevent="destroy">
		<Modal v-model="state.modal.delete" title="Hapus Produk">
			Anda yakin menghapus produk <strong>{{ state.req.id }}</strong>

			<template #footer>
				<button type="submit" class="btn btn-danger">Hapus</button>
			</template>
		</Modal>
	</form>
</template>

<style scoped>
	.produk-img {
		height: 180px;
		object-fit: cover;
		transition: 0.3s;
	}

	.produk-card {
		cursor: pointer;
		transition: 0.3s;
	}

	.produk-card:hover {
		transform: translateY(-10px) scale(105%);
	}
</style>
