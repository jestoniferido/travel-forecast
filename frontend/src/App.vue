<script setup>
import { onMounted } from 'vue'
import { RouterLink, RouterView } from 'vue-router'
import Navbar from './components/Navbar.vue'

onMounted(() => {})
</script>

<template>
  <Navbar />

  <RouterView />
</template>
