<template>
  <div>
    <div class="mb-2">
      <MapSelect
        :items="register"
        type="register"
        placeholder="Наличие в реестре в НВОС"/>
    </div>
    <div v-if="isShowReasonTypes" class="mb-2">
      <MapSelect
        :items="reason"
        type="reason"
        placeholder="Потецеально вредный род деятельности"/>
    </div>
    <div class="mb-2">
      <Button label="Сбросить" @click="resetFilters"/>
    </div>
  </div>
</template>

<script>
import { computed } from 'vue';
import MapSelect from '@/components/MapSelect.vue';
import useMapObjects from '@/services/useMapObjects';

export default {
  components: { MapSelect },
  setup() {
    const {
      resetFilters,
      registerFilter,
      getDefaultRegisterFilter,
      getDefaultReasonFilter,
    } = useMapObjects();

    const isShowReasonTypes = computed(() => registerFilter.value.map((e) => e.value).includes('unregister'));

    const register = getDefaultRegisterFilter();
    const reason = getDefaultReasonFilter();

    return {
      register,
      reason,
      resetFilters,
      isShowReasonTypes,
    };
  },
};
</script>

<style lang="scss" scoped>
::v-deep(.multiselect-custom) {
  .p-placeholder {
    height: 100%;
    display: flex;
    align-items: center;
  }

  .p-multiselect-label:not(.p-placeholder) {
    padding-top: .25rem;
    padding-bottom: .25rem;
  }

  .country-item-value {
    padding: .25rem .5rem;
    border-radius: 3px;
    display: inline-flex;
    margin-right: .5rem;
    //background-color: var(--primary-color);
    //color: var(--primary-color-text);

    img.flag {
      width: 17px;
    }
  }
}

</style>
