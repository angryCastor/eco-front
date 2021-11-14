<template>
  <div class="p-4 flex justify-content-around">
    <div>
      <h2 class="text-center mb-3 relative text-xl" style="left: 2rem">
        Статистика учёта предприятий
      </h2>
      <div style="width: 25rem; position: relative; left: 2rem">
        <Chart type="pie" :data="oneDataset" :options="lightOptions" />
      </div>
    </div>
    <div>
      <h2 class="text-center mb-3 text-xl">Поводы для постановки на учет НВОС</h2>
      <div style="width: 28.5rem">
        <Chart type="pie" :data="twoDataset" :options="lightOptions" />
      </div>
    </div>
  </div>

</template>

<script>
import { computed } from 'vue';
import useInfoColor from '@/services/useInfoColor';
import useTheme from '@/services/useTheme';

export default {
  setup() {
    const { isDark } = useTheme();

    const {
      success, warning, danger, help, info,
    } = useInfoColor();

    const one = computed(() => [
      {
        label: 'Состоящие на учете в НВОС',
        value: 495,
        backgroundColor: success.value.clone().toString(),
        hoverBackgroundColor: isDark.value ? success.value.clone().clone().darken().toString()
          : success.value.clone().lighten().toString(),
      },
      {
        label: 'Подлежащие постановке на учет НВОС',
        value: 1641,
        backgroundColor: warning.value.clone().toString(),
        hoverBackgroundColor: isDark.value ? warning.value.clone().darken().toString()
          : warning.value.clone().lighten().toString(),
      },
    ]);

    const two = computed(() => [
      {
        label: 'Имеющие ОКВЭД подлежащие учету в НВОС',
        value: 1268,
        backgroundColor: success.value.clone().toString(),
        hoverBackgroundColor: isDark.value ? warning.value.clone().darken().toString()
          : warning.value.clone().lighten().toString(),
      },
      {
        label: 'Имеющие лицензий на переработку металлов',
        value: 350,
        backgroundColor: danger.value.clone().toString(),
        hoverBackgroundColor: isDark.value ? danger.value.clone().darken().toString()
          : danger.value.clone().lighten().toString(),
      },
      {
        label: 'Имеющие разрешения на выбросы загрязняющих веществ',
        value: 258,
        backgroundColor: help.value.clone().toString(),
        hoverBackgroundColor: isDark.value ? help.value.clone().darken().toString()
          : help.value.clone().lighten().toString(),
      },
      {
        label: 'Имеющие лицензий на обращение с отходами',
        value: 143,
        backgroundColor: info.value.clone().toString(),
        hoverBackgroundColor: isDark.value ? info.value.clone().darken().toString()
          : info.value.clone().lighten().toString(),
      },
    ]);

    const generateOptions = (data) => ({
      labels: data.value.map((e) => e.label),
      datasets: [
        {
          data: data.value.map((e) => e.value),
          backgroundColor: data.value.map((e) => e.backgroundColor),
          hoverBackgroundColor: data.value.map((e) => e.hoverBackgroundColor),
        },
      ],
    });

    const oneDataset = computed(() => generateOptions(one));
    const twoDataset = computed(() => generateOptions(two));

    const lightOptions = computed(() => ({
      responsive: true,
      maintainAspectRatio: true,
      keepAspectRatio: false,
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            color: isDark.value ? '#bdd0e3' : '#495057',
          },
        },
      },
    }));

    return {
      lightOptions,
      success,
      oneDataset,
      twoDataset,
    };
  },
};

</script>
