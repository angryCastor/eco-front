import { computed, ref } from 'vue';

const googleMapKey = ref(process.env.VUE_APP_MAP_GOOGLE_KEY);
const apiUrl = ref(process.env.VUE_APP_API_URL);
const isProduction = ref(process.env.NODE_ENV === 'production');
const isDevelopment = computed(() => !isProduction.value);
const isMock = ref(process.env.VUE_APP_USE_MOCK === 'true');

export default () => ({
  googleMapKey,
  apiUrl,
  isDevelopment,
  isProduction,
  isMock,
});
