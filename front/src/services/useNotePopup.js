import {
  computed, readonly, ref, watch,
} from 'vue';

const isOpen = ref(false);
const factoryId = ref(null);
const noteId = ref(null);

const isCreate = computed(() => factoryId.value != null);

const clearData = () => {
  factoryId.value = null;
  noteId.value = null;
};

const open = ({ factory, note }) => {
  factoryId.value = factory ?? null;
  noteId.value = note ?? null;
  isOpen.value = true;
};

const close = () => {
  clearData();
  isOpen.value = false;
};

watch(isOpen, (val) => {
  if (!val) {
    clearData();
  }
});

export default () => ({
  isOpen,
  isCreate,
  factoryId: readonly(factoryId),
  noteId: readonly(noteId),
  open,
  close,
});
