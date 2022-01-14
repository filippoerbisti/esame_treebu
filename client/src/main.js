import Vue from 'vue';
import App from './App.vue';

import ListLands from '@/components/ListLands.vue';
import CreateLand from '@/components/CreateLand.vue';
import ViewLand from '@/components/ViewLand.vue';

import VueRouter from 'vue-router';

import axios from 'axios';

Vue.prototype.$axios = axios;

Vue.config.productionTip = false;

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    name: 'list_lands',
    component: ListLands
  },
  {
    path: '/create',
    name: 'create_land',
    component: CreateLand
  },
  {
    path: '/edit/:id',
    name: 'edit_land',
    component: CreateLand
  },
  {
    path: '/view/:id',
    name: 'view_land',
    component: ViewLand
  },
  {
    path: '',
    redirect: '/',
  }
];

const router = new VueRouter({
  mode: "history",
  routes,
});

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
