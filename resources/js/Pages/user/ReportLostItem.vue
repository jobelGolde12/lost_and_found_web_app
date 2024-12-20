<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps, onMounted, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
const props = defineProps({
    categories: {
        type: Object,
        default: ({})
    }
});
const getCategories = ref([]);
const submitForm = useForm({
    name: '',
    url: '',
    description: '',
    category: '',
    location: ''
})
onMounted(() => {
    getCategories.value = props.categories;
})


</script>
<template>
    <AuthenticatedLayout >
    <div class="main-container">
        <h1 class="text-dark fw-light text-center fs-3 mt-3">Report Lost Item</h1>

        <div class="container px-4">
            <form @submit.prevent="submitForm" class="form mt-4">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label class="text-muted d-block">Item name</label>
                        <input type="text" placeholder="ex: Cholo" class="w-100" v-model="submitForm.name">
                    </div>
                    <div class="col-12 col-lg-6">
                        <label class="text-muted d-block">Location</label>
                        <input type="text" placeholder="your location" class="w-100" v-model="submitForm.location">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label class="text-muted d-block">Item image</label>
                        <input type="file" accept="image/*" class="w-100 image" >
                    </div>
                    <div class="col-12 col-lg-6">
                        <label class="text-muted d-block">Item description</label>
                        <textarea type="text" class="w-100" placeholder="ex: brown and tall, Last seen on zone 3 Bulan." v-model="submitForm.description"> </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label class="text-muted d-block">Category</label>
                        <select name="categories" id="categories" class="w-100" v-model="submitForm.category">
                            <option :value="data.name" v-for="data in props.categories" :key="data.id" >{{ data.name }}</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center pt-4">
                        <button class="btn btn-dark" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </AuthenticatedLayout>
    
</template>
<style lang="css" scoped>
.main-container{
    width: 100%;
    height: 100%;
    overflow-x: hidden;
}
.form  input , .form textarea, .form select {
    position: relative;
    width: 100%;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 5px;
}
.form .image{
    padding: .5rem 1rem;
}

</style>