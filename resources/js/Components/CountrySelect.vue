<template>
    <Listbox as="div">
        <ListboxLabel class="block text-sm font-medium text-gray-700">
            {{ label }}
        </ListboxLabel>

        <Multiselect :options="countries"
            mode="single"
            :searchable="true"
            placeholder="Where do you live?"
        />
    </Listbox>
</template>

<script>
import { Listbox, ListboxLabel } from '@headlessui/vue'
import Multiselect from '@vueform/multiselect'
import '@vueform/multiselect/themes/default.css'
import countries from 'countries-list'

export default {
    name: "CountrySelect",
    components: {
        Listbox,
        ListboxLabel,
        Multiselect
    },
    props: {
        label: String
    },
    computed: {
        countries () {
            const countryCodes = Object.keys(countries.countries);
            return countryCodes.map(code => countries.countries[code].name);
        }
    }
}
</script>

<style scoped>

</style>
