<template>
	<div class="">
		<sidebar></sidebar>
		<div class="pusher">
			<main-menu></main-menu>
			<router-view></router-view>
		</div>
	</div>
</template>
<script>
	import Sidebar from '../components/dashboard/modules/Sidebar.vue';
	import MainMenu from '../components/dashboard/modules/MainMenu.vue';

	export default {
		components: {
			Sidebar,
			MainMenu,
		},

		mounted(){
		    	if(this.$route.name == 'dashboard-home'){
                    this.$router.push({name: 'projects'});
                } else {
		    	    this.$router.push(this.$route.path);
				}
		}
	}
</script>
<style></style>