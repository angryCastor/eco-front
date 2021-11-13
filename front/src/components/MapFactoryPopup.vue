<template>
  <Dialog header="Header"
          v-model:visible="isOpen"
          :style="{width: '80vw', maxWidth: 1200}"
          :maximizable="true"
          :modal="true">
    <p class="p-m-0">test</p>
    <template #footer>
      <Button label="No" icon="pi pi-times" @click="close" class="p-button-text"/>
      <Button label="Yes" icon="pi pi-check" @click="close" autofocus />
    </template>
  </Dialog>
</template>

<script>
import useMapFactoryPopup from '@/services/useMapFactoryPopup';

export default {
  setup() {
    const { isOpen, close } = useMapFactoryPopup();

    return {
      isOpen,
      close,
    };
  },
};
</script>
