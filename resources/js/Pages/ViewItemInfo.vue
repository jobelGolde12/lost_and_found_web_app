<script setup>
import { ref, watch } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import CustomModal from '@/Components/CustomModal.vue';
const props = defineProps({
  item: {
    type: Object,
    default: () => ({}), 
  },
});

const data = ref({});
const deleteMessage = ref('Are you sure you want to delete this item?');
const response = ref();


watch(
  () => props.item,
  (newItem) => {
    data.value = newItem;
  },
  { immediate: true } 
);

const deleteItem = useForm({
  id: data.id
})

// response hali sa modal kung gusto ni user eh delete an item 
const getResponse = (res) => {
  try{
    if (res === 'yes') {
    deleteItem.delete(route('deleteItem', { id: props.item?.id }), {
      onSuccess: () => alert('deleted'),
      onError: (errors) => console.log('error => ' + errors),
    });
  }
  }catch(err){
    alert('item cannot be deleted.');
    console.error('an error occured while deleting data => ' , err);
  }
};
</script>

<template>
  <div class="container mx-auto">
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

          <div class="container px-0 d-flex flex-row gap-2 mt-2">

            <button class="button1">
              <span class="d-block d-lg-none"><i class="bi bi-pencil"></i></span>
              <span class="d-none d-lg-inline">Update</span>
            </button>

            
            <button 
            class="btn btn-warning"
            data-bs-toggle="modal" 
            data-bs-target="#customModal"
            >
              <span class="d-block d-lg-none"><i class="bi bi-trash"></i></span>
              <span class="d-none d-lg-inline">Delete</span>
            </button>

            <Link :href="route('profile')" class="btn btn-dark">
              <span class="d-block d-lg-none"><i class="bi bi-arrow-left"></i></span>
              <span class="d-none d-lg-inline">Back</span>
            </Link>
          </div>
      </div>
    </div>
    <div v-else>
      <p>Loading item details...</p>
    </div>
  </div>
  </div>


  <CustomModal :name="deleteMessage" :id="data.id" @response="getResponse"/>
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
  object-fit: contain;
}

.view-item h1 {
  font-size: 24px;
  margin-bottom: 10px;
}

.view-item p {
  margin: 5px 0;
}
</style>
