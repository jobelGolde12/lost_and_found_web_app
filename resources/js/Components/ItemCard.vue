<script setup>
import { computed } from "vue";

const props = defineProps({
  items: {
    type: Array,
    default: [],
  },
});
const itemContainer = computed(() => props.items);
</script>   

    <template>
  <div class="card-container container-fluid d-flex flex-row flex-wrap mt-4 gap-3">
        <div
          class="card"
          style="width: 18rem"
          v-for="data in itemContainer"
          :key="data.id"
        >
          <img
            :src="data.image_url"
            class="card-img-top"
            alt="Item image"
            v-if="data.image_url"
          />
          <div class="card-body">
            <h5 class="card-title">{{ data.item_name }}</h5>
            <p class="card-text">{{ data.item_description }}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>

        <div class="container mt-5">
          <h1 class="text-dark text-center">End Of Items</h1>
        </div>
  </div>
</template>

  
<style scoped>
.card-container{
  position: absolute;
  width: 100%;
  height: 100%;
  overflow-y: scroll;
  overflow-x: hidden;
}
.card {
  border-radius: 8px;
  max-width: 350px;
  padding: 15px;
  background-color: transparent;
}

.card img {
  max-height: 180px;
  max-width: auto;
}
</style>
