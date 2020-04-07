<template>
  <v-form v-model="valid">
    <v-container>
      <v-row>
        <v-col cols="12" md="4">
          <v-text-field v-model="numeroDocumento" label="Número de documento" required></v-text-field>
        </v-col>

        <v-col cols="12" md="4">
          <v-text-field v-model="correoElectronico" label="Correo electrónico" required></v-text-field>
        </v-col>

        <v-col cols="12" md="4">
          <v-btn color="#1F64D2" dark class="mr-4" @click="buscar">Buscar</v-btn>
        </v-col>
      </v-row>
      <div v-if="mostrarResultados">
        <v-container fluid ma-0 pa-0 fill-height>
          <v-layout row>
            <v-flex xs4>
              <v-img width="200px" src="/img/logo-spe.png"></v-img>
            </v-flex>
            <v-flex xs4></v-flex>
            <v-flex xs4>
              <v-img width="340px" src="/img/logo-mintrabajo.png"></v-img>
            </v-flex>
          </v-layout>
        </v-container>

        <v-card color="#1F64D2" dark>
          <v-card-title class="headline">{{persona.nombre}} {{persona.apellido}}</v-card-title>

          <v-card-subtitle>{{persona.tipo_documento.tipo_documento}} {{persona.documento}}</v-card-subtitle>

          <v-card-text>
            <div style="display:flex; justify-content:space-between;">
              <div>
                <span class="font-weight-bold">Prestador:</span>
                {{persona.prestador_usuario.nombre}} {{persona.prestador_usuario.apellido}}
              </div>
              <div>
                <span class="font-weight-bold">Fecha de la prueba:</span>
                {{persona.fecha_prueba}}
              </div>
            </div>
          </v-card-text>
        </v-card>

        <v-divider vertical></v-divider>

        <h3
          v-if="persona.resultados_buscador"
        >Estilos de pensamiento - Neuro fortaleza y Neuro debilidad</h3>

        <!-- Aquí imagen cerebro -->
        <v-container fill-height fluid>
          <v-row>
            <v-col align="center" justify="center">
              <v-img width="640px" src="/img/cerebro.png"></v-img>
            </v-col>
          </v-row>
        </v-container>

        <v-divider vertical></v-divider>

        <h3 v-if="persona.resultados_buscador">Perfil de competencia</h3>

        <!-- Aquí imagen circulo y texto competencia -->
        <v-container fill-height fluid>
          <v-row>
            <v-col align="center" justify="center">
              <v-img width="200px" :src="'/img/perfil_' + numImgPerfil + '.png'"></v-img>
            </v-col>
            <v-col align="left" justify="left">
              <h4>{{ persona.resultados_buscador[0].perfil.perfil }}</h4>
              <p>Este perfil de competencia se caracteriza por: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </v-col>
          </v-row>
        </v-container>

        <v-divider vertical></v-divider>

        <h3 v-if="persona.resultados_buscador">Competencias desarrolladas</h3>

        <!-- Aquí gráfico de barras -->
        <horizontal-bar-chart :chart-data="datacollection" :options="options"></horizontal-bar-chart>

        <v-divider vertical></v-divider>

        <!-- Aquí tabla competencias -->
        <v-simple-table v-if="persona.resultados_buscador">
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">Competencias</th>
                <th class="text-left">Analítico EI</th>
                <th class="text-left">Eficiente AI</th>
                <th class="text-left">Empático AD</th>
                <th class="text-left">Creativo ED</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Joven</td>
                <td>{{ persona.resultados_buscador[0].joven_ei }}</td>
                <td>{{ persona.resultados_buscador[0].joven_ai }}</td>
                <td>{{ persona.resultados_buscador[0].joven_ad }}</td>
                <td>{{ persona.resultados_buscador[0].joven_ed }}</td>
              </tr>
            </tbody>
            <tbody>
              <tr>
                <td>Adulto</td>
                <td>{{ persona.resultados_buscador[0].ei }}</td>
                <td>{{ persona.resultados_buscador[0].ai }}</td>
                <td>{{ persona.resultados_buscador[0].ad }}</td>
                <td>{{ persona.resultados_buscador[0].ed }}</td>
              </tr>
            </tbody>
            <tbody>
              <tr>
                <td>Tiempo Libre</td>
                <td>{{ persona.resultados_buscador[0].libre_ei }}</td>
                <td>{{ persona.resultados_buscador[0].libre_ai }}</td>
                <td>{{ persona.resultados_buscador[0].libre_ad }}</td>
                <td>{{ persona.resultados_buscador[0].libre_ed }}</td>
              </tr>
            </tbody>
            <tbody>
              <tr>
                <td>Laboral</td>
                <td>{{ persona.resultados_buscador[0].laboral_ei }}</td>
                <td>{{ persona.resultados_buscador[0].laboral_ai }}</td>
                <td>{{ persona.resultados_buscador[0].laboral_ad }}</td>
                <td>{{ persona.resultados_buscador[0].laboral_ed }}</td>
              </tr>
            </tbody>
            <tbody>
              <tr>
                <td>Autopercepción</td>
                <td>{{ persona.resultados_buscador[0].auto_ei }}</td>
                <td>{{ persona.resultados_buscador[0].auto_ai }}</td>
                <td>{{ persona.resultados_buscador[0].auto_ad }}</td>
                <td>{{ persona.resultados_buscador[0].auto_ed }}</td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
      </div>
    </v-container>
  </v-form>
