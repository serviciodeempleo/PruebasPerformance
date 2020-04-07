<template>
  <div class="small">
    <button @click="cargarDatos()">Randomize</button>
    <horizontal-bar-chart :chart-data="datacollection"></horizontal-bar-chart>
    <!-- <line-chart :chart-data="datacollection"></line-chart> -->
  </div>
</template>

<script>
  // import LineChart from './LineChart.js'
  import HorizontalBarChart from './HorizontalBarChart.js'

  export default {
    components: {
      HorizontalBarChart,
      // LineChart
    },
    data () {
      return {
        datacollection: null,
        datos: [0,0,0,0]
      }
    },
    mounted () {
      this.fillData(this.datos)
    },
    methods: {
      fillData (datos) {
        this.datacollection = {
          labels: ['Analítico EI', 'Eficiente AI', 'Empático AD', 'Creativo ED'],
          datasets: [
            {
              label: 'Data One',
              backgroundColor: '#f87979',
              pointBackgroundColor: 'white',
              borderWidth: 1,
              pointBorderColor: '#249EBF',
              data: datos
            }
          ]
        }
      },
      cargarDatos () {
        this.datos = [this.getRandomInt(),this.getRandomInt(),this.getRandomInt(),this.getRandomInt()];
        this.fillData(this.datos)
      },
      getRandomInt () {
        return Math.floor(Math.random() * (50 - 5 + 1)) + 5
      }
    }
  }
</script>

<style>
  .small {
    max-width: 600px;
    margin:  150px auto;
  }
</style>
