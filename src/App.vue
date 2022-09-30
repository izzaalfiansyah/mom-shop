<script setup lang="ts">
	import Login from './components/login.vue';
	import Admin from './components/admin.vue';

	const isLogin = localStorage.getItem('id') ? true : false;
</script>

<template>
	<Admin v-if="isLogin"></Admin>
	<Login v-else></Login>
</template>
