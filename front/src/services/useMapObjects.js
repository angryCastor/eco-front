import { computed, ref } from 'vue';
import getNameByReasonSearching from '@/utils/getNameByReasonSearching';
import useApi from '@/services/useApi';

const getDefaultRegisterFilter = () => [
  {
    label: 'Стоит на учете',
    value: 'register',
  },
  {
    label: 'Не стоит на учете',
    value: 'unregister',
  },
];

const getDefaultReasonFilter = () => [
  {
    label: getNameByReasonSearching('okved'),
    value: 'okved',
  },
  {
    label: getNameByReasonSearching('emissions'),
    value: 'emissions',
  },
  {
    label: getNameByReasonSearching('waste'),
    value: 'waste',
  },
  {
    label: getNameByReasonSearching('metal'),
    value: 'metal',
  },
  {
    label: 'Нет данных',
    value: 'empty',
  },
];

const registerFilter = ref(getDefaultRegisterFilter());
const reasonFilter = ref(getDefaultReasonFilter());

const factories = ref([]);

const resetFilters = () => {
  registerFilter.value = getDefaultRegisterFilter();
  reasonFilter.value = getDefaultReasonFilter();
};

const factoriesFiltered = computed(() => factories.value.filter((item) => {
  const register = registerFilter.value.map((e) => e.value);
  const reason = reasonFilter.value.map((e) => e.value);

  if (register.length === 0) {
    return false;
  }

  if (item.isRegistered) {
    return register.includes('register');
  }

  if (!register.includes('unregister')) {
    return false;
  }

  if (reason.includes('empty') && item.reasonSearching.length === 0) {
    return true;
  }

  // eslint-disable-next-line no-plusplus
  for (let i = 0; i < reason.length; i++) {
    if (item.reasonSearching.includes(reason[i])) {
      return true;
    }
  }

  return false;
}));

const load = async () => {
  const { get } = useApi();
  factories.value = (await get('factories-map')).data;
};

export default () => ({
  factories,
  factoriesFiltered,
  resetFilters,
  registerFilter,
  reasonFilter,
  getDefaultRegisterFilter,
  getDefaultReasonFilter,
  load,
});
