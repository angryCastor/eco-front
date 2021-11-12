<template>
  <div class="flex justify-content-center align-items-center w-full h-screen">
    <div class="card" style="max-width: 450px">
      <div class="flex justify-content-center">
        <div style="max-width: 200px; width: 60%">
          <Logo/>
        </div>
      </div>
      <h1 class="mb-4 mt-4 text-center text-2xl" >ЭкоИмпериум</h1>
      <form @submit.prevent="handleSubmit(!v$.$invalid)" class="p-fluid">
        <div class="p-field">
          <span class="p-float-label">
            <InputText
              id="login"
              type="text"
              v-model="v$.login.$model"
              :class="{'p-invalid':v$.login.$invalid && submitted}"/>
            <label for="login" :class="{'p-error':v$.login.$invalid && submitted}">Логин</label>
          </span>
          <div
            v-if="(v$.login.$invalid && submitted) || v$.login.$pending.$response"
            class="p-error mt-2" >*обязательное поле</div>
        </div>
        <div class="p-field pt-4">
          <span class="p-float-label">
            <Password
              id="password"
              v-model="v$.password.$model"
              :class="{'p-invalid':v$.password.$invalid && submitted}"
              :feedback="false" toggleMask/>
            <label
              for="password"
              :class="{'p-error':v$.password.$invalid && submitted}">Пароль</label>
          </span>
          <div
            v-if="(v$.password.$invalid && submitted) || v$.password.$pending.$response"
            class="p-error mt-2">
            *обязательное поле
          </div>
        </div>
        <Button :loading="isLoading" type="submit" label="Войти" class="mt-5" />
      </form>
    </div>
  </div>
</template>

<script>
import { ref, reactive } from 'vue';
import { required } from '@vuelidate/validators';
import { useVuelidate } from '@vuelidate/core';
import { useToast } from 'primevue/usetoast';
import useAuth from '@/services/useAuth';
import Logo from '@/components/Logo.vue';

export default ({
  components: {
    Logo,
  },
  setup() {
    const submitted = ref(false);
    const isLoading = ref(false);
    const { login } = useAuth();
    const { add } = useToast();

    const state = reactive({
      login: '',
      password: '',
    });

    const rules = {
      login: { required },
      password: { required },
    };

    const v$ = useVuelidate(rules, state);

    const handleSubmit = (isFormValid) => {
      submitted.value = true;
      if (isFormValid) {
        isLoading.value = true;
        login({
          name: state.login,
          password: state.password,
          onSuccess: (data) => add({
            severity: 'success',
            summary: 'Успешная авторизация',
            detail: `Добро пожаловать, ${data.name}`,
            group: 'br',
            life: 3000,
          }),
          onError: (data) => add({
            severity: 'error',
            summary: 'Ошибка',
            detail: data.error,
            group: 'br',
            life: 3000,
          }),
        }).finally(() => { isLoading.value = false; });
      }
    };

    return {
      v$,
      handleSubmit,
      submitted,
      isLoading,
    };
  },
});

</script>
