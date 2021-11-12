import { computed, readonly } from 'vue';
import { useStorage } from '@vueuse/core';

const theme = useStorage('theme', 'saga-green');
const isDark = computed(() => theme.value === 'vega-green');

const init = () => {
  const themeElement = document.getElementById('theme-link');
  themeElement.setAttribute('href', `/${theme.value}.css`);
};

const set = (val) => {
  theme.value = val;
  const themeElement = document.getElementById('theme-link');
  themeElement.setAttribute('href', `/${val}.css`);
};

export default () => ({
  theme: readonly(theme),
  isDark,
  set,
  init,
});
