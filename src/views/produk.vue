<script lang="ts" setup="">
	import Layout from './layout.vue';
</script>

<template>
	<Layout title="Produk">
		<div class="row">
			<div class="col-lg-2 col-md-3 col-6" v-for="item in Array(10)">
				<div class="card">
					<div class="card-body">
						<div style="height: 150px"></div>
					</div>
				</div>
			</div>
		</div>
	</Layout>
</template>
