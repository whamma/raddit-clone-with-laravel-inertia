<script setup>
defineProps({
    subreddit: Object,
});
</script>

<template>
    <div>
        <h1>Subreddit is {{ subreddit.name }}</h1>
    </div>
</template>
