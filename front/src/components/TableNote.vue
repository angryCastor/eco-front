<template>
  <div class="note-table" style="background: var(--surface-c)">
    <h5 class="p-3 text-xl">Заметки</h5>
    <DataTable :value="notes" responsiveLayout="scroll">
      <Column field="id" header="Id" sortable></Column>
      <Column field="createdAt" header="Дата создания" sortable>
        <template #body="{data}">
          {{formatDate(data.createdAt)}}
        </template>
      </Column>
      <Column field="createdUser" header="Пользователь" sortable></Column>
      <Column field="comment" header="Комметарий" sortable></Column>
      <Column headerStyle="width:4rem">
        <template #body>
          <div class="flex">
            <Button icon="pi pi-pencil" class="p-button-rounded" />
            <Button icon="pi pi-trash" class="p-button-rounded p-button-warning ml-3"/>
          </div>
        </template>
      </Column>
    </DataTable>
    <div>
      <Button icon="pi pi-plus" class="m-3" label="Добавить"  />
    </div>
  </div>
</template>

<script>
/* eslint-disable no-sequences */
import { onMounted, ref } from 'vue';
import { list } from '@/mock/getNoteMock';
import formatDate from '@/utils/formatDate';

export default {
  setup() {
    const notes = ref([]);

    const load = async () => {
      notes.value = await list(5);
    };

    onMounted(() => load());

    return {
      notes,
      formatDate,
    };
  },
};
</script>

<style lang="scss">
.note-table {
  width: 100%;
  background: var(--surface-c);
  //max: calc(100vw - 18rem);

  .row {
    background: red;
  }
}
</style>
