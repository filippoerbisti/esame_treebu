<template>
    <div class="w-full max-w-screen-md mx-auto py-8 px-3">
    <div class="flex flex-col mb-3" v-for="field in fields" :key="field.code">
      <label class="mb-2 font-bold text-red-900" :for="field.code">{{
        field.label
      }}</label>
      <input
        v-if="field.type == 'text'"
        class="border border-gray-200 p-2 rounded"
        type="text"
        :id="field.code"
        v-model="newLand[field.code]"
      />
      <input
        v-if="field.type == 'number'"
        class="border border-gray-200 p-2 rounded"
        type="number"
        :id="field.code"
        v-model="newLand[field.code]"
      />
      <select
        v-if="field.type == 'select'"
        class="border border-gray-200 p-2 rounded bg-white"
        :name="field.code"
        :id="field.code"
        v-model="newLand[field.code]"
      >
        <option
          v-for="option in field.options"
          :key="option.code"
          :value="option.code"
        >
          {{ option.label }}
        </option>
      </select>
      <input
        v-if="field.type == 'checkbox'"
        class="border border-gray-200 p-2 rounded"
        type="checkbox"
        :id="field.code"
        v-model="newLand[field.code]"
      />
    </div>
    <div class="pt-3">
      <button
        @click="createLand()"
        :disabled="!formIsValid"
        class="disabled:bg-gray-300 disabled:cursor-not-allowed p-2 px-3 rounded bg-red-800 text-white"
      >
        {{ $route.name == "edit_land" ? "Salva" : "Crea" }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
    name: "CreateLand",
    data() {
        return {
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
            newLand: {
                municipality: "",
                img: "",
                dimension: 0,
                cadastral_sheet: "",
                cadastral_map: "",
                cadastral_parcel: "",
                land_type: "argilloso",
                irrigation_type: "a_scorrimento",
                offer_type: "vendita",
                offer_fee: 0,
                availability: true
            },
        };
    },
    async mounted() {
    if (this.$route.name == "edit_land") {
      let response = await this.$axios.get(
        "http://localhost:8000/api/lands/" + this.$route.params.id
      );
      this.newLand = response.data;
    }
  },
  methods: {
    async createLand() {
      if (this.$route.name == "edit_land") {
        let response = await this.$axios.put(
          "http://localhost:8000/api/lands/" + this.$route.params.id,
          this.newLand
        );

        if (response.status == 200) {
          this.$router.push("/");
        }
      } else {
        let response = await this.$axios.post(
          "http://localhost:8000/api/lands",
          this.newLand
        );

        if (response.status == 201) {
          this.$router.push("/");
        }
      }
    },
  },
  computed: {
    formIsValid() {
      return (
        this.newLand.municipality != "" &&
        this.newLand.img != "" &&
        this.newLand.dimension > 0 &&
        this.newLand.land_type != "" &&
        this.newLand.irrigation_type != "" &&
        this.newLand.offer_type != "" &&
        this.newLand.offer_fee > 0 &&
        this.newLand.availability != ""
      );
    },
  }
}
</script>