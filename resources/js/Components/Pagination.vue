<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    links: [],
});
</script>

<template>
    <div class="flex items-center space-x-2">
        <template v-for="(link, key) in links" :key="key">
            <div
                v-if="link.url === null"
                v-html="link.label"
                class="px-4 py-3 text-gray-400 text-sm leading-4 border rounded"
            ></div>
            <Link
                v-else
                :href="link.url"
                v-html="link.label"
                class="px-4 py-3 text-gray-900 text-sm leading-4 border rounded hover:bg-white focus:bg-indigo-500 focus:text-white focus:border-indigo-500"
                :class="link.active ? 'bg-indigo-500 text-white' : ''"
            >
            </Link>
        </template>
    </div>
</template>
