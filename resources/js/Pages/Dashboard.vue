
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { defineProps, onMounted, ref } from "vue";
import CategoriesList from "@/Components/user/CategoriesList.vue";
import ItemCard from "@/Components/ItemCard.vue";
const props = defineProps({
  categories: {
    type: Object,
    default: ({})
  }
})
const categoriesContainer = ref([]);

onMounted(() => {
  categoriesContainer.value = props.categories;
})
</script>
<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <div class="container-fluid mt-4 d-flex flex-row justify-content-between align-items-center">
      <div class="logo">Lost And Found</div>
      <!-- Search Bar -->
      <div class="search-bar input-group mb-3">
        <input
          type="text"
          class="form-control"
          placeholder="Search..."
          aria-label="Search"
          list="categories"
        />

        <datalist id="categories">
          <option :value="data.name" v-for="data in props.categoriesContainer" :key="data.id"></option>
        </datalist>
        <button class="btn btn-outline-secondary" type="button">
          <i class="bi bi-search"></i>
        </button>
      </div>
    </div>

    <!-- List of all categories  -->
    <CategoriesList :categories="categoriesContainer"/>
    <!-- List of all items  -->
    <ItemCard />
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
.search-bar{
  position: relative;
  width: 30%;
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