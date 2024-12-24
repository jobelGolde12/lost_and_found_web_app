<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
const props = defineProps({
  items: {
    type: Array,
    default: [],
  },
});
const itemContainer = computed(() => props.items);
const dataToPass = ref(); // data to pass in ViewItemInfo.vue
const getSelectedCardInfo = (data) => {
dataToPass.value = data;
}
</script>     

    <template>
  <Link :href="route('viewItemInfo', {item: dataToPass})">
    <div
      class="card-container container-fluid d-flex flex-row flex-wrap mt-4 gap-3"
    >
      <div
        class="card"
        style="width: 18rem"
        v-for="data in itemContainer"
        :key="data.id"
        @click="getSelectedCardInfo(data)"
      >
        <img
          :src="data.image_url"
          class="card-img-top"
          alt="Item image"
          v-if="data.image_url"
        />
        <div class="card-body ps-0">
          <h5 class="card-title mb-0">{{ data.item_name }}</h5>
          <p class="card-text text-muted">{{ data.item_description }}</p>
          <a href="#" class="btn btn-light ms-0" v-if="data.owner_phone_number"
            >Call : {{ data.owner_phone_number }}</a
          >
        </div>
      </div>

      <div class="container-bottom mt-5"></div>
    </div>
  </Link>
</template>

  
<style scoped>
.card-container {
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
  cursor: pointer;
}
.card:hover {
  background: rgba(200, 195, 195, 0.1);
}

.card img {
  max-height: 200px;
  width: auto;
  object-fit: contain;
}
.container-bottom {
  width: 100%;
  height: 50%;
}
</style>
