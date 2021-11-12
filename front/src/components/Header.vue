<template>
  <div class="flex align-items-center justify-content-between pr-3">
    <LogoHeader/>
    <div class="left-header flex align-items-center">
      <div class="user-name mr-3">
        {{ user.name }} {{ user.secondName }}
      </div>
      <div class="theme-switch mr-3">
        <ThemeSwitch/>
      </div>
      <div>
        <Button label="Выйти" @click="logout"/>
      </div>
    </div>
  </div>
</template>

<script>
import LogoHeader from '@/components/LogoHeader.vue';
import ThemeSwitch from '@/components/ThemeSwitch.vue';
import useAuth from '@/services/useAuth';
import useUser from '@/services/useUser';

export default {
  components: {
    ThemeSwitch,
    LogoHeader,
  },
  setup() {
    const { logout } = useAuth();
    const { user } = useUser();

    return {
      logout,
      user,
    };
  },
};
</script>
