<template>
  <div class="p-4 flex flex-wrap">
    <div class="p-6" style="max-width: 30rem">
      <Chart type="pie" :data="chartData" :options="lightOptions" />
    </div>
    <div class="p-6" style="max-width: 30rem">
      <Chart type="pie" :data="chartData" :options="lightOptions" />
    </div>
  </div>
</template>

<script>
export default {
  setup() {
    const chartData = {
      labels: ['A', 'B', 'C'],
      datasets: [
        {
          data: [300, 50, 100],
          backgroundColor: ['#42A5F5', '#66BB6A', '#FFA726'],
          hoverBackgroundColor: ['#64B5F6', '#81C784', '#FFB74D'],
        },
      ],
    };

    const lightOptions = {
      plugins: {
        legend: {
          labels: {
            color: '#495057',
          },
        },
      },
    };

    return {
      chartData,
      lightOptions,
    };
  },
};

</script>
