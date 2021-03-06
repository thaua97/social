// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import Vuex from 'vuex'
import App from './App'
import router from './router'
import axios from 'axios'
Vue.use(Vuex)

Vue.config.productionTip = false
Vue.prototype.$http = axios
Vue.prototype.$urlAPI = 'http://127.0.0.1:8000/api/'

var store = {
  state: {
    user: sessionStorage.getItem('usuario') ? JSON.parse(sessionStorage.getItem('usuario')) : null,
    timeLine: [],
  },
  getters: {
    getUser: state =>{
      return state.user
    },
    getToken: state =>{
      return state.user.token
    },
    getTimeLine: state => {
      return state.timeLine
    }
  },
  mutations: {
    setUser(state, n){
      state.user = n
    },
    setTimeLine(state, n){
      state.timeLine = n
    },
    setContentTimeLine(state, list){
      for (let item of list) {
       state.timeLine.push(item)
      }
    }
  }
}

Vue.directive('scroll', {
  inserted: function (el, binding) {
    let f = function (evt) {
      if (binding.value(evt, el)) {
        window.removeEventListener('scroll', f)
      }
    }
    window.addEventListener('scroll', f)
  }
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  store: new Vuex.Store(store),
  router,
  components: { App },
  template: '<App/>'
})
