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
  <div class="container-fluid d-flex flex-row flex-wrap mt-4 gap-3">
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
  </div>
</template>

  <script>
export default {
  name: "MissingPetCard",
};
</script>

  
<style scoped>
.card {
  border-radius: 8px;
  max-width: 350px;
  padding: 15px;
  background-color: transparent;
}

.card img {
  max-height: 150px;
  max-width: auto;
}
</style>
