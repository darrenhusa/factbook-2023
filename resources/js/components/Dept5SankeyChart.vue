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
      title: {
        type: String,
        default: ''
      },
      name: {
        type: String,
        default: ''
      },
    //   series : {
    //     type: Object,
    //     required: true
    //   }
    //   nodes : {
    //     type: Array,
    //   }
	},
  	data : function() {
      return {
        // target: 'container'
        target: undefined
      }
    },
    mounted : function() {
      // console.log(this.series);
      // console.log(this.series.title);

      // see https://stackoverflow.com/questions/50144557/how-to-add-data-to-chart-js-with-a-for-loop/50144700
      // const seriesTemp = [];
      // const number = this.series.data.length

      // for(let i=0; i<number; i++){
      //   seriesTemp.push({
      //       name: this.series.data[i].label,
      //       data: this.series.data[i].values
      //   });
      // }

      // alert(seriesTemp);
      // console.log(seriesTemp);

      this.target = Highcharts.chart(this.$el, {

        chart: {
        //   inverted: true
        },
    title: {
        text: this.title
    },
    accessibility: {
        point: {
            valueDescriptionFormat: '{index}. {point.from} to {point.to}, {point.weight}.'
        }
    },
    series: [{
        keys: ['from', 'to', 'weight'],
        data: [
          //part 1
          ['Digital & Studio Arts', 'Digital & Studio Arts2', 23],
          ['Digital & Studio Arts', 'Changed Programs2', 0],
          ['Digital & Studio Arts', 'Earned Bachelors2', 1],
          ['Digital & Studio Arts', 'Stop-out2', 1],
          
          //part 2
          ['Digital & Studio Arts2', 'Digital & Studio Arts3', 16],
          ['Stop-out2', 'Digital & Studio Arts3', 0],
          ['Digital & Studio Arts2', 'Changed Programs3', 1],
          ['Digital & Studio Arts2', 'Earned Bachelors3', 2],
          ['Digital & Studio Arts2', 'Stop-out3', 6],
          
          //part 1
          ['English', 'English2', 11],
          ['English', 'Changed Programs2', 0],
          ['English', 'Earned Bachelors2', 0],
          ['English', 'Stop-out2', 2],
          
          //part 2
          ['English2', 'English3', 6],
          ['Stop-out2', 'English3', 0],
          ['English2', 'Changed Programs3', 1],
          ['English2', 'Earned Bachelors3', 3],
          ['English2', 'Stop-out3', 3],
          
        ],
  nodes: [{
            id: 'Digital & Studio Arts',
            name: 'Digital & Studio Arts',
            // colorIndex: 0
            color: '#7cb5ec'
        },
        {
            id: 'English',
            name: 'English',
            color: '#434348'
        }, 
        {
            id: 'Digital & Studio Arts2',
            name: 'Digital & Studio Arts',
            color: '#7cb5ec'
        },
        {
            id: 'English2',
            name: 'English',
            color: '#434348'
        }, 
        {
            id: 'Digital & Studio Arts3',
            name: 'Digital & Studio Arts',
            color: '#7cb5ec'
        },
        {
            id: 'English3',
            name: 'English',
            color: '#434348'
        }, 
        
        {
            id: 'Changed Programs2',
            name: 'Changed Programs',
            color: '#e4d354'
        },
        {
            id: 'Earned Bachelors2',
            name: 'Earned Bachelors',
            color: '#2b908f'
        },
        {
            id: 'Stop-out2',
            name: 'Stop-out',
            color: '#f45b5b'
        },
        
        {
            id: 'Changed Programs3',
            name: 'Changed Programs',
            color: '#e4d354'
        },
        {
            id: 'Earned Bachelors3',
            name: 'Earned Bachelors',
            color: '#2b908f'
        },
        {
            id: 'Stop-out3',
            name: 'Stop-out',
            color: '#f45b5b'
        },

      ],
        type: 'sankey',
        name: this.name
      }],
       credits: {
          enabled: false
        }
    });
  },
//   beforeDestroy: function() {
//     this.target.destroy();
//   },
} // end export default

</script>
