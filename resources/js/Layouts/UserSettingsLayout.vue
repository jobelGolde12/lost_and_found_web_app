<script setup>
import PageNavagation from "@/Components/user/PageNavagation.vue";
import SettingsHeader from "@/Components/user/SettingsHeader.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>
<template>
    
    <!-- And settings may AuthenticatedLayout para sa sidenav san dashboard
    and then may on din san UserSettingsLayout na para namn sa kada route
    sa settings. -->
    
  <AuthenticatedLayout>
    <div class="settings-container d-flex flex-column align-items-center">
      <div class="top">
        <SettingsHeader />
        <PageNavagation />
      </div>
      <!-- Page Content -->
      <main class="bottom">
        <slot />
      </main>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>
@import "../../css/global.css";
.settings-container {
  position: relative;
  width: 100%;
  height: 100%;
}
.settings-container .top,
.settings-container .bottom {
  height: 10%;
  width: 100%;
  position: relative;
}
.settings-container .bottom {
  height: 90%;
}
</style>
