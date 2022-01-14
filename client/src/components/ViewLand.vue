<template>
    <div class="w-full max-w-screen-md mx-auto py-8 px-3">
    <div class="flex items-end">
      <h1 class="font-bold text-3xl">{{ land.municipality }}</h1>
      <h2 class="ml-auto text-green-600 font-bold text-2xl">
        {{ land.dimension }} m<sup>2</sup>
      </h2>
    </div>
    <div class="flex mt-5 items-stretch">
      <div class="h-56 w-56 w-full bg-white cursor-pointer mr-8">
        <img class="w-full h-full" :src="land.img" alt="land_img" />
      </div>
      <div class="flex flex-col justify-between flex-grow">
        <div
          v-for="field in fields"
          :key="field.code"
          class="border-b border-gray-600 flex items-center"
        >
          <span>
            {{ field.label }}
          </span>
          <span class="ml-auto font-bold">
            {{ land[field.code] }}
          </span>
        </div>
      </div>
    </div>
    <div>
      <button
        @click="goToList()"
        class="text-gray-500 text-sm cursor-pointer mt-5"
      >
        Torna indietro
      </button>
    </div>
  </div>
</template>

<script>
export default {
    name: "ViewLand",
    data() {
    return {
      land: {},
      fields: [
          {
          label: "Comune di Appartenenza",
          code: "municipality",
          type: "text",
        },
        {
          label: "Foto area (link Url)",
          code: "img",
          type: "text",
        },
        {
          label: "Dimensioni",
          code: "dimension",
          type: "number",
        },
        {
          label: "Foglio catastale",
          code: "cadastral_sheet",
          type: "text",
        },
        {
          label: "Mappale castastale",
          code: "cadastral_map",
          type: "text",
        },
        {
          label: "Parcella catastale",
          code: "cadastral_parcel",
          type: "text",
        },
        {
          label: "Tipologia terreno",
          code: "land_type",
          type: "select",
          options: [
            {
              label: "Argilloso",
              code: "argilloso",
              id: 1
            },
            {
              label: "Sabbioso",
              code: "sabbioso",
              id: 2
            },
            {
              label: "Ghiaioso",
              code: "ghiaioso",
              id: 3
            },
            {
              label: "Tufo",
              code: "tufo",
              id: 4
            },
          ],
        },
        {
          label: "Tipi irrigazione",
          code: "irrigation_type",
          type: "select",
          options: [
            {
              label: "A scorrimento",
              code: "a_scorrimento",
              id: 1
            },
            {
              label: "Pozzo",
              code: "pozzo",
              id: 2
            },
            {
              label: "Canale",
              code: "canale",
              id: 3
            },
            {
              label: "Senz'acqua",
              code: "senz_acqua",
              id: 4
            },
          ],
        },
        {
          label: "Tipi offerta",
          code: "offer_type",
          type: "select",
          options: [
            {
              label: "Vendita",
              code: "vendita",
              id: 1
            },
            {
              label: "Affitto",
              code: "affitto",
              id: 2
            },
            {
              label: "Affitto gratuito",
              code: "affitto_gratuito",
              id: 3
            }
          ],
        },
      ],
    };
  },
  async mounted() {
    let landId = this.$route.params.id;

    let response = await this.$axios.get(
      "http://localhost:8000/api/lands/" + landId
    );
    console.log(response);
    this.land = response.data;
  },
  methods: {
    goToList() {
      this.$router.push("/");
    },
  }
}
</script>