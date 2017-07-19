<template>
	<transition name="slide">
		<router-view></router-view>
	</transition>
</template>
<script>
	export default {
		mounted() {
			console.log('Ap mounted')
		},

		data(){
			return {

			}
		}
	}
</script>
<style>
	.slide-enter-active {
		  transition: all .3s ease;
		}
		.slide-leave-active {
		  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
		}
		.slide-enter, .slide-leave-to {
		  transform: translateX(10px);
		  opacity: 0;
		}
</style>