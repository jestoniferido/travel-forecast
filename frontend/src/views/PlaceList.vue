<template>
  <Header :title="location" :breadcrumbs="breadcrumbs" />

  <div class="mb-8 px-4 mx-auto max-w-screen-xl mt-5 md:mt-10">
    <Transition mode="out-in" name="fade">
      <template v-if="loading">
        <div class="flex items-center justify-center h-96">
          <div role="status">
            <svg
              aria-hidden="true"
              class="w-8 h-8 text-red-300 animate-spin dark:text-red-400 fill-red-600"
              viewBox="0 0 100 101"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="currentColor"
              />
              <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentFill"
              />
            </svg>
            <span class="sr-only">Loading...</span>
          </div>
        </div>
      </template>

      <template v-else>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
          <div
            v-for="place in places"
            class="flex flex-col gap-5 pb-5 border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700"
          >
            <div class="relative aspect-w-1 aspect-h-1 h-60 overflow-hidden">
              <RouterLink
                :to="`/place/${location}/${place.id}`"
                class="text-gray-900 dark:text-white hover:text-red-500 dark:hover:text-red-400"
              >
                <template v-if="place.photos?.length">
                  <img
                    class="object-cover w-full h-full transition-transform duration-300 ease-in-out transform hover:scale-110 rounded-t-lg"
                    :src="place.photos[0]?.link"
                    alt=""
                  />
                </template>
                <template v-else>
                  <div role="status" class="max-w-sm animate-pulse dark:border-gray-700">
                    <div class="flex items-center justify-center h-60 bg-gray-300 dark:bg-gray-700">
                      <svg
                        class="w-10 h-10 text-gray-200 dark:text-gray-600"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 16 20"
                      >
                        <path
                          d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z"
                        />
                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                      </svg>
                    </div>
                    <span class="sr-only">Loading...</span>
                  </div>
                </template>

                <div
                  :class="!place.forcast ? 'animate-pulse' : ''"
                  class="absolute flex items-center gap-2 top-2 left-2 bg-gray-400 opacity-90 font-bold text-white text-md px-2 py-1 rounded"
                >
                  <template v-if="place.forcast">
                    <img class="w-7" :src="`https://openweathermap.org/img/wn/${place.forcast.weather[0].icon}.png`" />
                    <p>{{ Math.round(place.forcast.main.temp) }}&deg;C</p>
                  </template>
                  <template v-else>
                    <svg
                      id="theme-toggle-light-icon"
                      class="w-5 h-5"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                    <p class="text-gray-400">100&deg;C</p>
                  </template>
                </div>
              </RouterLink>
            </div>
            <div class="px-3">
              <RouterLink
                :to="`/place/${location}/${place.id}`"
                class="text-gray-900 dark:text-white hover:text-red-500 dark:hover:text-red-400"
              >
                <h5 class="text-2xl font-bold tracking-tight">{{ place.name }}</h5>
              </RouterLink>
            </div>
            <div class="flex gap-3 px-3">
              <div>
                <svg
                  class="stroke-red-500 size-5"
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
              <p class="font-normal text-gray-700 dark:text-gray-400">{{ place.location.formatted_address }}</p>
            </div>
          </div>
        </div>
      </template>
    </Transition>
  </div>
</template>

<script setup>
import Header from '../components/Header.vue'
import { onBeforeMount, ref } from 'vue'
import { useRoute } from 'vue-router'
import { searchPlace, getPlacePhotos } from '@/services/place-service'
import { getCurrentWeather } from '@/services/weather-service'

const route = useRoute()

const loading = ref(false)

const places = ref([])

const location = route.query.location

const breadcrumbs = [
  {
    name: 'List',
    active: true
  }
]

const initialize = async (location) => {
  let loadingTimeout

  const showLoading = () => {
    loading.value = true
  }

  loadingTimeout = setTimeout(showLoading, 500)

  const response = await searchPlace(location)

  places.value = response.data

  loading.value = false

  clearTimeout(loadingTimeout)

  await Promise.all(
    places.value.map(async (place) => {
      const photos = await getPlacePhotos(place.id, 1)
      place.photos = photos.data
    })
  )

  await Promise.all(
    places.value.map(async (place) => {
      const weather = await getCurrentWeather(place.geocodes.main.latitude, place.geocodes.main.longitude, 'metric')
      place.forcast = weather.data
    })
  )
}

onBeforeMount(() => {
  initialize(location)
})
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  @apply transition-opacity duration-100;
}
.fade-enter-from,
.fade-leave-to {
  @apply opacity-0;
}
</style>
