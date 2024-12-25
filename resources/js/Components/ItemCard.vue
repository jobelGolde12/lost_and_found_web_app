<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
  items: {
    type: Array,
    default: [],
  },
});

const itemContainer = computed(() => props.items);
</script>

<template>
  <div class="card-container container-fluid d-flex flex-row flex-wrap mt-4 gap-3 justify-content-center">
    <div
      class="card"
      v-for="data in itemContainer"
      :key="data.id"
    >
      <Link :href="route('viewItemInfo', { item: data.id })" class="text-decoration-none">
        <div class="image-container">
          <img
            :src="data.image_url"
            class="card-img-top"
            alt="Item image"
            v-if="data.image_url"
          />
        </div>
        <div class="card-body">
          <h5 class="card-title text-dark">{{ data.item_name }}</h5>
          <p class="card-text text-muted">{{ data.item_description }}</p>
          <a
            href="#"
            class="btn btn-light"
            v-if="data.owner_phone_number"
            >Call: {{ data.owner_phone_number }}</a
          >
        </div>
      </Link>
    </div>
    <div class="container-bottom mt-5"></div>
  </div>
</template>

<style scoped>
.card-container {
  position: relative;
  width: 100%;
  overflow-y: scroll;
  overflow-x: hidden;
  padding-bottom: 2rem;
}

.card {
  border-radius: 8px;
  max-width: 18rem;
  width: 100%;
  padding: 15px;
  background-color: white;
  cursor: pointer;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s, box-shadow 0.2s;
}

.card:hover {
  transform: scale(1.03);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
  background: rgba(200, 195, 195, 0.1);
}

.image-container {
  width: 100%;
  height: 200px; 
  overflow: hidden;
  border-radius: 8px;
}

.card img {
  width: 100%;
  height: 100%;
  object-fit: cover; 
  object-position: top; 
}

.card-body {
  padding: 10px 0;
}

.container-bottom {
  width: 100%;
  height: 50px;
}

@media (max-width: 768px) {
  .card {
    max-width: 100%;
  }
}
</style>
