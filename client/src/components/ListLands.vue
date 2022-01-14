<template>
  <div class="w-full w-screen-md mx-auto pt-8 px-16 pt-24 mb-8">
    <h1 class="text-center text-3xl font-bold">Benvenuto!</h1>
    <p class="text-center text-lg py-2 pb-2">
      Ricerca in <span class="text-bold">BANCA DELLA TERRA</span> il tuo pezzo
      di isola dei sogni
    </p>
    <div class="flex items-center justify-start mb-5">
      <div class="mr-auto mr-3">Ordina per dimensioni:</div>
      <span
        class="rounded-lg p-2 uppercase text-xs mr-2 cursor-pointer"
        :class="{
          'bg-red-200 text-red-900': sortMethod == 'asc',
          'bg-gray-300 text-gray-800': sortMethod != 'asc',
        }"
        @click="sort('asc')"
        >Crescente</span
      >
      <span
        class="rounded-lg p-2 uppercase text-xs cursor-pointer"
        :class="{
          'bg-red-200 text-red-900': sortMethod == 'desc',
          'bg-gray-300 text-gray-800': sortMethod != 'desc',
        }"
        @click="sort('desc')"
        >Decrescente</span
      >
    </div>
    <div class="grid grid-cols-3 gap-8">
      <div
        class="bg-gray-200 rounded flex flex-col p-3"
        v-for="land in lands"
        :key="land.id"
      >
        <div class="h-auto w-full cursor-pointer" @click="goToDetail(land)">
          <div class="flex flex-row items-center pt-3">
            <div class="flex-grow mb-2">
              Terreno a: <span class="font-bold">{{ land.municipality }}</span>
            </div>
            <div class="flex">
              <h2 class="ml-auto text-green-600 font-bold text-xl">
                {{ land.dimension }} m<sup>2</sup>
              </h2>
            </div>
          </div>
          <img class="w-auto h-56" :src="land.img" alt="img_land" />
          <div class="mt-2 ml-auto space-x-3 flex justify-end">
            <button
              class="text-green-600 text-sm font-bold"
              @click="edit(land)"
            >
              Modifica
            </button>
            <button
              class="text-red-600 text-sm font-bold"
              @click="deleteLand(land)"
            >
              Elimina
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ListLands",
  data() {
    return {
      lands: [],
      sortMethod: "asc",
    };
  },
  async mounted() {
    await this.getLands();
  },
  methods: {
    async getLands() {
      let response = await this.$axios.get(
        "http://localhost:8000/api/lands?sort=" + this.sortMethod
      );
      this.lands = response.data;
    },
    edit(land) {
      this.$router.push("/edit/" + land.id);
    },
    goToDetail(land) {
      this.$router.push("/view/" + land.id);
    },
    async deleteLand(land) {
      if (
        confirm(
          "Vuoi davvero eliminare la land: " + land.name + "?",
          "Si",
          "No"
        )
      ) {
        await this.$axios.delete("http://localhost:8000/api/lands/" + land.id);
        await this.getLands();
      }
    },
    sort(direction) {
      if (this.sortMethod != direction) {
        this.sortMethod = direction;
        this.getLands();
      }
    },
  },
};
</script>
