<template>
    <div class="w-full max-w-screen-md mx-auto">
    <div class="flex items-end">
      <h1 class="font-bold text-3xl">Terreno a: <span class="text-bold">{{ land.municipality }}</span></h1>
      <h2 class="ml-auto text-green-600 font-bold text-2xl">
        {{ land.dimension }} m<sup>2</sup>
      </h2>
    </div>
    <div class="flex flex-col mt-5">
      <div class="h-56 w-auto bg-white cursor-pointer flex mx-auto">
        <img class="w-full h-full" :src="land.img" alt="land_img" />
      </div>
      <div class="grid grid-cols-2 gap-8 justify-between flex-grow pt-4">
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
        class="rounded-lg p-2 uppercase text-xs cursor-pointer mt-5 bg-gray-300 text-gray-800"
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
            },
            {
              label: "Sabbioso",
              code: "sabbioso",
            },
            {
              label: "Ghiaioso",
              code: "ghiaioso",
            },
            {
              label: "Tufo",
              code: "tufo",
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
            },
            {
              label: "Pozzo",
              code: "pozzo",
            },
            {
              label: "Canale",
              code: "canale",
            },
            {
              label: "Senz'acqua",
              code: "senz_acqua",
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
            },
            {
              label: "Affitto",
              code: "affitto",
            },
            {
              label: "Affitto gratuito",
              code: "affitto_gratuito",
            }
          ],
        },
        {
          label: "Canone offerta",
          code: "offer_fee",
          type: "number",
        },
        {
          label: "Disponibile da subito",
          code: "availability",
          type: "checkbox",
        }
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