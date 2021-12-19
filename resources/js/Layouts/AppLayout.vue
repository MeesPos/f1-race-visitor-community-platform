<template>
    <div>
        <Head :title="title" />

        <jet-banner />

        <div class="min-h-screen bg-f1-dark">
            <Navigation />

            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"></slot>
                </div>
            </header>

            <main>
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetBanner from '@/Jetstream/Banner.vue'
    import Head from '@inertiajs/inertia-vue3';
    import Navigation from "../Components/Navigation";

    export default defineComponent({
        props: {
            title: String,
        },
        components: {
            Navigation,
            Head,
            JetBanner
        }
    })
</script>
