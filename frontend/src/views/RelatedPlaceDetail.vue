<template>
  <Header :title="location" :breadcrumbs="breadcrumbs" />

  <Transition mode="out-in" name="fade">
    <template v-if="detail.photos?.length">
      <Carousel :images="detail.photos" />
    </template>
    <template v-else>
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
  </Transition>

  <div v-if="!loading" class="bg-white dark:bg-gray-900 mb-10">
    <div class="container px-4 mx-auto max-w-screen-xl">
      <div class="md:flex justify-between mb-5">
        <div>
          <h1
            class="text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl dark:text-white mb-5"
          >
            {{ detail.name }}
          </h1>

          <div class="flex items-center mb-5 gap-2">
            <div class="rounded-full border border-2 border-red-500 p-1 animate-pulse">
              <svg
                class="stroke-red-500 size-5"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
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
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ detail.location.formatted_address }}</p>
          </div>
        </div>

        <div class="sm:flex sm:justify-between space-y-5 sm:space-y-0 gap-10">
          <div class="flex sm:flex-col items-center gap-2">
            <div class="rounded-full border border-2 border-red-500 p-1 animate-pulse">
              <svg class="size-5 stroke-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M14 13.5V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V13.5"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M10 13.5351C8.8044 14.2268 8 15.5195 8 17C8 19.2092 9.79086 21 12 21C14.2091 21 16 19.2092 16 17C16 15.5195 15.1956 14.2268 14 13.5352"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </div>
            <div class="flex flex-col sm:items-center">
              <p class="text-xs sm:text-sm font-normal text-gray-700 dark:text-gray-400">Temp</p>
              <p class="font-bold text-gray-700 dark:text-gray-400">
                {{ Math.round(detail.forcasts[0].main.temp) }}&deg;C
              </p>
            </div>
          </div>

          <div class="flex sm:flex-col items-center gap-2">
            <div class="rounded-full border border-2 border-red-500 p-1 animate-pulse">
              <svg class="size-5 stroke-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M15.7639 7C16.3132 6.38625 17.1115 6 18 6C19.6569 6 21 7.34315 21 9C21 10.6569 19.6569 12 18 12H3M8.50926 4.66667C8.87548 4.2575 9.40767 4 10 4C11.1046 4 12 4.89543 12 6C12 7.10457 11.1046 8 10 8H3M11.5093 19.3333C11.8755 19.7425 12.4077 20 13 20C14.1046 20 15 19.1046 15 18C15 16.8954 14.1046 16 13 16H3"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </div>

            <div class="flex flex-col sm:items-center">
              <p class="text-xs sm:text-sm font-normal text-gray-700 dark:text-gray-400">Wind</p>
              <p class="font-bold text-gray-700 dark:text-gray-400">
                {{ Math.round(detail.forcasts[0].wind.speed) }} m/s
              </p>
            </div>
          </div>

          <div class="flex sm:flex-col items-center gap-2">
            <div class="rounded-full border border-2 border-red-500 p-1 animate-pulse">
              <svg class="size-5 stroke-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M15.0007 12C15.0007 13.6569 13.6576 15 12.0007 15C10.3439 15 9.00073 13.6569 9.00073 12C9.00073 10.3431 10.3439 9 12.0007 9C13.6576 9 15.0007 10.3431 15.0007 12Z"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M12.0012 5C7.52354 5 3.73326 7.94288 2.45898 12C3.73324 16.0571 7.52354 19 12.0012 19C16.4788 19 20.2691 16.0571 21.5434 12C20.2691 7.94291 16.4788 5 12.0012 5Z"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </div>

            <div class="flex flex-col sm:items-center">
              <p class="text-xs sm:text-sm font-normal text-gray-700 dark:text-gray-400">Visibility</p>
              <p class="font-bold text-gray-700 dark:text-gray-400">
                {{ Math.round(detail.forcasts[0].visibility / 1000) }} Km
              </p>
            </div>
          </div>

          <div class="flex sm:flex-col items-center gap-2">
            <div class="rounded-full border border-2 border-red-500 p-1 animate-pulse">
              <svg class="size-5 stroke-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M12 21.5C16.1012 21.5 19.5 18.4372 19.5 14.5714C19.5 12.1555 18.2672 9.71249 16.8732 7.70906C15.4698 5.69214 13.8515 4.04821 12.9778 3.21778C12.4263 2.69364 11.5737 2.69364 11.0222 3.21779C10.1485 4.04821 8.53016 5.69214 7.1268 7.70906C5.73282 9.71249 4.5 12.1555 4.5 14.5714C4.5 18.4372 7.8988 21.5 12 21.5Z"
                  stroke-width="2"
                />
                <path
                  d="M12 18C11.4747 18 10.9546 17.8965 10.4693 17.6955C9.98396 17.4945 9.54301 17.1999 9.17157 16.8284C8.80014 16.457 8.5055 16.016 8.30448 15.5307C8.10346 15.0454 8 14.5253 8 14"
                  stroke-linecap="round"
                />
              </svg>
            </div>

            <div class="flex flex-col sm:items-center">
              <p class="text-xs sm:text-sm font-normal text-gray-700 dark:text-gray-400">Humidity</p>
              <p class="font-bold text-gray-700 dark:text-gray-400">
                {{ Math.round(detail.forcasts[0].main.humidity) }} %
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div v-show="!loading" class="container px-4 mx-auto max-w-screen-xl mb-10">
    <div id="accordion-open" data-accordion="open">
      <h2 id="accordion-open-heading-1">
        <button
          type="button"
          class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border rounded-md border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3 mb-5"
          data-accordion-target="#accordion-open-body-1"
          aria-expanded="true"
          aria-controls="accordion-open-body-1"
        >
          <span class="flex items-center">
            <svg
              class="w-5 h-5 me-2 shrink-0"
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

            Hourly Forecast
          </span>
          <svg
            data-accordion-icon
            class="w-3 h-3 rotate-180 shrink-0"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 10 6"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 5 5 1 1 5"
            />
          </svg>
        </button>
      </h2>
      <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
        <div v-if="!loading" class="dark:bg-gray-900">
          <div class="flex flex-col lg:flex-row justify-between gap-5 mb-5">
            <div
              v-for="forcast in todaysForcast"
              class="flex flex-col items-center gap-1 bg-gray-300 rounded-md p-2 w-full text-gray-900"
            >
              <p class="font-bold">{{ moment(forcast.date_time).format('HH:mm a') }}</p>
              <img class="h-10" :src="`https://openweathermap.org/img/wn/${forcast.weather[0].icon}@2x.png`" />
              <p class="font-bold">
                {{ Math.round(forcast.main.temp) }}&deg; / {{ Math.round(forcast.main.feels_like) }}&deg;
              </p>
              <small class="capitalize">{{ forcast.weather[0].description }}</small>
            </div>
          </div>
        </div>
      </div>

      <h2 id="accordion-open-heading-3">
        <button
          type="button"
          class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border rounded-md border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3 mb-5"
          data-accordion-target="#accordion-open-body-3"
          aria-expanded="false"
          aria-controls="accordion-open-body-3"
        >
          <span class="flex items-center">
            <svg
              class="w-5 h-5 me-2 shrink-0"
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

            5 Days Forecast
          </span>
          <svg
            data-accordion-icon
            class="w-3 h-3 rotate-180 shrink-0"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 10 6"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 5 5 1 1 5"
            />
          </svg>
        </button>
      </h2>
      <div id="accordion-open-body-3" class="hidden" aria-labelledby="accordion-open-heading-3">
        <div v-if="!loading">
          <div class="space-y-5">
            <div
              v-for="forcast in detail.forcasts"
              class="flex justify-between items-center gap-1 bg-gray-300 rounded-md p-3 w-full text-gray-900"
            >
              <p class="font-bold">{{ moment(forcast.date_time).format('MMMM Do YYYY, HH:mm a') }}</p>
              <div class="flex items-center">
                <img class="h-6" :src="`https://openweathermap.org/img/wn/${forcast.weather[0].icon}@2x.png`" />
                <p class="capitalize font-bold">{{ forcast.weather[0].description }}</p>
              </div>
              <p class="font-bold">
                {{ Math.round(forcast.main.temp) }}&deg; / {{ Math.round(forcast.main.feels_like) }}&deg;
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import Header from '@/components/Header.vue'
import Carousel from '@/components/Carousel.vue'
import { useRoute } from 'vue-router'
import { onBeforeMount, onMounted, ref, computed } from 'vue'
import { initFlowbite } from 'flowbite'
import moment from 'moment'
import { getPlaceDetails, getPlacePhotos } from '@/services/place-service'
import { getCurrentWeather, getWeatherForecast } from '@/services/weather-service'

