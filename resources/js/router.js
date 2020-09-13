import Vue from 'vue';
import VueRouter from 'vue-router';
import OderIndex from './views/OrderIndex.vue';
import CartContent from './views/CartContent.vue';
import MealDetails from './views/MealDetails.vue';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/order/index', name: 'orderIndex', component: OderIndex },
        { path: '/order/cart',name: 'cartContent', component: CartContent },
        { path: '/order/meal/:id', name: 'mealDetails', component: MealDetails },
    ],
    mode: 'history'
});