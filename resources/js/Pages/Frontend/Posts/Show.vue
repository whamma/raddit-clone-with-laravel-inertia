<script setup>
import FrontendLayout from "@/Layouts/Frontend.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import PostCard from "@/Components/PostCard.vue";
import Pagination from "@/Components/Pagination.vue";

defineProps({
    community: Object,
    post: Object,
});
</script>

<template>
    <Head title="Front post show" />

    <FrontendLayout>
        <section
            class="py-4 flex max-w-7xl mx-auto sm:px-6 lg:px-8 items-start space-x-4"
        >
            <div class="w-8/12 flex flex-col space-y-4">
                <div class="px-4 py-2 bg-white">
                    <h2 class="font-semibold text-2xl text-gray-800">
                        <span>r/</span>
                        <Link
                            :href="
                                route(
                                    'frontend.communities.show',
                                    community.slug
                                )
                            "
                        >
                            {{ community.name }}
                        </Link>
                    </h2>
                </div>
                <div class="px-4 py-2 bg-white flex flex-col space-y-2">
                    <div class="flex items-center justify-between text-sm">
                        <div class="text-sm text-gray-400">
                            Posted by
                            <span class="text-gray-800">{{
                                post.data.username
                            }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <Link
                                :href="
                                    route('frontend.communities.posts.edit', [
                                        community.slug,
                                        post.data.slug,
                                    ])
                                "
                                >Edit</Link
                            >
                            <Link
                                as="button"
                                type="button"
                                method="delete"
                                :href="
                                    route(
                                        'frontend.communities.posts.destroy',
                                        [community.slug, post.data.slug]
                                    )
                                "
                                class="text-red-600 hover:text-red-900"
                                >Delete</Link
                            >
                        </div>
                    </div>

                    <h1 class="text-3xl text-gray-800">
                        {{ post.data.title }}
                    </h1>
                    <p class="text-gray-700">{{ post.data.description }}</p>
                    <a
                        :href="post.data.url"
                        class="font-semibold text-blue-500 text-sm hover:text-blue-400"
                        >{{ post.data.url }}</a
                    >
                </div>
            </div>
            <div class="w-4/12">
                <div class="bg-slate-800 text-white px-4 py-2">
                    Latest Communities
                </div>
            </div>
        </section>
    </FrontendLayout>
</template>
