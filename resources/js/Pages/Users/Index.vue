<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import User from '@/Components/User.vue'
import { Link, Head } from '@inertiajs/inertia-vue3';

defineProps(['users']);

</script>

<template>
  <Head title="Users"/>

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Users
      </h2>
    </template>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
      <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
        <User
          v-for="user in users"
          :key="user.id"
          :user="user"
          />
      </div>
    </div>
  </AuthenticatedLayout>
</template>
