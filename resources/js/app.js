

require('./bootstrap');

window.Vue = require('vue');


import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Mysidebar from'./components/global/Mysidebar'
import routes from'./routes'

const router = new VueRouter({
    mode:'history',
    routes
})

Vue.config.productionTip = false;

const app = new Vue({
    el: '#app',
    router,
    components:{
        Mysidebar
    }
});


