<script setup>
import { ref, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';
const props = defineProps({
  item: {
    type: Object,
    default: () => ({}), 
  },
});

const data = ref({});


watch(
  () => props.item,
  (newItem) => {
    data.value = newItem;
  },
  { immediate: true } 
);

const deleteItem = useForm({
  id: ''
})
</script>

<template>
  <div class="view-item card">
    <div v-if="Object.keys(data).length > 0">
      <div class="card-header">
      <img v-if="data.image_url" :src="data.image_url" alt="Item Image" />  
      </div>
      
      <div class="card-body">
            <h1 class="my-2">{{ data.item_name || 'No name provided' }}</h1>
          <p><strong>Description:</strong> {{ data.item_description }}</p>
          <p><strong>Status:</strong> {{ data.status }}</p>
          <p><strong>Location:</strong> {{ data.location }}</p>
          <p v-if="data.category"><strong>Category:</strong> {{ data.category.name }}</p>
          <p><strong>Created at:</strong> {{ new Date(data.created_at).toLocaleString() }}</p>

          <div class="container px-0 d-flex flex-row gap-2">
            <button class="button1">Update</button>
          </div>
      </div>
    </div>
    <div v-else>
      <p>Loading item details...</p>
    </div>
  </div>
</template>

<style scoped>
@import '../../../css/global.css';
.view-item {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 8px;
  background-color: #fff;
}
.view-item .card-header{
  height: 400px;
  position: relative;
  width: 100%;
}
.view-item img {
  position: relative;
  width: 100%;
  height: 100%;
  margin-bottom: 20px;
}

.view-item h1 {
  font-size: 24px;
  margin-bottom: 10px;
}

.view-item p {
  margin: 5px 0;
}
</style>
