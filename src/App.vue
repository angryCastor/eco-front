<template>
  <Default>
    <div class="layout">
      <div class="layout__header">
        <Header/>
      </div>
      <div class="layout__menu">
        <MainMenu/>
      </div>
      <div class="layout__content">
        <router-view/>
      </div>
    </div>
  </Default>
</template>
<script>
import Default from '@/layouts/Default.vue';
import Header from '@/components/Header.vue';
import MainMenu from '@/components/MainMenu.vue';

export default {
  components: { MainMenu, Header, Default },
};
</script>

<style lang="scss" scoped>
  .layout {
    $header_height: 5rem;
    $menu_width: 18rem;
    height: 100vh;
    width: 100%;
    position: relative;

    &__header {
      width: 100%;
      position: fixed;
      top: 0;
      left: 0;
      height: $header_height;
      background-color: var(--surface-a);
      border-bottom: 1px solid var(--surface-d);
    }

    &__menu {
      top: $header_height;
      height: calc(100% - #{$header_height});
      width: $menu_width;
      background-color: var(--surface-a);
      position: fixed;
      border-right: 1px solid var(--surface-d);
    }

    &__content {
      position: fixed;
      top: $header_height;
      left: $menu_width;
      width: calc(100% - #{$menu_width});
      height: calc(100% - #{$header_height});
      background-color: var(--surface-b);
    }
  }
</style>
