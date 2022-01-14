<template>
    <div class="flex items-center p-4 bg-green-700 w-screen">
    <div @click="goToHome()" class="cursor-pointer text-xl">
      <span class="text-white italic"> BANCA DELLA </span>
      <span class="text-red-900 font-bold text-green-200 italic"> TERRA </span>
    </div>
    <div class="mx-auto text-lg">
        <button 
            @click="goToHome()" 
            :class="{
            'text-black border-green-500': currentPath == 'list_lands',
            'border-green-700 hover:text-green-400 hover:border-green-300': currentPath != 'list_lands',
            }"
            class="p-2 mx-8 text-green-200 border-b-2">
            HOME
        </button>
        <button 
            @click="createLand()" 
            :class="{
            'text-black border-green-500': currentPath == 'create_land',
            'border-green-700 hover:text-green-400 hover:border-green-300': currentPath != 'create_land',
            }"
            class="p-2 px-8 text-green-200 border-b-2">
            CREA TERRENO
        </button>
    </div>
  </div>
</template>

<script>
export default {
    name: "Navigation",
    computed: {
        currentPath() {
            return this.$route.matched[0].name;
        }
    },
    methods: {
    createLand() {
      this.$router.push({
        name: "create_land",
      });
    },
    goToHome() {
      this.$router.push({
        name: "list_lands",
      });
    },
  }    
}
</script>