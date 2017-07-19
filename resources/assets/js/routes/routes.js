import VueRouter from 'vue-router';

/**
 * Import Components
 */
import Dashboard from '../views/Dashboard';
import Login from '../views/Login';
import ProjectsGrid from '../components/dashboard/modules/ProjectsGrid.vue';
import ProjectForm from '../components/dashboard/modules/ProjectForm.vue';

const routes = [
	{
		path: '/admin',
		component: Dashboard,
		name:'dashboard-home',
		meta: {
			requiresAuth: true
		},
		children: [
	        {
	          path: 'projects',
	          component: ProjectsGrid,
	          name: 'projects'
	        },
	        {
		        path: 'create-project',
		        component: ProjectForm,
		        name: 'create-project'
	        }
        ]
	},

	{
		path: '/admin/login',
		component: Login,
		name:'login',
		meta: {
			requiresGuest: true
		}
	}
]

export default new VueRouter({
	mode: 'history',
	routes
});