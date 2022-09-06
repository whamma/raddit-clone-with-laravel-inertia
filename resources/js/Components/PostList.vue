<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    community: Object,
    posts: Array,
});
</script>

<template>
    <div class="w-full bg-white rounded-lg">
        <h2
            class="w-full px-6 py-4 font-semibold bg-indigo-700 text-white rounded-lg"
        >
            <slot name="title" />
        </h2>
        <ul
            role="list"
            class="divide-y px-6 divide-slate-300 dark:divide-slate-700"
        >
            <li v-for="post in posts" :key="post.id" class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">
                    <Link
                        :href="
                            route('frontend.communities.posts.show', [
                                community.slug,
                                post.slug,
                            ])
                        "
                        class="text-slate-800 dark:text-slate-500 font-semibold truncate text-sm"
                    >
                        {{ post.title }}
                    </Link>
                    <div>Votes({{ post.votes }})</div>
                </div>
            </li>
        </ul>
    </div>
</template>
