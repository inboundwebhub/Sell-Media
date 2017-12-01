import Vue from 'vue'
import VueCookie from 'vue-cookie'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import Vuex from 'vuex'

// use vue plugins
Vue.use( Vuex )
Vue.use( VueRouter )
Vue.use( VueResource )
Vue.use( VueCookie )

// import all vue components
// import FilteredItems from './components/FilteredItems.vue'
// Vue.component( 'FilteredItems', FilteredItems )
import Lightbox from '../components/Lightbox.vue'

// create main vue component
const App = Vue.extend( {
	template: '<main><router-view></router-view></main>',
	computed: {
	}
} );

// define route for vue app
// ref : http://router.vuejs.org/en/
const router = new VueRouter( {
	mode: 'history',
	routes: [

		{ path: '/sell-media-lightbox', name: 'lightbox', component: Lightbox },
		// { path: '/blog/:name', name: 'post', component: post },
		// { path: '/', redirect: '/blog' },

	]
} );

// Init Vue
window.onload = function () {
	new Vue({
		el: '#app',
		router,
		render: h => h(Lightbox)
	})
}

Vue.config.debug = true;
Vue.config.devTools = true;