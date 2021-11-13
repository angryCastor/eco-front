<template>
  <Dialog :header="header" v-model:visible="isOpen" :style="{width: '500px'}">
    <p>test</p>
    <template #footer>
      <Button label="Отменить" icon="pi pi-times" @click="close" class="p-button-text"/>
      <Button label="Сохранить" icon="pi pi-check" @click="save" autofocus />
    </template>
  </Dialog>
</template>

<script>
import {
  computed, onMounted, ref, watch,
} from 'vue';
import useNotePopup from '@/services/useNotePopup';
import { item } from '@/mock/getNoteMock';

export default {
  setup() {
    const { isOpen, isCreate } = useNotePopup();
    const header = computed(() => (isCreate.value ? 'Создать заметку' : 'Изменить заметку'));
    const note = ref(null);
    const isLoading = ref(true);

    const save = () => {

    };

    const close = () => {

    };

    const load = async () => {
      isLoading.value = true;
      note.value = item();
      isLoading.value = false;
    };

    watch(isCreate, (val) => {
      if (!val) {
        isLoading.value = true;
        note.value = null;
      }
    });

    onMounted(() => load());

    return {
      isOpen,
      header,
      save,
      close,
    };
  },
};

</script>
