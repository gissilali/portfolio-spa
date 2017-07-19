<template>
	<div class="ui stackable three column grid ">
		<div class="three wide column" v-for="(project, i) in projects">
			<div class="ui card fluid">
			  <div class="image">
			    <img :src="project.image">
			  </div>
			  <div class="content">
			    <a class="header">{{project.title}}</a>
			    <div class="meta">
			      <span class="date">{{project.date}}</span>
			    </div>
			  </div>
			  <div class="extra content">
			    <a>
			      <i class="user icon"></i>
			      22 Friends
			    </a>
			  </div>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		data(){
			return {
				projects: [
					{
						title: 'Title',
						image: 'http://localhost:8000/images/image.png',
						date: '12th Oct 2012',
					},
					{
						title: 'Title Good',
						image: 'http://localhost:8000/images/image.png',
						date: '12th Oct 2012',
					},
					{
						title: 'Title2',
						image: 'http://localhost:8000/images/image.png',
						date: '12th Oct 2012',
					},

				]
			}
		}
	}
</script>
<style scoped>
	.column{
		padding:20px;
	}
</style>