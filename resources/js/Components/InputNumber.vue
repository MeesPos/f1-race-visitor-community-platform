<template>
    <label :for="name" class="block text-sm font-medium text-gray-700">{{ label }}</label>

    <div class="mt-1">
        <input type="number"
               :name="name"
               :id="name"
               :min="min"
               :max="max"
               :placeholder="placeholder"
               class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
        >
    </div>
</template>

<script>
export default {
    name: "InputNumber",
    props: {
        name: String,
        label: String,
        min: Number,
        max: Number,
        placeholder: String
    }
}
</script>

<style scoped>

</style>
