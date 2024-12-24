<script setup>
import UserSettingsLayout from '@/Layouts/UserSettingsLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>
<template >
    <Head title="settings" />
    <UserSettingsLayout >
        <Link :href="route('profile')" class="text-decoration-none"><i class="bi bi-trash"></i> Trash</Link>
    </UserSettingsLayout>
</template>
<style lang="">
    
</style>