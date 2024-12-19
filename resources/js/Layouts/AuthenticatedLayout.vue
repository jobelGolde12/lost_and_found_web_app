<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/vue3";

const currentRoute = usePage().url;
</script>

<template>
  <div class="main-container d-flex flex-row justify-content-between align-items-center">
    <div class="d-flex flex-column">
      <div class="sidebar">
        <div class="d-flex flex-row justify-content-between align-items-center">
          <Link :href="route('profile.edit')" class="pointer user-name text-dark text-decoration-none">Boggart</Link>
          <div class="bi bi-list pointer text-dark fw-bolder fs-3"></div>
        </div>

        <div class="list mt-4">
          <Link
            :href="route('dashboard')"
            :class="{ active: currentRoute === route('dashboard') }"
          >
            <i class="bi bi-house link"></i> Home
          </Link>
          <Link
            :href="route('reportLostItem')"
            :class="{ active: currentRoute === route('reportLostItem') }"
          >
            <i class="bi bi-house link"></i> Report Lost Item
          </Link>
          <Link
            :href="route('reportFoundItem')"
            :class="{ active: currentRoute === route('reportFoundItem') }"
          >
            <i class="bi bi-house link"></i> Report Found Item
          </Link>
        </div>
      </div>
    </div>

    <!-- Page Content -->
    <main>
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

.sidebar {
  width: 250px;
  height: 100vh;
  background-color: #f8f9fa;
  padding: 20px;
}

.sidebar div .user-name {
  transform: translateY(10%);
}

.sidebar .sidenav-header {
  position: relative;
  width: 100%;
  height: 20%;
}

.sidebar .sidenav-header .logo {
  position: relative;
  width: 35px;
  height: 35px;
  background: url("@/assets/images/profile.png");
  background-position: center;
  background-size: cover;
  border-radius: 50%;
}

.sidebar .list a {
  display: block;
  color: #343a40;
  padding: 10px;
  margin-bottom: 3px;
  text-decoration: none;
  border-radius: 5px;
  background: transparent;
  transition: 0.2s;
}

.sidebar .list a.active {
  background: rgba(0, 0, 0, 0.1);
  font-weight: bold;
}

.sidebar .list a:hover {
  background: rgba(0, 0, 0, 0.1);
}
</style>
