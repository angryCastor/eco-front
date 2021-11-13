import { computed } from 'vue';
import tinycolor from 'tinycolor2';
import useTheme from '@/services/useTheme';

const { isDark } = useTheme();

const success = computed(() => (isDark.value ? tinycolor('#C5E1A5') : tinycolor('#689F38')));
const warning = computed(() => (isDark.value ? tinycolor('#FFE082') : tinycolor('#FBC02D')));
const help = computed(() => (isDark.value ? tinycolor('#CE93D8') : tinycolor('#9C27B0')));
const danger = computed(() => (isDark.value ? tinycolor('#F48FB1') : tinycolor('#D32F2F')));
const info = computed(() => (isDark.value ? tinycolor('#81D4FA') : tinycolor('#0288D1')));

export default () => ({
  success,
  warning,
  help,
  danger,
  info,
});
