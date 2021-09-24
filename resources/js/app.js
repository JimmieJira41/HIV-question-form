
require('./bootstrap');


import Vue from 'vue'
import App from './components/app'

//BootstrapVue
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// SweetAlert
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

// Font Awesome Icon
import { library } from '@fortawesome/fontawesome-svg-core'
import { faAddressCard, faClipboard } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faAddressCard, faClipboard)

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(VueSweetalert2);

Vue.component('font-awesome-icon', FontAwesomeIcon)

const app = new Vue({
    el: '#app',
    components: { App }
});
