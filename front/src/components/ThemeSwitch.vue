<template>
  <div class="p-2 flex align-items-center cursor-pointer">
    <div class="ml-3" @click="toggle">
      <i v-if="isDark" class="pi pi-moon text-xl"></i>
      <i v-else class="pi pi-sun text-xl"></i>
    </div>
  </div>
</template>

<script>
import useTheme from '@/services/useTheme';

export default {
  setup() {
    const { isDark, set } = useTheme();
    const toggle = () => {
      set(isDark.value ? 'saga-green' : 'vega-green');
    };

    return {
      toggle,
      isDark,
    };
  },
};
</script>
