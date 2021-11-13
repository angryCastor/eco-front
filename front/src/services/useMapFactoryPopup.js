import { readonly, ref } from 'vue';

const isOpen = ref(false);
const areaLanLng = ref({});

const setDefaultValues = () => {
  isOpen.value = false;
  areaLanLng.value = {};
};

const open = (area) => {
  setDefaultValues();
  isOpen.value = true;
  areaLanLng.value = area;
};

const close = () => setDefaultValues();

export default () => ({
  isOpen,
  payload: readonly(areaLanLng),
  open,
  close,
});
