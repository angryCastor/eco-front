<template>
  <div class="p-4 flex justify-content-around">
    <div>
      <h2 class="text-center mb-3 relative text-xl" style="left: 2rem">
        Статистика учёта предприятий
      </h2>
      <div style="width: 30rem; position: relative; left: 2rem">
        <Chart type="pie" :data="oneDataset" :options="lightOptions" />
      </div>
    </div>
    <div>
      <h2 class="text-center mb-3 text-xl">Поводы для постановки на учет НВОС</h2>
      <div style="width: 33.5rem">
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
        backgroundColor: success.value.toString(),
        hoverBackgroundColor: isDark.value ? success.value.darken().toString()
          : success.value.lighten().toString(),
      },
      {
        label: 'Подлежащие постановке на учет НВОС',
        value: 1641,
        backgroundColor: warning.value.toString(),
        hoverBackgroundColor: isDark.value ? warning.value.darken().toString()
          : warning.value.lighten().toString(),
      },
    ]);

    const two = computed(() => [
      {
        label: 'Имеющие ОКВЭД подлежащие учету в НВОС',
        value: 1268,
        backgroundColor: success.value.toString(),
        hoverBackgroundColor: isDark.value ? success.value.darken().toString()
          : success.value.lighten().toString(),
      },
      {
        label: 'Состоящие на учете в НВОС',
        value: 495,
        backgroundColor: warning.value.toString(),
        hoverBackgroundColor: isDark.value ? warning.value.darken().toString()
          : warning.value.lighten().toString(),
      },
      {
        label: 'Имеющие лицензий на переработку металлов',
        value: 350,
        backgroundColor: danger.value.toString(),
        hoverBackgroundColor: isDark.value ? danger.value.darken().toString()
          : danger.value.lighten().toString(),
      },
      {
        label: 'Имеющие разрешения на выбросы загрязняющих веществ',
        value: 258,
        backgroundColor: help.value.toString(),
        hoverBackgroundColor: isDark.value ? help.value.darken().toString()
          : help.value.lighten().toString(),
      },
      {
        label: 'Имеющие лицензий на обращение с отходами',
        value: 143,
        backgroundColor: info.value.toString(),
        hoverBackgroundColor: isDark.value ? info.value.darken().toString()
          : info.value.lighten().toString(),
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
