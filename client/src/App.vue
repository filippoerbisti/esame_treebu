<template>
  <div id="app" class="h-screen flex flex-col">
    <Navigation class="fixed z-40"></Navigation>
    <div class="flex-grow z-10 px-16 pt-24 pb-8">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import Navigation from '@/components/Navigation.vue'

export default {
  name: 'App',
  components: {
    Navigation
  }
}
</script>
