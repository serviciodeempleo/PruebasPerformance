import { HorizontalBar, mixins } from 'vue-chartjs'
const { reactiveProp } = mixins

export default {
  extends: HorizontalBar,
  mixins: [reactiveProp],
  props: ['options'],
  mounted () {
    this.addPlugin({
      id: 'VerticalLine',
      afterDraw: function(chart) {
        if (typeof chart.config.options.lineAt != 'undefined') {
          var lineAt = chart.config.options.lineAt;
            var ctxPlugin = chart.chart.ctx;
            var xAxe = chart.scales[chart.config.options.scales.xAxes[0].id];
            var yAxe = chart.scales[chart.config.options.scales.yAxes[0].id];
            
            if(xAxe.min != 0) return;
            // debugger
            ctxPlugin.strokeStyle = "red";
            ctxPlugin.beginPath();            
            lineAt = xAxe.getPixelForValue(lineAt);            
            ctxPlugin.moveTo(lineAt, yAxe.top);
            ctxPlugin.lineTo(lineAt, yAxe.bottom);
            ctxPlugin.stroke();
        }
      }
    });

    this.renderChart(this.chartData, this.options)
  }
}