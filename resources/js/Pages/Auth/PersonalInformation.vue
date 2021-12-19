<template>
    <TransitionRoot as="template" :show="true">
        <Dialog as="div" class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                </TransitionChild>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                        <div>
                            <div class="mt-1 sm:mt-2">
                                <DialogTitle as="h3" class="text-lg leading-6 font-bold text-gray-900">
                                    We need some more information
                                </DialogTitle>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Before you can start, we need some more information from you.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6">
                            <nav aria-label="Progress">
                                <ol role="list" class="space-y-4 md:flex md:space-y-0 md:space-x-8">
                                    <li v-for="step in steps" :key="step.name" class="md:flex-1">
                                        <a v-if="step.status === 'complete'" class="group pl-4 py-2 flex flex-col border-l-4 border-indigo-600 hover:border-indigo-800 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                                            <span class="text-xs text-indigo-600 font-semibold tracking-wide uppercase group-hover:text-indigo-800">{{ step.id }}</span>
                                            <span class="text-sm font-medium">{{ step.name }}</span>
                                        </a>
                                        <a v-else-if="step.status === 'current'" class="pl-4 py-2 flex flex-col border-l-4 border-indigo-600 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4" aria-current="step">
                                            <span class="text-xs text-indigo-600 font-semibold tracking-wide uppercase">{{ step.id }}</span>
                                            <span class="text-sm font-medium">{{ step.name }}</span>
                                        </a>
                                        <a v-else class="group pl-4 py-2 flex flex-col border-l-4 border-gray-200 hover:border-gray-300 md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                                            <span class="text-xs text-gray-500 font-semibold tracking-wide uppercase group-hover:text-gray-700">{{ step.id }}</span>
                                            <span class="text-sm font-medium">{{ step.name }}</span>
                                        </a>
                                    </li>
                                </ol>
                            </nav>

                            <div id="step1" class="mt-5" v-if="currentStep == 1">
                                <div>
                                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>

                                    <div class="mt-1">
                                        <input type="number"
                                            name="age"
                                            min="1"
                                            max="125"
                                            v-model="step1.age"
                                            placeholder="How old are you?"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                        >
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <CountrySelect
                                        label="Country"
                                    />
                                </div>

                                <div class="text-right mt-5">
                                    <button type="button"
                                        @click.prevent="goToStep(2)"
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        v-text="'Next'"
                                    />
                                </div>
                            </div>
                            <div id="step2" class="mt-5" v-if="currentStep == 2">
                                <div>
                                    <label for="photo" class="block block text-sm font-medium text-gray-700">
                                        Profile picture
                                    </label>

                                    <div class="mt-1 flex items-center">
                                        <img class="inline-block h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2.5&w=256&h=256&q=80" alt="" />
                                        <div class="ml-4 flex">
                                            <div class="relative bg-white py-2 px-3 border border-blue-gray-300 rounded-md shadow-sm flex items-center cursor-pointer hover:bg-blue-gray-50 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-blue-gray-50 focus-within:ring-blue-500">
                                                <label for="user-photo" class="relative text-sm font-medium text-blue-gray-900 pointer-events-none">
                                                    <span>Change</span>
                                                    <span class="sr-only"> user photo</span>
                                                </label>
                                                <input id="user-photo" name="user-photo" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md" />
                                            </div>
                                            <button type="button" class="ml-3 bg-transparent py-2 px-3 border border-transparent rounded-md text-sm font-medium text-blue-gray-900 hover:text-blue-gray-700 focus:outline-none focus:border-blue-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-gray-50 focus:ring-blue-500">
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <label for="description" class="block text-sm font-medium text-gray-700">
                                        Biography
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="description"
                                            name="description"
                                            rows="3"
                                            class="block w-full border border-blue-gray-300 rounded-md shadow-sm sm:text-sm focus:ring-blue-500 focus:border-blue-500"
                                        />
                                    </div>
                                    <p class="mt-3 text-sm text-blue-gray-500">Tell something nice about yourself!</p>
                                </div>

                                <div class="text-right mt-5">
                                    <button type="button"
                                        @click.prevent="goToStep(1)"
                                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        v-text="'Previous'"
                                    />

                                    <button type="button"
                                        @click.prevent="goToStep(3)"
                                        class="ml-3 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        v-text="'Next'"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import CountrySelect from "../../Components/CountrySelect";

export default {
    name: "PersonalInformation",
    data() {
        return {
            currentStep: 1,
            step1: {
                name: '',
                email: ''
            },
            step2: {
                city: '',
                state: ''
            },
            steps: [
                { id: 'Step 1', name: 'Personal Information', status: 'current' },
                { id: 'Step 2', name: 'Profile Information', status: 'upcoming' }
            ]
        }
    },
    ready: function () {
        console.log('ready')
    },
    methods: {
        goToStep: function (step) {
            this.currentStep = step;
        }
    },
    components: {
        CountrySelect,
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot
    }
}
</script>
