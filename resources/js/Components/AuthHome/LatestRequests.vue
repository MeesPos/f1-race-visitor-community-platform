<template>
    <div class="pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="relative max-w-lg mx-auto divide-y-2 divide-gray-200 lg:max-w-7xl">
            <div>
                <h2 class="text-3xl tracking-tight text-center text-white font-extrabold sm:text-4xl">
                    Recent requests
                </h2>
            </div>
            <div class="mt-12 grid gap-16 pt-12 lg:grid-cols-2 grid-cols-1 lg:gap-x-5 lg:gap-y-12">
                <AddRequestEmptyState />

                <div v-for="post in posts" :key="post.title">
                    <div>
                        <a :href="post.race.href" class="inline-block">
                            <span
                                :class="[post.race.color, 'inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium']">
                              {{ post.race.name }}
                            </span>
                        </a>
                    </div>
                    <a :href="post.href" class="block mt-4">
                        <p class="text-xl font-semibold text-white">
                            {{ post.title }}
                        </p>
                        <p class="mt-3 text-base text-gray-300">
                            {{ post.description }}
                        </p>
                    </a>
                    <div class="mt-6 flex items-center">
                        <div>
                            <p class="text-sm font-medium text-white">
                                <a :href="post.author.href">
                                    {{ post.author.name }}
                                </a>
                            </p>
                            <div class="flex space-x-1 text-sm text-gray-400">
                                <time :datetime="post.datetime">
                                    {{ post.date }}
                                </time>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AddRequestEmptyState from "./AddRequestEmptyState";
export default {
    name: "LatestRequests",
    components: {AddRequestEmptyState},
    data() {
        return {
            posts: [
                {
                    title: 'Boost your conversion rate',
                    href: '#',
                    race: {name: 'Canada', href: '#', color: 'bg-red-700 text-white'},
                    description:
                        'Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor lacus arcu.',
                    date: 'Mar 16, 2020',
                    datetime: '2020-03-16',
                    author: {
                        name: 'Paul York',
                        href: '#',
                        imageUrl:
                            'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                    },
                    readingTime: '6 min',
                },
                {
                    title: 'How to use search engine optimization to drive sales',
                    href: '#',
                    race: {name: 'The Netherlands', href: '#', color: 'bg-orange-700 text-white'},
                    description:
                        'Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor lacus arcu.',
                    date: 'Mar 10, 2020',
                    datetime: '2020-03-10',
                    author: {
                        name: 'Dessie Ryan',
                        href: '#',
                        imageUrl:
                            'https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                    },
                    readingTime: '4 min',
                },
                {
                    title: 'Improve your customer experience',
                    href: '#',
                    race: {name: 'Belgium GP', href: '#', color: 'bg-green-700 text-white'},
                    description: 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab iure iusto fugiat commodi sequi.',
                    date: 'Feb 12, 2020',
                    datetime: '2020-02-12',
                    author: {
                        name: 'Easer Collins',
                        href: '#',
                        imageUrl:
                            'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                    },
                    readingTime: '11 min',
                },
            ]
        }
    }
}
</script>

<style scoped>

</style>
