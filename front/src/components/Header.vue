<template>
  <div class="flex align-items-center justify-content-between pr-3">
    <LogoHeader />
    <div class="left-header flex align-items-center">
      <div class="theme-switch mr-3">
        <ThemeSwitch />
      </div>
    </div>
  </div>
</template>
<script>
import LogoHeader from '@/components/LogoHeader.vue';
import ThemeSwitch from '@/components/ThemeSwitch.vue';

export default {
  components: { ThemeSwitch, LogoHeader },
  setup() {
    return {};
  },
};
</script>
