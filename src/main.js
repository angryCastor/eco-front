import './assets/styles/main.scss';
import 'primevue/resources/themes/saga-blue/theme.css';
import 'primevue/resources/primevue.min.css';
import 'primeicons/primeicons.css';
import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import VueGoogleMaps from '@fawmi/vue-google-maps';
import App from './App.vue';
import router from './router';

import useEnv from '@/services/useEnv';

const { googleMapKey } = useEnv();

createApp(App)
  .use(router)
  .use(PrimeVue, { ripple: true })
  .use(VueGoogleMaps, {
    load: {
      key: googleMapKey.value,
    },
  })
  .mount('#app');
