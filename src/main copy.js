import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import VueLazyload from 'vue-lazyload'
import firebase from 'firebase'
import {
  store
} from './store/store'
Vue.use(VueRouter);
Vue.use(VueLazyload);

// Initialize firebase
require('./firebaseInit');

Vue.component('Sidebar', require('./components/sidebar.vue').default);
Vue.component('Navbar', require('./components/navbar.vue').default);

// adding vue routes
window.GLOBAL_VALUE = require("./routes_");
//console.log(window.GLOBAL_VALUE);
const routes = [];

//adding nav link
window.GLOBAL_VALUE.variable.nav.forEach(element => {
  let lazyLoad = () => import(element.import+'')
  let get = {
    path: element.path + "",
    component: lazyLoad,
    meta: element.meta
  };
  routes.push(get);
});
// adding sidebar link
window.GLOBAL_VALUE.variable.sidebar.forEach(element => {
  let lazyLoad = () => import(element.import+'')
  let get = {
    path: element.path + "",
    component: lazyLoad,
    meta: element.meta
  };
  routes.push(get);
});

// Adding message with props
let lazyLoadMessage = () => import('./components/message/message_main');
let get = {
  path: "/message/:id/:prev/",
  component: lazyLoadMessage,
  meta: {
    requiresAuth: true
  },
  props: true
};
routes.push(get);

// For 404 Not found page
import NotFound from './components/not_found404';
routes.push({
  path: '/*',
  component: NotFound
});

const router = new VueRouter({
  mode: 'history',
  routes
});



//navigation guards
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
  else {
    next();
  }
});

Vue.config.productionTip = false


let vueApp;
firebase.auth().onAuthStateChanged(() => {
  if (!vueApp) {
    vueApp = new Vue({
      store,
      render: h => h(App),
      router
    }).$mount('#app')
  }
})