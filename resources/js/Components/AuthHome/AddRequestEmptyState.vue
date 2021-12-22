<template>
    <div class="text-center lg:col-span-2 mb-4">
        <svg class="mx-auto h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
        </svg>
        <h3 class="mt-2 text-sm font-bold text-white">Do you also want to go to a Grand Prix?</h3>
        <p class="mt-1 text-sm text-gray-200">
            Make yourself heard and meet people!
        </p>
        <div class="mt-6">
            <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-f1-red hover:bg-red-500 focus:outline-none">
                <PlusIcon class="-ml-1 mr-2 h-5 w-5" aria-hidden="true" />
                New Request
            </button>
        </div>
    </div>
</template>

<script>
import { PlusIcon } from '@heroicons/vue/solid'

export default {
    name: "AddRequestEmptyState",
    components: {
        PlusIcon,
    }
}
</script>

<style scoped>

</style>
