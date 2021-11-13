<template>
  <Dialog header="Компании"
          v-model:visible="isOpen"
          :style="{width: '80vw', maxWidth: 1200}"
          :maximizable="true"
          :modal="true">
    <TableFactory :factories="factories" :is-loading="isLoading"/>
  </Dialog>
</template>

<script>
import { ref, watch } from 'vue';
import { useToast } from 'primevue/usetoast';
import useMapFactoryPopup from '@/services/useMapFactoryPopup';
import TableFactory from '@/components/TableFactory.vue';
import useApi from '@/services/useApi';
import useEnv from '@/services/useEnv';
import delay from '@/utils/delay';
import { list } from '@/mock/getFactoriesMock';

export default {
  components: { TableFactory },
  setup() {
    const { isOpen, close } = useMapFactoryPopup();
    const { get } = useApi();
    const { isMock } = useEnv();
    const { add } = useToast();

    const factories = ref([]);
    const isLoading = ref(false);

    const load = async () => {
      isLoading.value = true;
      try {
        factories.value = isMock.value ? await delay(list(300)) : (await get('factories')).data;
      } catch (e) {
        factories.value = [];
        add({
          severity: 'error',
          summary: 'Ошибка',
          detail: e.response.data,
          group: 'br',
          life: 3000,
        });
      }
      isLoading.value = false;
    };

    watch(isOpen, async (val) => {
      if (val) {
        await load();
      }
    });

    return {
      isOpen,
      close,
      factories,
      isLoading,
    };
  },
};
</script>
