<template>
  <TableFactory header="Компании" :factories="factories" :is-loading="isLoading"/>
</template>

<script>
import { onMounted, ref } from 'vue';
import { useToast } from 'primevue/usetoast';
import TableFactory from '@/components/TableFactory.vue';
import useApi from '@/services/useApi';
import useEnv from '@/services/useEnv';
import delay from '@/utils/delay';
import { list } from '@/mock/getFactoriesMock';

export default {
  components: { TableFactory },
  setup() {
    const { get } = useApi();
    const { isMock } = useEnv();
    const { add } = useToast();

    const factories = ref([]);
    const isLoading = ref(false);

    const load = async () => {
      isLoading.value = true;
      try {
        factories.value = isMock.value
          ? await delay(list(300))
          : (await get('factories')).data;
      } catch (e) {
        factories.value = [];
        add({
          severity: 'error',
          summary: 'Ошибка',
          detail: e.response.data.error,
          group: 'br',
          life: 3000,
        });
      }
      isLoading.value = false;
    };

    onMounted(() => load());

    return {
      factories,
      isLoading,
    };
  },
};
</script>
