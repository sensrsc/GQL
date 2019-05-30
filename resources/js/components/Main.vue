<template>
  <div class="wrapper">
    <app-header />
    <app-sidebar />
    <div class="content-wrapper">
      <router-view />
    </div>
    <app-footer />
  </div>
</template>

<script>
import AppHeader from '@/components/layout/AppHeader';
import AppSidebar from '@/components/layout/AppSidebar';
import AppFooter from '@/components/layout/AppFooter';

export default {
  name: 'Main',
  components: {
    AppHeader,
    AppSidebar,
    AppFooter
  }
};
</script>
