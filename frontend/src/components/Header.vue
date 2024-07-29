<template>
  <section class="bg-red-500">
    <div class="container px-4 py-5 mx-auto max-w-screen-xl">
      <h1
        class="mb-5 text-2xl font-extrabold capitalize tracking-tight leading-none text-white md:text-3xl lg:text-4xl dark:text-white"
      >
        {{ props.title }}
      </h1>

      <nav class="flex py-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
          <li class="inline-flex items-center">
            <div class="flex items-center">
              <svg
                class="size-4 text-white"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"
                />
              </svg>
              <a
                href="/"
                class="ms-1 text-sm font-medium text-white hover:text-gray-800 md:ms-2 dark:text-white dark:hover:text-white"
                >Home</a
              >
            </div>
          </li>
          <li v-for="breadcrumb in breadcrumbs">
            <div class="flex items-center">
              <svg
                class="size-4 rtl:rotate-180 block mx-1 text-white"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 6 10"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 9 4-4-4-4"
                />
              </svg>
              <RouterLink
                v-if="!breadcrumb.active"
                :to="breadcrumb.route"
                class="ms-1 text-sm font-medium text-white hover:text-gray-800 md:ms-2 dark:text-white dark:hover:text-white"
                >{{ breadcrumb.name }}
              </RouterLink>
              <span v-else class="ms-1 text-sm font-medium capitalize text-gray-800 md:ms-2">{{
                breadcrumb.name
              }}</span>
            </div>
          </li>
        </ol>
      </nav>
    </div>
  </section>
</template>

<script setup>
import { defineProps } from 'vue'

let props = defineProps({
  title: {
    type: String,
    required: true
  },
  breadcrumbs: {
    type: Array,
    required: true
  }
})
</script>
