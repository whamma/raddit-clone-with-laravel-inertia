<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    postSlug: String,
});
</script>

<template>
    <Link
        method="post"
        as="button"
        :href="route('post.down-vote', [postSlug])"
        class="text-gray-400 hover:text-red-500"
        preserve-scroll
        ><svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19 9l-7 7-7-7"
            /></svg
    ></Link>
</template>
