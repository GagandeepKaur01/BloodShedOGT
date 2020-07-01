// // element
let canvas = document.getElementById('myChart').getContext('2d');


// // 1st parameter is variable
// // 2nd parameter is an object
let massChart = new Chart(canvas, {
    type: 'bar', //bar,horizontal bar, pie line, radar, polar area
    data: {
        labels: ['1st Week', '2nd Week', '3rd Week', '4th Week'],
        datasets: [{
            label: '₹',
            data: [
                '3243',
                '2580',
                '[Not started yet]',
                '[Not started yet]'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    min: 90
                }
            }]
        }
    }
});

