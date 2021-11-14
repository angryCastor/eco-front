import './assets/styles/main.scss';
import 'primevue/resources/primevue.min.css';
import 'primeicons/primeicons.css';
import 'primeflex/primeflex.css';
import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import Password from 'primevue/password';
import InputSwitch from 'primevue/inputswitch';
import ToastService from 'primevue/toastservice';
import Menu from 'primevue/menu';
import Ripple from 'primevue/ripple';
import Card from 'primevue/card';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';
import Calendar from 'primevue/calendar';
import InputNumber from 'primevue/inputnumber';
import Dropdown from 'primevue/dropdown';
import ProgressBar from 'primevue/progressbar';
import ScrollPanel from 'primevue/scrollpanel';
import MultiSelect from 'primevue/multiselect';
import Dialog from 'primevue/dialog';
import Sidebar from 'primevue/sidebar';
import Tag from 'primevue/tag';
import Tooltip from 'primevue/tooltip';
import Chart from 'primevue/chart';
import ConfirmationService from 'primevue/confirmationservice';
import ConfirmDialog from 'primevue/confirmdialog';
import Textarea from 'primevue/textarea';
import TriStateCheckbox from 'primevue/tristatecheckbox';

import VueGoogleMaps from '@fawmi/vue-google-maps';
import ru from '@/utils/ru';

import App from './App.vue';
import router from './router';
import useEnv from '@/services/useEnv';

const { googleMapKey } = useEnv();

createApp(App)
  .use(router)
  .use(PrimeVue, { ripple: true, locale: ru })
  .use(ToastService)
  .use(ConfirmationService)
  .use(VueGoogleMaps, {
    load: {
      key: googleMapKey.value,
    },
  })
  .component('Button', Button)
  .component('InputText', InputText)
  .component('Password', Password)
  .component('InputSwitch', InputSwitch)
  .component('Menu', Menu)
  .component('Card', Card)
  .component('DataTable', DataTable)
  .component('Column', Column)
  .component('ColumnGroup', ColumnGroup)
  .component('Calendar', Calendar)
  .component('InputNumber', InputNumber)
  .component('Dropdown', Dropdown)
  .component('ProgressBar', ProgressBar)
  .component('ScrollPanel', ScrollPanel)
  .component('MultiSelect', MultiSelect)
  .component('Sidebar', Sidebar)
  .component('Tag', Tag)
  .component('Tag', Tag)
  .component('Chart', Chart)
  .component('Dialog', Dialog)
  .component('ConfirmDialog', ConfirmDialog)
  .component('Textarea', Textarea)
  .component('TriStateCheckbox', TriStateCheckbox)
  .directive('ripple', Ripple)
  .directive('tooltip', Tooltip)
  .mount('#app');
