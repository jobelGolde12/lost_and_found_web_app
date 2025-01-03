<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import FilterComponent from "@/Components/user/FilterComponent.vue";
import { Head } from "@inertiajs/vue3";
import { computed, defineProps, ref } from "vue";
import CategoriesList from "@/Components/user/CategoriesList.vue";
import ItemCard from "@/Components/ItemCard.vue";

const props = defineProps({
  categories: {
    type: Array,
    default: [],
  },
  items: {
    type: Array,
    default: [],
  },
});


const categoriesContainer = computed(() => {
  return [{ id: '', name: 'All', status: 'all' }, ...props.categories];
});


const selectedCategory = ref('');
const filterStatus = ref('all');


const getItems = computed(() => {
  return props.items.filter(item => {
    const matchesCategory =
      selectedCategory.value === '' || item.category_id === selectedCategory.value;
    const matchesStatus =
      filterStatus.value === 'all' || item.status === filterStatus.value;
    return matchesCategory && matchesStatus;
  });
});


const handleFilterChange = (filter) => {
  filterStatus.value = filter;
  console.log("Filter changed to:", filterStatus.value);
};


const handleCategoryChange = (categoryId) => {
  selectedCategory.value = categoryId;
  console.log("Selected category changed to:", selectedCategory.value);
};
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <div class="main-container">
      <div
        class="container-fluid mt-4 d-flex flex-row justify-content-between align-items-center"
      >
        <div class="logo d-none d-sm-block d-lg-block">Lost And Found</div>
        <!-- Search Bar -->
        <div class="search-bar input-group mb-3">
          <input
            type="text"
            class=""
            placeholder="Search..."
            aria-label="Search"
            list="categories"
            style="outline: none"
          />

          <datalist id="categories">
            <option
              :value="data.name"
              v-for="data in categoriesContainer"
              :key="data.id"
            ></option>
          </datalist>
          <button class="btn btn-light" type="button">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </div>

      <!-- List of all categories -->
      <CategoriesList
        :categories="categoriesContainer"
        @categorySelected="handleCategoryChange"
      />

      <!-- Filter kung lost o found -->
      <FilterComponent @filterSelected="handleFilterChange" />

      <!-- List of all items -->
      <ItemCard :items="getItems" />

      <div class="container" v-if="getItems.length === 0">
          <h1 class="text-dark text-center text-muted">No item found...</h1>
        </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>
.main-container {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
}
.search-bar {
  position: relative;
  width: 30%;
}
.search-bar input {
  position: relative;
  width: 80%;
  padding: 0.5rem 1rem;
  border: 0.5px solid rgba(0, 0, 0, 0.2);
  border-radius: 5px 0 0 5px;
}
.search-bar input:focus,
.search-bar input:hover {
  outline: 1px solid rgba(0, 0, 0, 0.5);
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
@media screen and (max-width: 800px) {
  .search-bar {
    position: relative;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
  }
}
</style>
