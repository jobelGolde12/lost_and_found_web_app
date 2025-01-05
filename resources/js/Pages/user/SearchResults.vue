
<script setup>
import { Head } from '@inertiajs/vue3';
import { defineProps,computed } from 'vue';
import ItemCard from '@/Components/ItemCard.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
const props = defineProps({
    items: {
        type: Array,
        default: () => []
    },
    searchQuery: {
        type: Object,
        default: () => {}
    }
})

const getItems = computed(() => props.items);
console.log("props => " , JSON.stringify(props))
</script>

<template>
        <AuthenticatedLayout>

    <div class="search-results-container">
        <Head title="Search results" />
         <h5 class="text-dark fw-lighter pt-3">Results for {{ searchQuery }}</h5>

      <ItemCard :items="getItems" />

        
    </div>
</AuthenticatedLayout>

</template>
<style lang="css" scoped>
.search-results-container{
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
.search-results-container::-webkit-scrollbar {
  display: none;
}
</style>