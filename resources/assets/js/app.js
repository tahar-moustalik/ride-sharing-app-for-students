
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//import PrivateMessageInbox from //'./components/private-message/PrivateMessageInbox'
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('PrivateMessageInbox', require('./components/private-message/PrivateMessageInbox'));
Vue.use(VueRouter)

const NotFound = {
    template: '<p>Page not found</p>'
}
const Home = {
    template: '<p>home page</p>'
}
const About = {
    template: '<p>about page</p>'
}
const routes = [{
            '/about': About
        }]

/*const router = new VueRouter({
    mode : 'history',
    routes
})*/

const app = new Vue({
    el: '#app',
    data: {
        currentRoute: window.location.pathname
    },
    computed: {
        ViewComponent() {
            return routes[this.currentRoute] || NotFound
        }
    },
    render(h) {
        return h(this.ViewComponent)
    }
})
