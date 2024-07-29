<template>
  <section>
    <div class="container px-4 py-5 mx-auto max-w-screen-xl h-screen">
      <div class="flex flex-col justify-center mx-auto text-center h-full">
        <h1
          class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white"
        >
          Discover Japan
        </h1>
        <h1
          class="mb-4 text-lg font-extrabold tracking-tight leading-none text-gray-900 md:text-xl lg:text-2xl dark:text-white"
        >
          Your First Adventure Awaits
        </h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">
          Experience Japan’s vibrant cities, rich culture, and incpinkible cuisine. Your unforgettable journey starts
          here.
        </p>
        <form class="mb-4 w-full max-w-md mx-auto" @submit.prevent="placeSearch">
          <label for="destination" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
            >Destination</label
          >
          <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-x-0 start-0 flex items-center ps-3.5 pointer-events-none">
              <svg
                class="stroke-red-500 size-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"
                />
              </svg>
            </div>
            <input
              v-model="location"
              type="text"
              id="destination"
              class="block w-full p-4 ps-10 text-sm text-gray-900 rounded-lg bg-white focus:outline-none focus:ring-white focus:border-red-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
              placeholder="Where are you going?"
              required
            />
            <button
              type="submit"
              class="text-white absolute end-2.5 bottom-2.5 bg-red-500 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-500 dark:focus:ring-red-800"
            >
              Explore
            </button>
            <div
              class="hidden absolute top-12 w-full text-left text-sm font-medium text-gray-900 bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
            >
              <p class="block w-full font-bold px-4 py-4 border-b dark:border-gray-600">Recomended</p>
              <template v-for="location in recomendedLocation">
                <a
                  href="#"
                  class="flex items-center space-x-3 block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-red-600 focus:outline-none focus:ring-2 focus:ring-red-600 focus:text-red-600 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white"
                >
                  <svg
                    class="flex-shrink-0 w-3.5 h-3.5 text-yellow-500 dark:text-yellow-400"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"
                    />
                  </svg>
                  <span>{{ location }}</span>
                </a>
              </template>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const location = ref('')

const recomendedLocation = ['Tokyo', 'Nagasaki']

const placeSearch = async () => {
  router.push({
    name: 'place',
    query: { location: location.value }
  })
}
</script>
