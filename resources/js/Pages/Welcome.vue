<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import PostCard from "@/Components/PostCard.vue";
import FrontendLayout from "@/Layouts/Frontend.vue";
import CommunityList from "../Components/CommunityList.vue";

defineProps({
    posts: Object,
    communities: Object,
});
</script>

<template>
    <Head title="Welcome" />

    <FrontendLayout>
        <section
            class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-start space-x-4"
        >
            <div class="w-8/12">
                <div class="flex flex-col space-y-4">
                    <PostCard
                        v-for="post in posts.data"
                        :key="post.id"
                        :post="post"
                        :community="post.community_slug"
                    />
                </div>
            </div>
            <div class="w-4/12 px-4 py-2">
                <div>Top Communities</div>
                <CommunityList :communities="communities.data" />
            </div>
        </section>
    </FrontendLayout>
</template>
