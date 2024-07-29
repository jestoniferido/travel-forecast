<template>
  <section>
    <div class="container px-4 py-5 mx-auto max-w-screen-xl">
      <div class="splide">
        <div class="splide__track rounded-xl">
          <ul class="splide__list">
            <li v-for="image in props.images" class="splide__slide flex justify-center px-5">
              <img class="w-full h-full rounded-xl" :src="image.link" :alt="image.link" />
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { onMounted, defineProps } from 'vue'
import Splide from '@splidejs/splide'

const props = defineProps({
  images: {
    type: Array,
    required: true
  }
})

onMounted(() => {
  const splide = new Splide('.splide', {
    type: 'loop',
    height: '30rem',
    focus: 'center',
    autoplay: 'true',
    autoWidth: true
  })

  splide.mount()
})
</script>
