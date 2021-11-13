<template>
  <DataTable
    ref="dt"
    :value="factories"
    :scrollable="true"
    :paginator="true"
    :rows="10"
    :rowsPerPageOptions="[10,20,50]"
    v-model:filters="filters"
    v-model:expandedRows="expandedRows"
    filterDisplay="menu"
    :globalFilterFields="[
      'id',
      'name',
      'address',
      'management_name',
      'inn',
      'okpo',
      'okved',
      'okvedDisplay',
      'phones',
      'emails',
      ]"
    dataKey="id"
    removableSort
    paginatorTemplate="FirstPageLink
    PrevPageLink
    PageLinks
    NextPageLink
    LastPageLink
    RowsPerPageDropdown"
    scrollHeight="flex"
    responsiveLayout="scroll"
    :loading="isLoading">
    <template #header>
      <div class="flex align-items-center">
        <h2 v-if="header" class="text-xl flex-grow-1">{{ header }}</h2>
        <div class="flex align-items-center">
          <MultiSelect
            v-model="visibilityColumnKeys"
            :options="toggleColumns"
            option-value="field"
            option-label="header"
            class="mr-2"
            style="width: 350px"
            placeholder="Выберите столбцы"
          />
          <div style="text-align: left">
            <Button icon="pi pi-external-link" label="Экспорт CSV" @click="exportCSV($event)" />
          </div>
          <Button
            type="button"
            icon="pi pi-filter-slash"
            label="Сбросить"
            class="p-button-outlined ml-2"
            @click="clearFilter"/>
          <div class="p-input-icon-left ml-2">
            <i class="pi pi-search" />
            <InputText v-model="filters['global'].value" placeholder="Поиск" />
          </div>
        </div>
      </div>
    </template>
    <template #empty>
      Компании не найдены.
    </template>
    <template #loading>
      Загрузка компаний. Пожалуйста подождите.
    </template>
    <Column :expander="true" headerStyle="width: 3rem" />
    <Column
      v-for="col in selectedColumn"
      :key="col.field"
      :field="col.field"
      :header="col.header"
      :sortable="true"
      :dataType="col.dataType"
      :style="col.style">
      <template #body="{data}">
        <template v-if="col.type === 'date'">
          <span v-if="data[col.field]">{{formatDate(data[col.field])}}</span>
          <span v-else style="color: var(--text-color-secondary)">Нет данных</span>
        </template>
        <template v-else-if="col.type === 'address'">
          <div v-if="data[col.field]" class="flex align-items-center">
            <div class="ml-2" >
              {{data[col.field]}}
            </div>
          </div>
          <span v-else style="color: var(--text-color-secondary)">Нет данных</span>
        </template>
        <template v-else-if="col.type === 'reasons'">
          <div v-if="data[col.field]" class="flex align-items-center flex-wrap">
            <div
              v-for="code in data[col.field]"
              :key="code"
              class="mb-1">
              <Tag class="mr-2" :value="getNameByReasonSearching(code)"></Tag>
            </div>
          </div>
          <span v-else style="color: var(--text-color-secondary)">Нет данных</span>
        </template>
        <template v-else>
          <span v-if="data[col.field]">{{ data[col.field]}}</span>
          <span v-else style="color: var(--text-color-secondary)">Нет данных</span>
        </template>
      </template>
      <template #filter="{filterModel,filterCallback}">
        <template v-if="col.type === 'date'">
          <Calendar v-model="filterModel.value" dateFormat="dd.mm.yy" placeholder="dd.mm.yy" />
        </template>
        <template v-if="col.type === 'reasons'">
          <Dropdown
            v-model="filterModel.value"
            :options="reasons"
            placeholder="Любая"
            class="p-column-filter" :showClear="true">
            <template #value="slotProps">
              <Tag
                v-if="slotProps.value"
                class="p-mr-2"
                :value="getNameByReasonSearching(slotProps.value)"></Tag>
              <span v-else>{{slotProps.placeholder}}</span>
            </template>
            <template #option="slotProps">
              <Tag class="p-mr-2" :value="getNameByReasonSearching(slotProps.option)"></Tag>
            </template>
          </Dropdown>
        </template>
        <template v-else>
          <InputText
            type="text"
            v-model="filterModel.value"
            @keydown.enter="filterCallback()"
            class="p-column-filter"
            placeholder="Поиск по значению" v-tooltip.top.focus="'Нажмите Enter чтобы применить'"/>
        </template>
      </template>
      <template #filterclear="{filterCallback}" >
        <Button
          type="button"
          icon="pi pi-times"
          @click="filterCallback()"
          class="p-button-secondary"></Button>
      </template>
      <template #filterapply="{filterCallback}">
        <Button
          type="button"
          icon="pi pi-check"
          @click="filterCallback()"
          class="p-button-success"></Button>
      </template>
    </Column>
    <template #expansion="slotProps">
      <TableNote :id="slotProps.data.id"/>
    </template>
  </DataTable>
</template>

<script>
import { computed, ref } from 'vue';
import { useStorage } from '@vueuse/core';
import getFactoryColumns from '@/utils/getFactoryColumns';
import getFactoryFilters from '@/utils/getFactoryFilters';
import formatDate from '@/utils/formatDate';
import getNameByReasonSearching from '@/utils/getNameByReasonSearching';
import TableNote from '@/components/TableNote.vue';

export default {
  components: { TableNote },
  props: {
    header: {
      type: String,
      default: '',
    },
    isLoading: {
      type: Boolean,
      default: false,
    },
    factories: {
      type: Array,
      default: () => [],
    },
  },
  setup() {
    const dt = ref(null);
    const filters = ref({});
    const reasons = ['okved', 'emissions', 'waste', 'metal'];
    const expandedRows = ref([]);

    const initColumns = [
      'address',
      'managementName',
      'inn',
      'okpo',
      'okved',
      'phones',
      'emails',
      'reasonSearching',
      'okvedDisplay',
    ];

    const visibilityColumnKeys = useStorage('visibility-column-keys', initColumns);

    const columns = getFactoryColumns();
    const toggleColumns = columns.filter((e) => !e.permanentVisibility);
    const selectedColumn = computed(() => columns.filter((e) => e.permanentVisibility
      || visibilityColumnKeys.value.includes(e.field)));

    const initFilters = () => {
      filters.value = getFactoryFilters();
    };

    const clearFilter = () => initFilters();

    const exportCSV = () => {
      dt.value.exportCSV();
    };

    const clearVisibilityColumnKeys = () => {
      const allColumnsKeys = columns.map((e) => e.field);
      visibilityColumnKeys.value = visibilityColumnKeys.value
        .filter((e) => allColumnsKeys.includes(e));
    };

    initFilters();
    clearVisibilityColumnKeys();

    return {
      dt,
      clearFilter,
      selectedColumn,
      visibilityColumnKeys,
      toggleColumns,
      columns,
      filters,
      formatDate,
      exportCSV,
      getNameByReasonSearching,
      reasons,
      expandedRows,
    };
  },
};
</script>

<style lang="scss">
.p-datatable-row-expansion > td {
  box-shadow: 0px 0px 10px 0px rgba(34, 60, 80, 0.17) inset;
  padding: 0!important;
}

::v-deep(.p-column-header-content) {
  width: 100%;

  .p-column-title {
    flex-grow: 1;
  }
}
</style>
