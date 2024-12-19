
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>
<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <div class="container mt-5">
      <!-- Search Bar -->
      <div class="search-bar input-group mb-3">
        <input
          type="text"
          class="form-control"
          placeholder="Search..."
          aria-label="Search"
        />
        <button class="btn btn-outline-secondary" type="button">
          <i class="bi bi-search"></i>
        </button>
      </div>
    </div>
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit qui repellat cumque impedit nisi neque laudantium nostrum sequi, illum omnis possimus doloremque atque optio quibusdam dignissimos asperiores tempora tempore saepe iure a! Obcaecati laborum repudiandae ipsum iure, sequi praesentium atque labore veritatis exercitationem et cumque ipsa autem dolore minima expedita.
  </AuthenticatedLayout>
</template>


<style scoped>
.main-container {
  position: absolute;
  width: 100vw;
  height: 100vh;
}
.main-container .left {
  position: relative;
  width: 20%;
  height: 100%;
}
.main-container .right {
  position: relative;
  width: 80%;
  height: 100%;
  overflow-y: scroll;
}
@media screen and (max-width: 1024px) {
  .main-container .right {
    position: absolute;
    width: 100vw;
    height: 100vh;
    top: 0;
    left: 0;
  }
}
</style>