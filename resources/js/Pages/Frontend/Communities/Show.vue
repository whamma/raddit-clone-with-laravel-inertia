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
                Show Community
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    v-if="$page.props.auth.auth_check"
                    class="flex items-center justify-end"
                >
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <Link
                            as="button"
                            :href="
                                route(
                                    'communities.posts.create',
                                    community.slug
                                )
                            "
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                        >
                            Create Post
                        </Link>
                    </div>
                </div>
                <div>
                    <h1>Community is {{ community.name }}</h1>
                </div>
            </div>
        </div>
    </FrontendLayout>
</template>
