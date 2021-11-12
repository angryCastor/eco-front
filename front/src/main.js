import './assets/styles/main.scss';
import 'primevue/resources/primevue.min.css';
import 'primeicons/primeicons.css';
import 'primeflex/primeflex.css';
import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import ToastService from 'primevue/toastservice';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import Password from 'primevue/password';

import VueGoogleMaps from '@fawmi/vue-google-maps';
import App from './App.vue';
import router from './router';

import useEnv from '@/services/useEnv';

const { googleMapKey } = useEnv();

createApp(App)
  .use(router)
  .use(PrimeVue, { ripple: true })
  .use(ToastService)
  .use(VueGoogleMaps, {
    load: {
      key: googleMapKey.value,
    },
  })
  .component('Button', Button)
  .component('InputText', InputText)
  .component('Password', Password)
  .mount('#app');
