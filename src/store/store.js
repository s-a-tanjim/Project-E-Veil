import Vue from 'vue';
import Vuex from 'vuex';
import axiosAuth from '../api/axios_auth';
import firebaseConfig from '../firebaseConfig';

Vue.use(Vuex);

export const store = new Vuex.Store({
  state: {
    username: null,
    email: null,
    tokenId: null
  },
  getters: {},
  mutations: {},
  /* Setter */
  actions: {
    signup({
      commit
    }, authData) {
      console.log(commit);
      axiosAuth.post('signUp?key=' + firebaseConfig.apiKey, {
        email: authData.email,
        password: authData.password,
        returnSecureToken: true
      }).then(res => {
        console.log(res)
      }).catch(err => {
        console.log(err);
      })
    },
    login({
      commit
    }, authData) {
      console.log(commit);
      axiosAuth.post('signInWithPassword?key=' + firebaseConfig.apiKey, {
        email: authData.email,
        password: authData.password,
        returnSecureToken: true
      }).then(res => {
        console.log(res)
      }).catch(err => {
        console.log(err);
      })
    }
  }
});