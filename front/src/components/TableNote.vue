<template>
  <div class="note-table" style="background: var(--surface-c)">
    <h5 class="p-3 text-xl">Заметки</h5>
    <DataTable :value="notes" responsiveLayout="scroll" :loading="isLoading">
      <template #empty>
        Заметок нет
      </template>
      <template #loading>
        Загрузка заметок. Пожалуйста подождите.
      </template>
      <Column field="id" header="Id" sortable></Column>
      <Column field="createdAt" header="Дата создания" sortable>
        <template #body="{data}">
          {{formatDate(data.createdAt)}}
        </template>
      </Column>
      <Column field="createdUser" header="Пользователь" sortable></Column>
      <Column field="comment" header="Комметарий" sortable></Column>
      <Column headerStyle="width:4rem">
        <template #body="{data}">
          <div class="flex">
            <Button icon="pi pi-pencil" class="p-button-rounded"
                    @click="open({note: data.id}, load)"/>
            <Button
              icon="pi pi-trash"
              class="p-button-rounded p-button-warning ml-3"
              @click="remove(data.id)"/>
          </div>
        </template>
      </Column>
    </DataTable>
    <div>
      <Button icon="pi pi-plus" class="m-3" label="Добавить"
              @click="open({factory: factoryId}, load)"/>
    </div>
  </div>
</template>

<script>
/* eslint-disable no-sequences */
import { onMounted, ref } from 'vue';
import { useConfirm } from 'primevue/useconfirm';
import { list } from '@/mock/getNoteMock';
import formatDate from '@/utils/formatDate';
import useNotePopup from '@/services/useNotePopup';

export default {
  props: {
    factoryId: {
      required: true,
    },
  },
  setup() {
    const notes = ref([]);
    const isLoading = ref(false);
    const { open } = useNotePopup();
    const confirm = useConfirm();

    const load = async () => {
      isLoading.value = true;
      notes.value = await list(5);
      isLoading.value = false;
    };

    const remove = () => {
      confirm.require({
        message: 'Вы уверены, что хотите удалить заметку?',
        header: 'Удаление',
        icon: 'pi pi-exclamation-triangle',
        accept: () => {
          // callback to execute when user confirms the action
        },
        reject: () => {
          // callback to execute when user rejects the action
        },
      });
    };

    onMounted(() => load());

    return {
      notes,
      formatDate,
      open,
      remove,
      isLoading,
      load,
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