</template>

<script>
import HorizontalBarChart from "./HorizontalBarChart.js";

export default {
  components: {
    HorizontalBarChart
  },

  data: () => ({
    datos: [0, 0, 0, 0],
    valid: true,
    numeroDocumento: "1093216079",
    nameRules: [
      v => (v && v.length <= 10) || "Name must be less than 10 characters"
    ],
    correoElectronico: "",
    emailRules: [v => /.+@.+\..+/.test(v) || "E-mail must be valid"],
    persona: {},
    mostrarResultados: false,
    numImgPerfil: {},

    datacollection: {},
    options: {
      type: "horizontalBar",
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              display: true
            }
          }
        ],
        xAxes: [
          {
            ticks: {
              beginAtZero: true,
              min: 0,
              max: 120
            },
            gridLines: {
              display: false
            },
          }
        ]
      },
      legend: {
        display: false
      },
      tooltips: {
        enabled: true,
        mode: "single",
        callbacks: {
          label: function(tooltipItems, data) {
            return "$" + tooltipItems.yLabel;
          }
        }
      },
      responsive: true,
      maintainAspectRatio: false,
      height: 100,
      lineAt: 80
    }
  }),

  mounted() {
    console.log("Component mounted.");
  },

  methods: {
    validate() {
      this.$refs.form.validate();
    },
    reset() {
      this.$refs.form.reset();
    },
    resetValidation() {
      this.$refs.form.resetValidation();
    },
    buscar() {
      const data = {
        documento: this.numeroDocumento,
        email: this.correoElectronico
      };

      const ruta = `/buscador/filtro`;

      axios.get(ruta, { params: data }).then(
        response => {
          console.log(response.data);
          this.persona = response.data.data;
          this.mostrarResultados = false;
          if (this.persona !== null) {
            this.mostrarResultados = true;
            this.numImgPerfil = this.persona.resultados_buscador[0].id_perfil
              .toString()
              .padStart(2, "0");
            this.datos = [
              this.persona.resultados_buscador[0].ei,
              this.persona.resultados_buscador[0].ai,
              this.persona.resultados_buscador[0].ad,
              this.persona.resultados_buscador[0].ed
            ];
            this.fillData(this.datos);
          }
        },
        response => {
          console.log(response.data);
        }
      );
    },

    fillData(datos) {
      this.datacollection = {
        labels: ["Analítico EI", "Eficiente AI", "Empático AD", "Creativo ED"],
        datasets: [
          {
            label: "Data One",
            pointBackgroundColor: "white",
            borderWidth: 1,
            pointBorderColor: "#249EBF",
            data: datos,
            backgroundColor: ["#0570BB", "#39B54A", "#C0272E", "#FDD300"]
          }
        ]
      };
    }
  }
};
</script>
