var xValues = ["Verified", "Unverified", "Visitor", "Invalid"];
var yValues = [55, 49, 44, 24];
var barColors = [
  "#2D7538",
  "#f5c71a",
  "#5180C7",
  "#FF4646",
];

new Chart("myChart2", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
   options: {
      responsive: true,
      maintainAspectRatio: false,
      aspectRatio: 2,
      legend: {
        display: true,
        position: 'left',
        maxWidth: 60,
      }
   }
});