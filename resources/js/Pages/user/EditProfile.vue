<template>
   <AuthenticatedLayout >
    <div>
      <h1 class="text-2xl font-bold mb-4">Edit User</h1>
      <form @submit.prevent="submit">
        <div class="mb-4">
          <label for="profile_pic" class="block font-medium">Profile Picture</label>
          <input v-model="form.profile_pic" id="profile_pic" type="text" class="border rounded px-3 py-2 w-full" />
        </div>
        
        <div class="mb-4">
          <label for="address" class="block font-medium">Address</label>
          <textarea v-model="form.address" id="address" class="border rounded px-3 py-2 w-full"></textarea>
        </div>
  
        <div class="mb-4">
          <label for="bio" class="block font-medium">Bio</label>
          <textarea v-model="form.bio" id="bio" class="border rounded px-3 py-2 w-full"></textarea>
        </div>
  
        <div class="mb-4">
          <label for="contact" class="block font-medium">Contact</label>
          <input v-model="form.contact" id="contact" type="text" class="border rounded px-3 py-2 w-full" />
        </div>
  
        <div class="mb-4">
          <label for="social_links" class="block font-medium">Social Links</label>
          <textarea v-model="form.social_links" id="social_links" class="border rounded px-3 py-2 w-full"></textarea>
        </div>
  
        <button
          type="submit"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        >
          Save Changes
        </button>
      </form>
    </div>
   </AuthenticatedLayout>
  </template>
  
  <script setup>
 import { useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps } from 'vue';
const props = defineProps({
    user: {
        type: Object,
        default: () => ({})
    },
    userInfo: {
        type: Object,
        default: () => ({})
    }
})
        const form = useForm({
            profile_pic: props.userInfo ? props.userInfo.profile_pic : '',
            address: props.userInfo ? props.userInfo.address : '',
            bio: props.userInfo ? props.userInfo.bio : '',
            contact: props.userInfo ? props.userInfo.contact : '',
            social_links: props.userInfo ? props.userInfo.social_links : '',
        });

        const submit = () => {
            form.put(route('users.update', props.user.id));
        };

        console.log('user => ', props.user);
        console.log('userInfo => ', props.userInfo);
  </script>
  
  <style scoped>
  /* Add any styles if needed */
  </style>
  