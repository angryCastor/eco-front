<template>
  <div class="logo" >
    <InlineSvg :src="require('@/assets/svg/logo.svg')"/>
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
