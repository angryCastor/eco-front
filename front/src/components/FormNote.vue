<template>
  <Dialog
    :header="header"
    v-model:visible="isOpen"
    :style="{width: '500px'}"
  >
    <div class="field">
      <label for="user">ФИО</label>
      <div class="p-inputgroup">
        <span class="p-inputgroup-addon">
          <i class="pi pi-user"></i>
        </span>
        <InputText
          id="user"
          placeholder="Пользователь"
          disabled
          value="Илья Астахов"
          :class="{'p-invalid':v$.createdUser.$invalid && submitted}"
        />
        <div
          v-if="(v$.createdUser.$invalid && submitted) || v$.createdUser.$pending.$response"
          class="p-error mt-1"
        >*обязательное поле
        </div>
      </div>
    </div>
    <div class="field">
      <label for="date">Дата создания</label>
      <div class="p-inputgroup">
        <span class="p-inputgroup-addon">
          <i class="pi pi-calendar"></i>
        </span>
        <Calendar
          id="date"
          :showTime="true"
          :showSeconds="true"
          placeholder="Дата"
          dateFormat="dd.mm.yy"
          v-model="v$.createdAt.$model"
          :class="{'p-invalid':v$.createdAt.$invalid && submitted}"
        />
      </div>
      <div
        v-if="(v$.createdAt.$invalid && submitted) || v$.createdAt.$pending.$response"
        class="p-error mt-1"
      >*обязательное поле
      </div>
    </div>
    <div class="field">
      <label for="comment">Комметарий</label>
      <div class="p-inputgroup">
        <span class="p-inputgroup-addon">
          <i class="pi pi-comment"></i>
        </span>
        <Textarea
          id="comment"
          :autoResize="true"
          rows="5"
          cols="30"
          placeholder="Введите текст"
          v-model="v$.comment.$model"
          :class="{'p-invalid':v$.comment.$invalid && submitted}"
        />
      </div>
      <div
        v-if="(v$.comment.$invalid && submitted) || v$.comment.$pending.$response"
        class="p-error mt-1"
      >*обязательное поле
      </div>
    </div>
    <template #footer>
      <Button
        label="Отменить"
        icon="pi pi-times"
        @click="close"
        class="p-button-text"
      />
      <Button
        label="Сохранить"
        icon="pi pi-check"
        @click="save"
        autofocus
      />
    </template>
  </Dialog>
</template>

<script>
import { computed, reactive, ref, watch } from 'vue';
import { required } from '@vuelidate/validators';
import { useVuelidate } from '@vuelidate/core';
import useNotePopup from '@/services/useNotePopup';
import { item } from '@/mock/getNoteMock';
import useApi from '@/services/useApi';

export default {
  setup() {
    const { isOpen, isCreate, close: closePopup, factoryId, successCallback } = useNotePopup();
    const header = computed(() => (isCreate.value ? 'Создать заметку' : 'Изменить заметку'));
    const isLoading = ref(false);
    const submitted = ref(false);
    const { post } = useApi();

    const state = reactive({
      createdAt: new Date(),
      createdUser: '',
      comment: '',
    });

    const rules = computed(() => ({
      createdAt: { required },
      createdUser: {},
      comment: { required },
    }));

    const v$ = useVuelidate(rules, state);

    const resetState = () => {
      submitted.value = false;
      state.createdAt = new Date();
      state.createdUser = '';
      state.comment = '';
    };

    const save = async (isFormValid) => {
      submitted.value = true;

      if (successCallback.value) {
        successCallback.value();
      }

      if (!isFormValid) {
        return;
      }

      if (isCreate.value) {
        try {
          await post('note-create', {
            factory_id: factoryId.value,
            comment: state.comment,
            date: state.createdAt.getTime(),
          });
          // eslint-disable-next-line no-empty
        } catch (e) {}

        if (successCallback.value) {
          successCallback.value();
        }
      }

      // eslint-disable-next-line no-use-before-define
      close();
    };

    const close = () => {
      closePopup();
      resetState();
    };

    const load = async () => {
      resetState();

      if (isCreate.value) {
        return;
      }

      isLoading.value = true;
      const n = item();
      state.createdAt = n.createdAt;
      state.createdUser = n.createdUser;
      state.comment = n.comment;
      isLoading.value = false;
    };

    watch(isOpen, (val) => {
      resetState();
      isLoading.value = true;
      if (val) {
        load();
      }
    });

    return {
      isOpen,
      header,
      save,
      close,
      isCreate,
      v$,
      submitted,
    };
  },
};
</script>
