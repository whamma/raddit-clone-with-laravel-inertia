<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import UpVoteLink from "@/Components/UpVoteLink.vue";
import DownVoteLink from "@/Components/DownVoteLink.vue";

const props = defineProps({
    post: Object,
});
</script>

<template>
    <div class="w-12 flex flex-col h-full p-2 items-center bg-slate-200">
        <UpVoteLink
            :post-slug="post.slug"
            :class="{
                'text-blue-600':
                    post.postVotes[0] && post.postVotes[0].vote === 1,
            }"
        />
        <div
            class="p-2 my-2 font-bold rounded-lg"
            :class="{
                'text-blue-600':
                    post.postVotes[0] && post.postVotes[0].vote === 1,
                'text-red-600':
                    post.postVotes[0] && post.postVotes[0].vote === -1,
            }"
        >
            {{ post.votes }}
        </div>
        <DownVoteLink
            :post-slug="post.slug"
            :class="{
                'text-red-600':
                    post.postVotes[0] && post.postVotes[0].vote === -1,
            }"
        />
    </div>
</template>
