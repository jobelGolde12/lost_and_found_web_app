<script setup>
import { ref, onMounted } from "vue";
import { usePage } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";

const currentRoute = usePage().url; // Get the current route for active link styling
const isSidebarOpen = ref(localStorage.getItem("isSidebarOpen") === "true");

const toggleSidebar = () => {
  isSidebarOpen.value = !isSidebarOpen.value;
  localStorage.setItem("isSidebarOpen", isSidebarOpen.value);
};

onMounted(() => {
  isSidebarOpen.value = localStorage.getItem("isSidebarOpen") === "true";
});
</script>

<template>
  <div class="main-container d-flex flex-row">
    <!-- Sidebar -->
    <div
      class="sidebar bg-light"
      :class="{ 'closed': !isSidebarOpen }"
      :style="{
        width: isSidebarOpen ? '250px' : '5%',
        padding: isSidebarOpen ? '20px' : '0'
      }"
    >
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h5>Settings</h5>
        </div>
        <div
          class="bi bi-list pointer text-dark fw-bolder fs-3"
          @click="toggleSidebar"
        ></div>
      </div>

      <!-- Sidebar Links -->
      <div class="list mt-4">
        <Link
          :href="route('settings.trash')"
          :class="{ active: currentRoute === route('settings.trash') }"
        >
          <div :class="{ 'icon-container': !isSidebarOpen }">
            <i class="bi bi-trash link"></i>
          </div>
          <span v-if="isSidebarOpen">Trash</span>
        </Link>

        <Link
          :href="route('settings.notifications')"
          :class="{ active: currentRoute === route('settings.notifications') }"
        >
          <div :class="{ 'icon-container': !isSidebarOpen }">
            <i class="bi bi-bell link"></i>
          </div>
          <span v-if="isSidebarOpen">Notifications</span>
        </Link>

        <Link
          :href="route('settings.privacy')"
          :class="{ active: currentRoute === route('settings.privacy') }"
        >
          <div :class="{ 'icon-container': !isSidebarOpen }">
            <i class="bi bi-shield-check link"></i>
          </div>
          <span v-if="isSidebarOpen">Privacy</span>
        </Link>
      </div>
    </div>

    <!-- Main Content -->
    <main class="right">
      <slot />
    </main>
  </div>
</template>

<style scoped>
/* Add your CSS styles here (same as provided earlier) */
</style>
