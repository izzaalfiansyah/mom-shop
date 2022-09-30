<script lang="ts" setup>
	const props = defineProps(['title']);
</script>

<template>
	<div class="content-wrapper container-xxl p-0">
		<div class="content-header row">
			<div class="content-header-left col-md-9 col-12 mb-2">
				<div class="row breadcrumbs-top">
					<div class="col-12">
						<h2 class="content-header-title float-start mb-0">{{ props.title }}</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="content-body">
			<slot></slot>
		</div>
	</div>
</template>

<style scoped>
	.content-wrapper {
		animation: toLeft 0.5s ease;
	}

	@keyframes toLeft {
		0% {
			transform: translateX(-50%);
		}
	}
</style>
