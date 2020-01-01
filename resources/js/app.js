/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';

import RouteData from './route';
import StoreData from './store';

import MainApp from './components/MainApp';

import {authenticate} from './helpers/Authentication';
import {restoreSession} from './helpers/RestoreSession';

Vue.use(VueRouter);
Vue.use(Vuex);

const store  = new Vuex.Store(StoreData);
const router = new VueRouter(RouteData);

restoreSession(store, router);
authenticate(store, router);

new Vue({
    el         : '#app',
    store,
    router,
    components : {
        MainApp
    }
});
