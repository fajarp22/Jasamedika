import Vue from 'vue';
import axios from 'axios';
import KelurahanComponent from './components/KelurahanComponent.vue';
import PasienComponent from './components/PasienComponent.vue';

Vue.prototype.$http = axios;

new Vue({
  el: '#app',
  components: {
    'kelurahan-component': KelurahanComponent,
    'pasien-component': PasienComponent
  }
});
