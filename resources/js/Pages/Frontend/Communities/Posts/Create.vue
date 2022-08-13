<script setup>
import FrontendLayout from "@/Layouts/Frontend.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
    community: Object,
});
</script>

<template>
    <Head title="Front community show" />

    <FrontendLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Community Post
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div>
                    <h1>Community is {{ community.name }}</h1>
                </div>
            </div>
        </div>
    </FrontendLayout>
</template>
