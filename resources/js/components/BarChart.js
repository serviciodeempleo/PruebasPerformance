import { HorizontalBar, mixins } from 'vue-chartjs'
// import { HorizontalBar} from 'vue-chartjs'

export default {
    extends: HorizontalBar,
    mixins: [mixins.reactiveProp],
    props: ['options'],
    mounted() {
        console.log('Mounted')
        this.renderLineChart()
    },
    computed: {
        chartData1: function () {
            console.log('Computed')
            return this.chartData
        }
    },
    methods: {
        renderLineChart: function () {
            console.log('Methods')
            this.renderChart(this.chartData, this.options)
        }
    },
    watch: {
        chartData: () => {
            console.log('Watch')
            this._chart.destroy()
            this.renderLineChart()
        }
    },
}