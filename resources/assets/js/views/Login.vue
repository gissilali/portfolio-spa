<template>
    <div class="container center-form login-modal">
        <div class="ui card centered">
            <div class="ui top attached label">
                <h5>Login</h5>
            </div>
            <form action="" class="ui form" @submit.prevent="handleLogin">
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" placeholder="email" v-model="fields.email">
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" placeholder="password" v-model="fields.password">
                </div>
                <div class="field">
                    <button class="ui bottom button green" :class="{ loading : isProcessing }">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import router from '../routes/routes';

    export default {
    	mounted(){
    		console.log('Login');
    	},

        data(){
            return {
                isProcessing: false,
                fields: {
                    email: 'silali@mail.com',
                    password: 'password'
                }
            }
        },

        methods: {
            handleLogin(){
                var context = this;
                context.isProcessing = true;
                axios.post('/admin/login',{
                    email: context.fields.email,
                    password: context.fields.password,
                })
                .then(function(response){
                    console.log(response.data);
                    var authInfo = JSON.stringify(response.data);
                    window.localStorage.setItem('user', authInfo);
                    var loggedIn = JSON.parse(window.localStorage.getItem('user')).loggedIn;
                    if (loggedIn) {
                        context.$router.push({name: 'dashboard-home'});
                    } else {
                        context.$router.push({name: 'login'});
                    }
                })
                .catch(function(){

                })
                context.isProcessing = false;
            }
        }
    }
</script>
<style scoped>
    .center-form{
    	display: flex;
		justify-content: center;
		align-items: center;
		padding-top:12.5%;
        padding-bottom: 12.5%;
    }
    .panel{
    	vertical-align: middle;
    }
    .form{
        padding:15px;
    }
    .login-modal{
        position: absolute;
        top:0;
        left:0;
        bottom:0;
        right: 0;
        background:#f5f5f5;
        z-index:1000;
    }
</style>
