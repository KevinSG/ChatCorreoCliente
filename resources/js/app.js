/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import store from './store'
import Multiselect from 'vue-multiselect'
import VueSocketIO from 'vue-socket.io'
// import 'vuetify/dist/vuetify.min.css'
// import 'material-design-icons-iconfont/dist/material-design-icons.css'

window.Vue = require('vue');
// window.Vuetify = require('vuetify');
Vue.use(new VueSocketIO({
    debug: true,
    connection: 'localhost:8890',
    vuex: {
        store,
        actionPrefix: 'SOCKET_',
        mutationPrefix: 'SOCKET_'
    }
}))

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('multiselect', Multiselect)
Vue.component('privatemessageinbox', require('./components/chat/PrivateMessageInbox.vue').default);
Vue.component('private-message-sidebar', require('./components/chat/PrivateMessageSidebar.vue').default);
Vue.component('privatemessagecompose', require('./components/chat/PrivateMessageCompose.vue').default);
Vue.component('privatemessagesent', require('./components/chat/PrivateMessageSent.vue').default);
Vue.component('privatemessageview', require('./components/chat/PrivateMessageView.vue').default);
Vue.component('prueba', require('./components/chat/PrivateMessageNotificationDropdown.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 window.onload = function () {
//     const app = new Vue({
//         el: '#app'
//     });
//     
		 new Vue({
			store,
			// render: h => h(App)
		}).$mount('#app')
}




// const app = new Vue({
//     el: '#app',
// });
