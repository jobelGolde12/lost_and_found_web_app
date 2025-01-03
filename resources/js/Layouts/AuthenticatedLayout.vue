<script setup>
import { usePage } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";

const currentRoute = usePage().url;


const user = usePage().props.auth?.user;
const isSidebarOpen = ref(localStorage.getItem('isSidebarOpen') === 'true');

const toggleSidebar = () => {
  isSidebarOpen.value = !isSidebarOpen.value;
  localStorage.setItem('isSidebarOpen', isSidebarOpen.value);
};

onMounted(() => {
  isSidebarOpen.value = localStorage.getItem('isSidebarOpen') === 'true';
});
</script>
<template>
  <div class="main-container d-flex flex-row justify-content-between align-items-center">
    <div
      class="sidebar bg-light"
      :class="{ 'closed': !isSidebarOpen }"
      :style="{
        width: isSidebarOpen ? '250px' : '5%',
        padding: isSidebarOpen ? '20px' : '0'
      }"
    >
      <div class="d-flex flex-row justify-content-between align-items-center">
        <Link
          v-if="isSidebarOpen"
          :href="route('profile.edit')"
          class="pointer user-name text-dark text-decoration-none"
        >
          {{ user.name }}
        </Link>
        <div
          class="bi bi-list pointer text-dark fw-bolder fs-3"
          @click="toggleSidebar"
          :class="{ 'mt-3': !isSidebarOpen }"
        ></div>
      </div>

      <div class="list mt-4">
        <Link
          :href="route('dashboard')"
          :class="{ active: currentRoute === route('dashboard') }"
        >
          <div :class="{'icon-container' : !isSidebarOpen}">
            <i class="bi bi-house link"></i>
          </div>
          <span v-if="isSidebarOpen">Home</span>
        </Link>
        <Link
          :href="route('reportLostItem')"
          :class="{ active: currentRoute === route('reportLostItem') }"
        >
          <div :class="{'icon-container' : !isSidebarOpen}">
            <i class="bi bi-eye-slash link"></i>
          </div>
          <span v-if="isSidebarOpen">Report Lost Item</span>
        </Link>
        <Link
          :href="route('reportFoundItem')"
          :class="{ active: currentRoute === route('reportFoundItem') }"
        >
          <div :class="{'icon-container' : !isSidebarOpen}">
            <i class="bi bi-eye link"></i>
          </div>
          <span v-if="isSidebarOpen">Report Found Item</span>
        </Link>

        <hr>
        <!-- =========================== -->

        <Link
          :href="route('profile')"
          :class="{ active: currentRoute === route('profile') }"
        >
          <div :class="{'icon-container' : !isSidebarOpen}">
            <i class="bi bi-person link"></i>
          </div>
          <span v-if="isSidebarOpen">Profile</span>
        </Link>

        <Link
          :href="route('settings')"
          :class="{ active: currentRoute === route('settings') }"
        >
          <div :class="{'icon-container' : !isSidebarOpen}">
            <i class="bi bi-gear link"></i>
          </div>
          <span v-if="isSidebarOpen">Settings</span>
        </Link>


      </div>
    </div>

    <!-- Page Content -->
    <main :style="{ width: isSidebarOpen ? '80%' : '95%' }" class="right">
      <slot />
    </main>
  </div>
</template>

<style scoped>
@import '../../css/global.css';

.main-container {
  position: absolute;
  width: 100vw;
  height: 100vh;
  overflow-x: hidden;
}

.main-container .sidebar {
  position: relative;
  top: 0;
  height: 100vh;
  /* background-color: #eeeeee; */
  padding: 20px;
  transition: width 0.3s ease;
  overflow: hidden;
  width: 20%;
}

.main-container .right{
  position: relative;
  width: 80%;
  height: 100%;
}
.sidebar.closed {
  width: 5%;
  display: flex;
  align-items: center;
  flex-direction: column;
}

.sidebar .list a {
  display: flex;
  align-items: center;
  color: #343a40;
  padding: 10px;
  margin-bottom: 3px;
  text-decoration: none;
  border-radius: 5px;
  background: transparent;
  transition: 0.2s;
  left: 0;
  text-align: left;
}

.sidebar .list a .icon-container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
}

.sidebar .list a i {
  margin-right: 10px;
}

.sidebar.closed .list a {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.sidebar.closed .list a i {
  margin-right: 0;
}

.sidebar .list a span {
  white-space: nowrap;
}

.sidebar .list a.active {
  background: rgba(0, 0, 0, 0.3);
  font-weight: bold;
}

.sidebar .list a:hover {
  background: rgba(0, 0, 0, 0.1);
}
@media screen and (max-width: 800px) {
  .main-container .sidebar{
    display: none;
  }
}
</style>
