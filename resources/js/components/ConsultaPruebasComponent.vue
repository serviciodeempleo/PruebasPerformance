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
              <v-img class="float-left" width="200px" src="/img/logo-spe.png"></v-img>
            </v-flex>
            <v-flex xs4></v-flex>
            <v-flex xs4>
              <v-img class="float-right" width="340px" src="/img/logo-mintrabajo.png"></v-img>
            </v-flex>
          </v-layout>
        </v-container>

        <v-divider vertical></v-divider>

        <v-card color="#E7E7E7">
          <v-card-text>
            <div class="headline" style="color:#000">
              <span style="white-space: pre-wrap;">{{introSPE}}</span>
            </div>
          </v-card-text>
        </v-card>

        <v-divider vertical></v-divider>

        <v-card color="#1F64D2" dark>
          <v-card-title class="headline text-uppercase">{{persona.nombre}} {{persona.apellido}}</v-card-title>

          <v-card-subtitle>{{persona.tipo_documento.tipo_documento}} {{persona.documento}}</v-card-subtitle>

          <v-card-text>
            <div style="display:flex; justify-content:space-between; color:#FFF;">
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

        <v-card color="#E7E7E7">
          <v-card-text>
            <div class="headline" style="color:#000">
              {{intro4B}}
            </div>
          </v-card-text>
        </v-card>

        <v-divider vertical></v-divider>

        <h4
          v-if="persona.resultados_buscador"
        >{{titulo01}}</h4>

        <div style="display:flex; justify-content:space-between;">
          {{titulo01des01}}
        </div>

        <v-divider vertical></v-divider>

        <h4
          v-if="persona.resultados_buscador"
        >{{titulo02}}</h4>

        <div style="display:flex; justify-content:space-between;">
          {{titulo02des}}
        </div>

        <v-divider vertical></v-divider>

        <h3
          v-if="persona.resultados_buscador"
        >{{titulo01}}</h3>

        <div style="display:flex; justify-content:space-between;">
          <span style="white-space: pre-wrap;">{{titulo01des02}}</span>
        </div>

        <!-- Aquí imagen cerebro -->
        <v-container fill-height fluid>
          <v-row>
            <v-col align="center" justify="center">
              <v-img width="640px" src="/img/cerebro.png"></v-img>
            </v-col>
          </v-row>
        </v-container>

        <v-divider vertical></v-divider>

        <!-- Aquí gráfico de barras -->
        <v-container fill-height fluid>
          <v-row align="center" justify="center">
            <v-col cols="2"></v-col>
            <v-col cols="8">
              <horizontal-bar-chart :chart-data="datacollection" :options="options" :height="300"></horizontal-bar-chart>
            </v-col>
            <v-col cols="2"></v-col>
          </v-row>
        </v-container>

        <v-divider vertical></v-divider>

        <!-- Aquí tabla competencias -->
        <v-container fill-height fluid>
          <v-row align="center" justify="center">
            <v-col cols="2"></v-col>
            <v-col cols="8">
              <v-simple-table v-if="persona.resultados_buscador">
                <template v-slot:default>
                  <thead>
                    <tr>
                      <th class="text-left" style="color:#000;font-size:16px;">Competencias</th>
                      <th class="text-left" style="color:#000;font-size:16px;">Analítico EI</th>
                      <th class="text-left" style="color:#000;font-size:16px;">Eficiente AI</th>
                      <th class="text-left" style="color:#000;font-size:16px;">Empático AD</th>
                      <th class="text-left" style="color:#000;font-size:16px;">Creativo ED</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr bgcolor="#B8DAFF">
                      <td>Joven</td>
                      <td>{{ persona.resultados_buscador[0].joven_ei }}</td>
                      <td>{{ persona.resultados_buscador[0].joven_ai }}</td>
                      <td>{{ persona.resultados_buscador[0].joven_ad }}</td>
                      <td>{{ persona.resultados_buscador[0].joven_ed }}</td>
                    </tr>
                  </tbody>
                  <tbody>
                    <tr bgcolor="#B8DAFF">
                      <td>Adulto</td>
                      <td>{{ persona.resultados_buscador[0].ei }}</td>
                      <td>{{ persona.resultados_buscador[0].ai }}</td>
                      <td>{{ persona.resultados_buscador[0].ad }}</td>
                      <td>{{ persona.resultados_buscador[0].ed }}</td>
                    </tr>
                  </tbody>
                  <tbody>
                    <tr bgcolor="#007BFF">
                      <td>Tiempo Libre</td>
                      <td>{{ persona.resultados_buscador[0].libre_ei }}</td>
                      <td>{{ persona.resultados_buscador[0].libre_ai }}</td>
                      <td>{{ persona.resultados_buscador[0].libre_ad }}</td>
                      <td>{{ persona.resultados_buscador[0].libre_ed }}</td>
                    </tr>
                  </tbody>
                  <tbody>
                    <tr bgcolor="#007BFF">
                      <td>Laboral</td>
                      <td>{{ persona.resultados_buscador[0].laboral_ei }}</td>
                      <td>{{ persona.resultados_buscador[0].laboral_ai }}</td>
                      <td>{{ persona.resultados_buscador[0].laboral_ad }}</td>
                      <td>{{ persona.resultados_buscador[0].laboral_ed }}</td>
                    </tr>
                  </tbody>
                  <tbody>
                    <tr bgcolor="#007BFF">
                      <td>Autopercepción</td>
                      <td>{{ persona.resultados_buscador[0].auto_ei }}</td>
                      <td>{{ persona.resultados_buscador[0].auto_ai }}</td>
                      <td>{{ persona.resultados_buscador[0].auto_ad }}</td>
                      <td>{{ persona.resultados_buscador[0].auto_ed }}</td>
                    </tr>
                  </tbody>
                </template>
              </v-simple-table>
            </v-col>
            <v-col cols="2"></v-col>
          </v-row>
        </v-container>

        <v-divider vertical></v-divider>

        <h3
          v-if="persona.resultados_buscador"
        >{{titulo02}}</h3>

        <v-divider vertical></v-divider>

        <!-- Aquí imagen neurofortaleza y texto neurofortaleza -->
        <v-card color="rgb(255, 255, 255, 0.2)">
          <v-card-text>
            <div class="headline" style="color:#000">
              <v-container fill-height fluid>
                <v-row>
                  <v-col cols="3" align="center" justify="center">
                    <v-img width="200px" :src="'/img/estilo_' + numImgNeurofortaleza + '.png'"></v-img>
                  </v-col>
                  <v-col cols="9" align="left" justify="left">
                    <h4>NEUROFORTALEZA: {{ persona.resultados_buscador[0].estilo.estilo }}</h4>
                    <p>{{ persona.resultados_buscador[0].estilo.estilo_desc }}</p>
                  </v-col>
                </v-row>
                <v-row>
                  <v-col cols="3" align="right" justify="right">
                    <span class="font-weight-bold">Descriptor General:</span>
                  </v-col>
                  <v-col cols="9" align="left" justify="left">
                    {{ persona.resultados_buscador[0].estilo.estilo_desc_general }}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col cols="3" align="right" justify="right">
                    <span class="font-weight-bold">Adjetivos que lo describen:</span>
                  </v-col>
                  <v-col cols="9" align="left" justify="left">
                    {{ persona.resultados_buscador[0].estilo.estilo_desc_adjetivo }}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col cols="3" align="right" justify="right">
                    <span class="font-weight-bold">Toma de decisión:</span>
                  </v-col>
                  <v-col cols="9" align="left" justify="left">
                    {{ persona.resultados_buscador[0].estilo.estilo_desc_decision }}
                  </v-col>
                </v-row>
              </v-container>
            </div>
          </v-card-text>
        </v-card>

        <v-divider vertical></v-divider>

        <!-- Aquí imagen neurodebilidad y texto neurodebilidad -->
        <v-card color="rgb(255, 255, 255, 0.2)">
          <v-card-text>
            <div class="headline" style="color:#000">
              <v-container fill-height fluid>
                <v-row>
                  <v-col cols="3" align="center" justify="center">
                    <v-img width="200px" :src="'/img/opuesto_' + numImgNeurodebilidad + '.png'"></v-img>
                  </v-col>
                  <v-col cols="9" align="left" justify="left">
                    <h4>NEURODEBILIDAD: {{ persona.resultados_buscador[0].estilo.opuesto }}</h4>
                    <p>{{ persona.resultados_buscador[0].estilo.opuesto_desc }}</p>
                  </v-col>
                </v-row>
              </v-container>
            </div>
          </v-card-text>
        </v-card>

        <v-divider vertical></v-divider>

        <!-- Aquí imagen competencia y texto competencia -->
        <v-card color="rgb(255, 255, 255, 0.2)">
          <v-card-text>
            <div class="headline" style="color:#000">
              <v-container fill-height fluid>
                <v-row>
                  <v-col cols="3" align="center" justify="center">
                    <v-img width="200px" :src="'/img/perfil_' + numImgPerfil + '.png'"></v-img>
                  </v-col>
                  <v-col cols="9" align="left" justify="left">
                    <h4>PERFIL DE COMPETENCIAS: {{ persona.resultados_buscador[0].perfil.perfil }}</h4>
                    <p>{{ persona.resultados_buscador[0].perfil.desc_perfil }}</p>
                  </v-col>
                </v-row>
              </v-container>
            </div>
          </v-card-text>
        </v-card>

        <v-divider vertical></v-divider>

        <v-col cols="12" md="4">
          <v-btn color="#1F64D2" dark class="mr-4" @click="imprimirPdf">Exportar PDF</v-btn>
        </v-col>
        
        <v-divider vertical></v-divider>

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
    introSPE: "La Unidad Administrativa Especial del Servicio Público de Empleo con la finalidad de fortalecer los servicios de orientación ocupacional y de preselección de la Red de Prestadores, durante los últimos años suscribió los contratos N .290 de 2015; N. 108 de 2018 y N. 64 de 2019 con el proveedor 4 Beyond SAS quien puso a disposición una plataforma online de su prueba Performance, a través de la cual se identificaban fortalezas y debilidades en los buscadores de empleo.\n\n"+
    "Teniendo en cuenta que el último contrato finalizó, la Unidad del SPE presenta un aplicativo que le permitirá a la Red de Prestadores consultar los resultados de las pruebas que fueron aplicadas a los buscadores de empleo. Esta búsqueda la podrán realizar con el número del documento de identificación y/o el correo electrónico que la persona usó en la inscripción a la prueba.",
    intro4B: "4B Performance For Beyond es una herramienta donde podrá identificar su Neurofortaleza, es decir saber donde están las cosas que hace mejor, aquello en lo que naturalmente es bueno y que está asociado con sus fortalezas, así como identificar cuál es su Neurodebilidad, es decir dónde están las tareas que se le dificultan.",
    titulo01: "Primera sección",
    titulo01des01: "Encontrará una gráfica de un cerebro que muestra las características asociadas a cada estilo de pensamiento. La tabla de resultados, le permitirá ver cuál es su estilo más usado en su Tiempo libre, Laboral, Autopercepción, Joven y Adulto. Siempre los puntajes más altos están asociados a su modo de pensamiento preferido o usado en esas situaciones.",
    titulo01des02: "Bienvenido al reporte Performance persona. A continuación podrá ver los 4 estilos de pensamiento y las caracteristicas que definen cada estilo.\n\n"+
    "Es importante recordar que ningún estilo de pensamiento es mejor o peor que otro, lo más importante es poder entender en dónde fluyo con mayor naturalidad por que implica realizar tareas que se te facilitan, te gustan y las disfrutas",
    titulo02: "Segunda sección",
    titulo02des: "Se define cuál es su NEUROFORTALEZA, es decir en qué estilo de pensamiento están las cosas que se le facilitan. Hay una descripción de las características asociadas a este estilo de pensamiento. También se describen las características y tareas asociadas a su NEURODEBILIDAD, es decir el estilo de pensamiento donde están las cosas que se le dificultan; Ademas encontrará el PERFIL DE COMPETENCIAS.",
        
    nameRules: [
      v => (v && v.length <= 10) || "Name must be less than 10 characters"
    ],
    correoElectronico: "",
    emailRules: [v => /.+@.+\..+/.test(v) || "E-mail must be valid"],
    persona: {},
    mostrarResultados: false,
    numImgNeurofortaleza: {},
    numImgNeurodebilidad: {},
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
            return tooltipItems.xLabel;
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
    // console.log("Component mounted.");
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
    imprimirPdf(){
      
      const ruta = `/descargar/pdf/${this.numeroDocumento}`;

      axios.get(ruta, 
        {
          responseType: "blob" // important
        }
      ).then(
        response => {
          // console.log("OK");
          // console.log(response);
          const url = window.URL.createObjectURL(
            new Blob([response.data], { type: "application/pdf" })
          );

          const link = document.createElement("a");
          link.href = url;
          link.setAttribute("download", `${this.numeroDocumento}.pdf`); //or any other extension

          document.body.appendChild(link);
          link.click();
        },
        response => {
          // console.log("ERROR");
          // console.log(response.data);
        }
      );

      
    },
    buscar() {
      const data = {
        documento: this.numeroDocumento,
        email: this.correoElectronico
      };

      const ruta = `/buscador/filtro`;

      axios.get(ruta, { params: data }).then(
        response => {
          // console.log(response.data);
          this.persona = response.data.data;
          this.mostrarResultados = false;
          if (this.persona !== null) {
            this.mostrarResultados = true;
            this.numImgNeurofortaleza = this.persona.resultados_buscador[0].estilo.estilo;
            this.numImgNeurodebilidad = this.persona.resultados_buscador[0].estilo.opuesto;
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
          // console.log(response.data);
        }
      );
    },

    fillData(datos) {
      this.datacollection = {
        labels: ["Analítico EI", "Eficiente AI", "Empático AD", "Creativo ED"],
        datasets: [
          {
            label: "Estilos de pensamiento",
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
