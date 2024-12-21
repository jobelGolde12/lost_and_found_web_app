<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { usePage, Head } from '@inertiajs/vue3';
import { computed, defineProps, onMounted, ref } from 'vue';
const props = defineProps({
    categories: {
        type: Object,
        default: ({})
    },
    locations: {
        type: Array,
        default: []
    }
});
const user = usePage().props.auth?.user;
const getCategories = ref([]);
const form = useForm({
    name: '',
    image: null,
    description: '',
    category: '',
    location: '',
    user_id: user.id,
    owner_phone_number: '',
    status: 'lost',
})
const submitForm = () => {
    console.log('form: ' + JSON.stringify(form))
    form.post(route('addLostItem'),  {
        onSuccess: () => alert('Submitted!'),
        onError: (errors) => console.log('error: ' + errors)
    });
}
const locations = computed(() => props.locations);

onMounted(() => {
    getCategories.value = props.categories;
})

const handleFileChange = (event) => {
    const file = event.target.files[0];
    form.image = file;
};
</script>
<template>
    <Head title="Report Lost Item" />
    <AuthenticatedLayout >
    <div class="main-container">
        <h1 class="text-dark fw-light text-center fs-3 mt-3">Report Lost Item</h1>

        <div class="container px-4">
            <form @submit.prevent="submitForm" class="form mt-5">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label class="text-muted d-block">Item name</label>
                        <input type="text" placeholder="ex: Cholo" class="w-100" v-model="form.name">
                    </div>
                    <div class="col-12 col-lg-6">
                        <label class="text-muted d-block">Location</label>
                        <select 
                                class="w-100" 
                                v-model="form.location">
                                <option disabled value="">Select a location</option>
                                <option 
                                    v-for="loc in locations" 
                                    :key="loc" 
                                    :value="loc.name">
                                    {{ loc.name }}
                                </option>
                            </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label class="text-muted d-block">Item image (optional)</label>
                        <input type="file" accept="image/*" class="w-100 image"  @change="handleFileChange">
                    </div>
                    <div class="col-12 col-lg-6">
                        <label class="text-muted d-block">Item description</label>
                        <textarea type="text" class="w-100" placeholder="ex: brown and tall, Last seen on zone 3 Bulan." v-model="form.description"> </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label class="text-muted d-block">Category</label>
                        <select name="categories" id="categories" class="w-100" v-model="form.category">
                            <option :value="data.id" v-for="data in props.categories" :key="data.id" >{{ data.name }}</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center pt-4">
                        <label class="text-muted d-block">Owner phone number (optional)</label>
                        <input type="text" placeholder="ex: 09461284345" class="w-100 d-block" v-model="form.owner_phone_number">
                    </div>
                </div>
                <button class="btn btn-dark" type="submit">Submit</button>
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