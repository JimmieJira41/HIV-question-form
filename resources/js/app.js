require('./bootstrap');

import Vue from 'vue'
import App from './components/app'
import questionnaire from './components/questionnaire'
import summary from './components/summaryPoint'
import informationUser from './components/informationUser'
import VueRouter from 'vue-router';
//BootstrapVue
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// SweetAlert
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

// Font Awesome Icon
import { library } from '@fortawesome/fontawesome-svg-core'
import { faAddressCard, faClipboard, faHeart, faExternalLinkAlt, faTable, faSyringe} from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// DataTable
import DataTable from "@andresouzaabreu/vue-data-table";
import "bootstrap/dist/css/bootstrap.min.css";
import "@andresouzaabreu/vue-data-table/dist/DataTable.css";

library.add(faAddressCard, faClipboard, faHeart, faExternalLinkAlt, faTable, faSyringe)

Vue.use(VueRouter)
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(VueSweetalert2);
Vue.component("data-table", DataTable);
Vue.component('font-awesome-icon', FontAwesomeIcon)

const router = new VueRouter({
        mode: 'history',
        routes: [
            {
                path: '/',
                name: 'questionnaire',
                component: questionnaire
            },
            {
                path: '/summary/:id',
                name: 'summary',
                component: summary
            },
            {
                path: '/information-user',
                name: 'information-user',
                component: informationUser
            },
        ],
    });

  const app = new Vue({
    el: '#app',
    components: { App },
    router,
});

