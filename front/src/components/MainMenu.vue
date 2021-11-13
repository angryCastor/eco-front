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
import { useRoute, useRouter } from 'vue-router';

export default {
  setup() {
    const route = useRoute();
    const router = useRouter();

    const items = computed(() => [
      {
        icon: 'pi-map',
        label: 'Карта',
        selected: route.name === 'map',
        command: () => router.push({
          name: 'map',
        }),
      },
      {
        icon: 'pi-table',
        label: 'Предприятия',
        selected: route.name === 'factories',
        command: () => router.push({
          name: 'factories',
        }),
      },
      {
        icon: 'pi-external-link',
        label: 'RestAPI',
        selected: false,
        command: () => window.open(
          'https://app.swaggerhub.com/apis-docs/angryCastor/eco_imperium/1.0.0',
          '_blank',
        ).focus(),
      },
    ]);

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
