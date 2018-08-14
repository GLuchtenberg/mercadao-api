require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import routes from './routes/main';
import MainApp from './components/Main';
import storeData from './store';
Vue.use(VueRouter);
Vue.use(Vuex);

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

const router = new VueRouter({
    routes,
    mode: 'history'
})

const store = new Vuex.Store(
    storeData
)


const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        MainApp
    }
});