const route = useRoute()

const loading = ref(true)

const relatedPlacesloading = ref(true)

const location = route.params.location

const id = route.params.id

const breadcrumbs = [
  {
    name: 'List',
    route: `/place?location=${location}`,
    active: false
  },
  {
    name: 'Detail',
    route: `/place/${location}/${id}`,
    active: false
  },
  {
    name: 'Related Places',
    active: true
  }
]

const detail = ref({})

const todaysForcast = computed(() => detail.value.forcasts.splice(0, 8))

const init = async () => {
  const placePhotos = await getPlacePhotos(route.params.related)
  detail.value.photos = placePhotos.data

  const placeDetails = await getPlaceDetails(route.params.related)
  detail.value = { ...detail.value, ...placeDetails.data }

  const weatherForecast = await getWeatherForecast(
    placeDetails.data.geocodes.main.latitude,
    placeDetails.data.geocodes.main.longitude
  )
  detail.value.forcasts = weatherForecast.data

  loading.value = false

  if (detail.value.related_places.hasOwnProperty('children')) {
    await Promise.all(
      detail.value.related_places.children.map(async (place) => {
        const detail = await getPlaceDetails(place.fsq_id)
        place.detail = detail.data
      })
    )

    relatedPlacesloading.value = false

    await Promise.all(
      detail.value.related_places.children.map(async (place) => {
        const photos = await getPlacePhotos(place.fsq_id, 1)
        place.photos = photos.data

        const weather = await getCurrentWeather(
          place.detail.geocodes.main.latitude,
          place.detail.geocodes.main.longitude,
          'metric'
        )
        place.forcast = weather.data
      })
    )
  }
}

onBeforeMount(() => {
  init()
})

onMounted(() => initFlowbite())
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
