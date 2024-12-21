
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
const user = usePage().props.auth.user;
</script>
<template>
<Head title="My profile" />
    <AuthenticatedLayout >
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

        <div class="container">
            <table class="table table-responsive">
                <thead>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </thead>

                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>

<style lang="css" scoped>
    .bg-image, .head-info{
        position: relative;
        width: 90%;
        height: 50%;
    }
    .head-info{
        height: auto;
    }
    .bg-image .profile-pic{
        position: relative;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        left: 2%;
        bottom: -68%;
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