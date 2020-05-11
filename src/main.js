import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import VueLazyload from 'vue-lazyload'
import {
  routes
} from './routes'
import {
  store
} from './store/store'
Vue.use(VueRouter);
Vue.use(VueLazyload);

Vue.component('Sidebar', require('./components/sidebar.vue').default);
Vue.component('Navbar', require('./components/navbar.vue').default);

// adding vue routes
const router = new VueRouter({
  mode: 'history',
  routes
});

//navigation guards
/*
router.beforeEach((to, from, next) => {
  //Check for requiredAuth guird
  if (to.matched.some(record => record.meta.requiresAuth)) {
    //check if not logged in
    if (!firebase.auth().currentUser) {
      //goto index
      next({
        path: '/',
        query: {
          redirect: to.fullPath
        }
      });
    } else {
      next();
    }
  }
  */
/* else if (to.matched.some(record => record.meta.requiresGuest)) {
    //Check for requiredAuth guird
    if (firebase.auth().currentUser) {
      //goto index
      next({
        path: '/',
        query: {
          redirect: to.fullPath
        }
      });
    } else {
      next();
    }
  }*/

/*    else {
    next();
  }
});
*/

Vue.config.productionTip = false


new Vue({
  el: '#app',
  store,
  render: h => h(App),
  router
})