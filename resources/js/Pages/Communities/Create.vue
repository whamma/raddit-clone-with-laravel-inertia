<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeErrorInput from "@/Components/InputError.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
    errors: Object,
});

const form = useForm({
    name: "",
    description: "",
    slug: "",
});

const submit = () => {
    form.post(route("communities.store"));
};
</script>

<template>
    <Head title="Create" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Community
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="max-w-md mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <BreezeLabel for="name" value="Name" />
                                <BreezeInput
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.name"
                                    autofocus
                                    autocomplete="name"
                                />
                                <BreezeErrorInput :message="errors.name" />
                            </div>

                            <div class="mt-4">
                                <BreezeLabel
                                    for="description"
                                    value="description"
                                />
                                <BreezeInput
                                    id="description"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.description"
                                />
                                <BreezeErrorInput
                                    :message="errors.description"
                                />
                            </div>

                            <div class="mt-4">
                                <BreezeLabel for="slug" value="slug" />
                                <BreezeInput
                                    id="slug"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.slug"
                                />
                                <BreezeErrorInput :message="errors.slug" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <BreezeButton
                                    class="ml-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Store
                                </BreezeButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
