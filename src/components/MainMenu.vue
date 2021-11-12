<template>
  <div class="menu">
    <div
      v-for="item in items"
      :key="item.label"
      class="menu__item p-3 flex p-ripple cursor-pointer align-items-center"
      :class="{
        'pointer-events-none': item.selected
      }"
      @click="item.command"
      v-ripple
    >
      <div class="menu__item-icon">
        <i
          class="pi text-xl"
          :class="[item.icon]"
        ></i>
      </div>
      <div class="menu__item-label text-lg ml-3">
        {{item.label}}
      </div>
    </div>
  </div>
</template>

<script>
import { computed } from 'vue';

export default {
  setup() {
    const items = computed(() => []);

    return {
      items,
    };
  },
};
</script>

<style lang="scss">
.menu {
  &__item {
    border-bottom: 1px solid var(--surface-d);
  }

  .p-ink {
    background: var(--primary-color);
  }
}
</style>
