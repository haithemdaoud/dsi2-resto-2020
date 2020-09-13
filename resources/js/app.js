import Vue from 'vue';
import router from './router';
import App from './components/App.vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import {
    faSearchPlus, faCartPlus, faShoppingCart,
    faTrashAlt, faPlusSquare, faMinusSquare,
    faInfoCircle, faArrowLeft
} from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(
    faSearchPlus, faCartPlus, faShoppingCart,
    faTrashAlt, faPlusSquare, faMinusSquare,
    faInfoCircle, faArrowLeft)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.config.productionTip = false

require('./bootstrap');

const app = new Vue({
    el: '#app',
    router,
    components: {
        App
    }
});
