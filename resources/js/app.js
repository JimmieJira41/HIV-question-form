
require('./bootstrap');


import Vue from 'vue'
import App from './components/app'
// Font Awesome Icon
import { library } from '@fortawesome/fontawesome-svg-core'
import { faAddressCard, faClipboard } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faAddressCard, faClipboard)

Vue.component('font-awesome-icon', FontAwesomeIcon)

const app = new Vue({
    el: '#app',
    components: { App }
});
