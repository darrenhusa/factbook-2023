<template>
    <div id="container"></div>
</template>

<script>
// var Highcharts = require('highcharts');
import Highcharts from 'highcharts';
import Exporting from 'highcharts/modules/exporting';
import Sankey from 'highcharts/modules/sankey';
Exporting(Highcharts);
Sankey(Highcharts);

export default {
    name : "SankeyChart",
    props : {
    
      series: {
        type: Array,
        required: true,
      },

	},
  	data() {
      return {
        // target: 'container'
        target: undefined
      }
    }, // end data()

    mounted() {

      this.target = Highcharts.chart(this.$el, {

        chart: {
        //   inverted: true
        },
        title: {
            text: this.series.title
        },

        subtitle: {
            text: ''
        },
        
        // accessibility: {
        //     point: {
        //         valueDescriptionFormat: '{index}. {point.from} to {point.to}, {point.weight}.'
        //     }
        // },
        series: [{
                keys: this.series.keys,
                nodes: this.series.nodes,
                data: this.series.data, 
                
                type: 'sankey',
                name: this.series.name,
                dataLabels: {
                   style: {
                    color: 'var(--highcharts-neutral-color-100, #000)'
                }
                }
            }],  // end series
    
       credits: {
          enabled: false
        }
    });  // end chart
  },  // end mounted

//   beforeDestroy: function() {
//     this.target.destroy();
//   },
} // end export default

</script>
