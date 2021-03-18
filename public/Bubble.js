
var chart = new ej.charts.Chart({
    //Initializing Primary X Axis
    primaryXAxis: {
   
        minimum: 60,
        maximum: 100,
        interval: 5
    },

    //Initializing Primary Y Axis
    primaryYAxis: {
      
        minimum: -2,
        maximum: 16,
        interval: 2
    },

    //Initializing Chart Series
    series: [
        {
            type: 'Bubble',
            dataSource: [{ x: 92.2, y: 7.8, size: 1.347  },
            { x: 74, y: 6, size: 4 },
            { x: 90.4, y: 6.0, size: 2  },
            { x: 99.4, y: 2, size: 1 },
            { x: 88.6, y: 1, size: 9  },
            { x: 99, y: 7, size: 8 },
            { x: 72, y: 2, size: 8  },
            { x: 99.6, y: 3, size: 3 },
            { x: 99, y: 2, size: 8 },
            { x: 86.1, y: 4, size: 5},
            { x: 92.6, y: 6, size:5 },
            { x: 61.3, y: 7, size: 1}],
            xName: 'x', yName: 'y', size: 'size', 
        },
    ],
}, '#element');