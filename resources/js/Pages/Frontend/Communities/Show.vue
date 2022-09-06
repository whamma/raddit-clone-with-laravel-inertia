<script setup>
import FrontendLayout from "@/Layouts/Frontend.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import PostCard from "@/Components/PostCard.vue";
import Pagination from "@/Components/Pagination.vue";
import CommunityList from "@/Components/CommunityList.vue";

defineProps({
    community: Object,
    communities: Object,
    posts: Object,
});
</script>

<template>
    <Head title="Front community show" />

    <FrontendLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    r/{{ community.name }}
                </h2>
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
            </div>
        </template>

        <section
            class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-start space-x-4"
        >
            <div class="w-8/12">
                <div class="flex flex-col space-y-4">
                    <PostCard
                        v-for="post in posts.data"
                        :key="post.id"
                        :post="post"
                        :community="community.slug"
                    />
                </div>
                <div class="m-2 p-2">
                    <Pagination :links="posts.meta.links" />
                </div>
            </div>
            <div class="w-4/12">
                <div class="w-full bg-white rounded-lg">
                    <h2
                        class="w-full px-6 py-4 font-semibold bg-indigo-700 text-white rounded-t-lg"
                    >
                        About {{ community.name }}
                    </h2>
                    <div class="px-4 py-2">{{ community.description }}</div>
                </div>
                <CommunityList class="mt-4" :communities="communities.data">
                    <template #title>Latest Communities</template>
                </CommunityList>
            </div>
        </section>
    </FrontendLayout>
</template>
