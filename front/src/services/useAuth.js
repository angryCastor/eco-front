import {
  computed, readonly, ref,
} from 'vue';
import { useCookies } from '@vueuse/integrations';
import useApi from '@/services/useApi';
import useUser from '@/services/useUser';

const isLoading = ref(false);
const token = ref('');
const isAuth = computed(() => !!(token.value));

const init = async () => {
  const cookies = useCookies(['token']);
  const cookieToken = cookies.get('token');

  if (cookieToken) {
    const { get, setToken } = useApi();
    setToken(cookieToken);
    try {
      const data = await get('me');
      const { set } = useUser();
      set(data.data);
      token.value = cookieToken;
    } catch (e) {
      setToken('');
    }
  }
  isLoading.value = true;
};

const login = async ({
  name,
  password,
  onSuccess,
  onError,
}) => {
  const { post, setToken } = useApi();
  const { load } = useUser();
  try {
    const response = await post('login', {
      login: name,
      password,
    });
    setToken(response.data.token);
    await load();
    token.value = response.data.token;
    const cookies = useCookies(['token']);
    cookies.set('token', response.data.token);
    if (onSuccess) {
      onSuccess(response.data);
    }
  } catch (e) {
    if (onError) {
      onError(e.response.data);
    }
  }
};

const logout = () => {
  const { setToken } = useApi();
  const cookies = useCookies(['token']);
  setToken('');
  token.value = '';
  cookies.remove('token');
};

export default () => ({
  isLoading,
  isAuth,
  token: readonly(token),
  init,
  login,
  logout,
});
