<script setup>
import { defineProps, ref } from 'vue';
const props = defineProps({
    categories: {
    type: Object,
    default: ({})
    }
})
const activeCategory = ref();
const chooseCategoryFunc = (id) => {
    activeCategory.value = id;
}
</script>
<template>
    <div class="container-fluid d-flex gap-2 align-items-center">
        <div>Categories:</div>
            <div class="list px-2 py-1 rounded"
                v-for="data in props.categories" :key="data.id"
                :class="{'bg-secondary text-light' : activeCategory === data.id}"
                @click="$emit('categorySelected', data.id)"
                >
                    {{ data.name }}
            </div>
    </div>
</template>

<style lang="css" scoped>
    .list{
        background: rgba(0,0,0,.1);
        cursor: pointer;
    }
    .list:hover{
        background: rgba(0,0,0,.2);
    }
</style>