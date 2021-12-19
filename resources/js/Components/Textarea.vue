<template>
    <label :for="name" class="block text-sm font-medium text-gray-700">
        {{ label }}
    </label>
    <div class="mt-1">
        <textarea :id="name"
            :name="name"
            :rows="rows"
            class="block w-full border border-blue-gray-300 rounded-md shadow-sm sm:text-sm focus:ring-blue-500 focus:border-blue-500"
        />
    </div>
    <p class="mt-3 text-sm text-blue-gray-500">{{ tooltip }}</p>
</template>

<script>
export default {
    name: "Textarea",
    props: {
        name: String,
        label: String,
        rows: Number,
        tooltip: String
    }
}
</script>

<style scoped>

</style>
