import App from './App.vue';

import VueRouter from 'vue-router';

import router from '../routes/routes';


require('../bootstrap');

window.Vue = require('vue');
window.Event = new Vue();

Vue.use(VueRouter);

/**
 *  Register Our Components
 */
router.beforeEach((to, from, next) => {
	if (to.meta.requiresGuest) {
		if (window.loggedIn) {
			next({name: 'dashboard-home'});
		} else {
			next();
		}
	}

	next();
});

router.beforeEach((to, from, next) => {
	if (to.meta.requiresAuth) {
		if (window.loggedIn) {
			next();
		} else {
			next({name: 'login'});
		}
	}

	next();
});

Vue.component('dashboard', require('../views/Dashboard'));
Vue.component('project-title-form', require('../components/dashboard/elements/ProjectTitleForm'));
Vue.component('project-image-uploader', require('../components/dashboard/elements/ProjectImageUploader.vue'));
Vue.component('project-details-form', require('../components/dashboard/elements/ProjectDetailsForm.vue'));
const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
