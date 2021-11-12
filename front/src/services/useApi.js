import axios from 'axios';
import applyCaseMiddleware from 'axios-case-converter';
import useEnv from '@/services/useEnv';

const { apiUrl } = useEnv();

const baseUrl = apiUrl.value;
let token = '';

const instance = applyCaseMiddleware(axios.create({
  baseURL: baseUrl,
}));

const setToken = (val) => {
  token = val;
};

export default () => {
  const getConfig = (config) => {
    const newConfig = config ?? {
      headers: {},
    };

    if (token) {
      newConfig.headers.Authorization = `Bearer ${token}`;
    }

    return newConfig;
  };

  const get = (url, config) => instance.get(url, getConfig(config));
  const post = (url, data, config) => instance.post(url, data, getConfig(config));

  return {
    setToken,
    get,
    post,
  };
};
