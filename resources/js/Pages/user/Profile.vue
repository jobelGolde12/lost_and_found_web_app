
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, Link } from '@inertiajs/vue3';
import { computed, defineProps, onMounted, ref } from 'vue';
const user = usePage().props.auth.user;
const props = defineProps({
    items: {
        type: Object,
        default: ({})
    }
})
let itemsContainer = ref([]);
onMounted(() => {
itemsContainer.value = props.items;
})

</script>
<template>
<Head title="My profile" />
    <AuthenticatedLayout >
       <div class="main-container1">
        <div class="bg-image container mx-auto bg-secondary mt-3 rounded">
            <div class="profile-pic shadow-sm">
                <img src="../../../images/missing bag.jpg" alt="Profile pic">
            </div>
        </div>

        <div class="head-info container-fluid mt-5 pt-5 d-flex justify-content-between align-items-center">
           <div>
            <div class="name fs-2">{{ user.name }}</div>
            <div class="bio text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, quibusdam!</div>
           </div>

           <div class="edit">
            <button class="btn btn-dark"><i class="bi bi-pencil me-2"></i>Edit</button>
           </div>

        </div>

        <div class="container mx-4 mt-5">
            <h3 class="text-muted fw-light mb-5">My Items</h3>
            <table class="table table-responsive">
                <thead>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    <tr v-for="item in itemsContainer" :key="item.id">
                        <td >{{ item.item_name }}</td>
                        <td>{{ item.item_description }}</td>
                        <td>{{ item.status }}</td>
                        <td><Link :href="route('viewItem', { id: item.id })" class="btn btn-primary ms-0">View</Link></td>
                    </tr>
                </tbody>
            </table>
        </div>
       </div>
    </AuthenticatedLayout>
</template>

<style lang="css" scoped>
    .main-container1{
        position: relative;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
        overflow-y: scroll;
        padding: 0 2rem;
    }
    .bg-image{
        width: 100%;
        height: 40%;
    }
    .head-info{
        height: auto;
    }
    .bg-image .profile-pic{
        position: relative;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        left: 0%;
        bottom: -55%;
        overflow: hidden;
    }
    .profile-pic img{
        position: relative;
        width: 100%;
        height: 100%;
        border-radius: inherit;
        transition: .5s;
    }
    .profile-pic img:hover{
        transform: scale(1.1);
        filter: brightness(.8);
    }
</style>