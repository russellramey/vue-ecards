// Vue
import Vue from 'vue'

// Components
import App from './App.vue'

// Vue Config
Vue.config.productionTip = false

// Initiate Vue instance
new Vue({
  render: h => h(App),
}).$mount('#app')
