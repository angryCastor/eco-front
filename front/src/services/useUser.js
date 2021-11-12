import { readonly, ref } from 'vue';
import useApi from '@/services/useApi';

const user = ref(null);

const load = async () => {
  const { get } = useApi();
  const response = await get('me');
  user.value = response.data;
};

const set = (val) => { user.value = val; };

export default () => ({
  load,
  set,
  user: readonly(user),
});
