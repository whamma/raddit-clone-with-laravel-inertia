<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeErrorInput from "@/Components/InputError.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    errors: Object,
    community: Object,
});
</script>

<template>
    <Head title="Show" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Show Community
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="max-w-md mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div>
                            <BreezeLabel for="name" value="Name" />
                            <BreezeInput
                                id="name"
                                readonly
                                type="text"
                                class="mt-1 block w-full"
                                v-model="community.name"
                                autofocus
                                autocomplete="name"
                            />
                        </div>

                        <div class="mt-4">
                            <BreezeLabel
                                for="description"
                                value="Description"
                            />
                            <BreezeInput
                                id="description"
                                readonly
                                type="text"
                                class="mt-1 block w-full"
                                v-model="community.description"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
