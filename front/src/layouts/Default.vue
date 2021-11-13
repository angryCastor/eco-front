<template>
  <div v-if="isLoading" class="relative">
    <slot v-if="isAuth"/>
    <LoginForm v-else/>
    <div v-if="!isAuth" class="fixed top-0 right-0">
      <ThemeSwitch :is-card="true"/>
    </div>
    <Toast position="bottom-right" group="br" />
    <ConfirmDialog/>
  </div>
</template>

<script>
import Toast from 'primevue/toast';
import useAuth from '@/services/useAuth';
import LoginForm from '@/components/LoginForm.vue';
import ThemeSwitch from '@/components/ThemeSwitch.vue';
import useTheme from '@/services/useTheme';

export default {
  components: {
    LoginForm,
    ThemeSwitch,
    Toast,
  },
  setup() {
    const { isLoading, isAuth, init: initAuth } = useAuth();
    const { init: initTheme } = useTheme();

    initTheme();
    initAuth().then();

    return {
      isLoading,
      isAuth,
    };
  },
};
</script>
