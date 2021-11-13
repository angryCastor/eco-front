<template>
  <div>
    <MultiSelect
      v-model="selected"
      :options="items"
      :placeholder="placeholder"
      class="multiselect-custom">
      <template #value="slotProps">
        <div
          v-for="(option) in slotProps.value"
          :key="option"
          class="country-item country-item-value align-items-center border-1 border-primary"
        >
          <div class="ml-1">{{option.label}}</div>
        </div>
        <template v-if="!slotProps.value || slotProps.value.length === 0">
          {{placeholder}}
        </template>
      </template>
      <template #option="slotProps">
        <div class="flex align-items-center">
          <div class="ml-1">{{slotProps.option.label}}</div>
        </div>
      </template>
    </MultiSelect>
  </div>
</template>

<script>
import useMapObjects from '@/services/useMapObjects';

export default {
  props: {
    type: {
      type: String,
      default: 'register',
    },
    items: {
      type: Array,
      default: () => [],
    },
    placeholder: {
      type: String,
      default: 'Выберите значение',
    },
  },
  setup(props) {
    const { registerFilter, reasonFilter } = useMapObjects();

    let selected = null;
    if (props.type === 'register') {
      selected = registerFilter;
    } else {
      selected = reasonFilter;
    }

    return {
      selected,
    };
  },
};
</script>
