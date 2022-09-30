<script lang="ts" setup="">
	import { ref } from 'vue';

	const props = defineProps(['modelValue', 'title']);
	const emits = defineEmits(['update:modelValue']);

	const element = ref(null);

	function close() {
		emits('update:modelValue', false);
	}

	function handleClick(e: any) {
		if (e.path.indexOf(element.value) < 0) {
			close();
		}
	}
</script>

<template>
	<div
		class="modal fade"
		:class="{ show: props.modelValue }"
		id="exampleModalScrollable"
		tabindex="-1"
		aria-labelledby="exampleModalScrollableTitle"
		aria-hidden="true"
		@click="handleClick"
	>
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content" ref="element">
				<div class="modal-header" v-if="props.title">
					<h5 class="modal-title" id="exampleModalScrollableTitle">{{ props.title }}</h5>
					<button type="button" class="btn-close" aria-label="Close" @click="close"></button>
				</div>
				<div class="modal-body">
					<slot></slot>
				</div>
				<div class="modal-footer" v-if="$slots.footer">
					<slot name="footer"></slot>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped>
	.show {
		display: block;
		background: rgb(0, 0, 0, 0.25);
	}
</style>
