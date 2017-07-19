<template>
	<div class="ui menu">
		<div class="item">
			<button class="ui primary button menu-button green"><small>MENU</small></button>
		</div>
		<div class="item">
			<router-link :to="{name: 'create-project'}" tag="button" class="ui primary button">
				Create New Project
			</router-link>
		</div>
		<router-link :to="{name: 'projects'}" class="item">
	    	Projects
		</router-link>
		<a class="item">
	    	Friends
		</a>
		<div class="right menu">
			<div class="item">
			    <div class="ui icon input">
			      <input placeholder="Search project" type="text">
			      <i class="search icon"></i>
			    </div>
			</div>
			<div class="item">
				<img src="" style="max-width:30px">
				</div>
			<a class="ui item" @click.prevent="handleLogout">
		      	<i class="icon power red"></i>
			</a>
		</div>
	</div>
</template>
<script>
	export default {
		methods: {
			handleLogout(){
				var context = this;
				axios.post('/logout')
				.then(function(response){
					console.log(response.data);
                    var authInfo = JSON.stringify(response.data);
                    window.localStorage.setItem('user', authInfo);
                    var loggedIn = JSON.parse(window.localStorage.getItem('user')).loggedIn;
                    console.log(loggedIn);
                    if (loggedIn) {
                        context.$router.push({name: 'dashboard-home'});
                    } else {
                        context.$router.push({name: 'login'});
                    }
				})
				.catch(function(){

				})
			}
		}
	}
</script>
<styles></styles>