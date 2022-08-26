<script setup>
import FrontendLayout from "@/Layouts/Frontend.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import PostCard from "@/Components/PostCard.vue";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    community: Object,
    post: Object,
});

const form = useForm({
    content: "",
});

const addComment = () => {
    form.post(
        route("frontend.posts.comments", [
            props.community.slug,
            props.post.data.slug,
        ]),
        {
            onSuccess: () => form.reset(),
        }
    );
};
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
                        <div
                            v-if="
                                $page.props.auth.auth_check && post.data.owner
                            "
                            class="flex items-center space-x-2"
                        >
                            <Link
                                :href="
                                    route('communities.posts.edit', [
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
                                    route('communities.posts.destroy', [
                                        community.slug,
                                        post.data.slug,
                                    ])
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
                    <hr />
                    <!-- comment list -->
                    <ul role="list" class="divide-y divide-gray-200 m-2 p-2">
                        <li
                            class="py-4 flex flex-col"
                            v-for="comment in post.data.comments"
                            :key="comment.id"
                        >
                            <div class="text-sm text-gray-400">
                                Commented by<span
                                    class="font-semibold m-1 text-gray-700"
                                    >{{ comment.username }}</span
                                >
                            </div>
                            <div class="text-gray-600">
                                {{ comment.content }}
                            </div>
                        </li>
                    </ul>
                    <hr v-if="$page.props.auth.auth_check" />
                    <div v-if="$page.props.auth.auth_check" class="px-2 pt-5">
                        <!-- comment input -->
                        <h2>Your comment</h2>
                        <form @submit.prevent="addComment" class="w-2/3">
                            <label for="comment" class="sr-only">Comment</label>
                            <div>
                                <textarea
                                    v-model="form.content"
                                    rows="5"
                                    name="comment"
                                    id="comment"
                                    class="shadow-sm focus:ring-blue-500 w-full focus:border-blue-500 block sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Add your comment..."
                                />
                            </div>
                            <div class="mt-2 flex justify-end">
                                <button
                                    type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                >
                                    Add
                                </button>
                            </div>
                        </form>
                    </div>
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
