<template>
  <div class="w-18rem h-full p-3 flex align-items-center">
    <div class="logo w-3rem">
      <InlineSvg :src="require('@/assets/svg/logo.svg')"/>
    </div>
    <div class="ml-3 text-2xl">
      ЭкоИмпериум
    </div>
  </div>
</template>

<script>
import InlineSvg from 'vue-inline-svg';

export default ({
  components: {
    InlineSvg,
  },
});
</script>

<style lang="scss" scoped>
.logo {
  transition: all .2s ease;
  fill: var(--primary-color)!important;
}
</style>
