
<script>

   const month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

   let appLineGraph = document.querySelectorAll('.apps-lineGraph');

   new Chart(appLineGraph, {
      type: 'bar',
      data: {
         labels: month,
         datasets: [{
            label: 'Total number of appointments',
            data: [12, 19, 3, 5, 2, 3, 3, 12, 64, 75, 12, 23],
            borderWidth: 1,
            backgroundColor: "#2282DC",
         }]
      },
      options: {
         scales: {
            y: {
               beginAtZero: true
            }, 
            x: {
               beginAtZero: true
            }
         },
         plugins: {
            legend: {
               display: false,
            },
            datalabels: {
               formatter: (value) => {
                  return value;
               },
            },
         }
      }
   });


   let conLineGraph = document.querySelectorAll('.con-lineGraph');

   new Chart(conLineGraph, {
      type: 'bar',
      data: {
         labels: month,
         datasets: [{
            label: 'Total number of appointments',
            data: [12, 19, 3, 5, 2, 3, 3, 12, 64, 75, 12, 23],
            borderWidth: 1,
            backgroundColor: "#2282DC",
         }]
      },
      options: {
         scales: {
            y: {
               beginAtZero: true
            }, 
            x: {
               beginAtZero: true
            }
         },
         plugins: {
            legend: {
               display: false,
            },
            datalabels: {
               formatter: (value) => {
                  return value;
               },
            },
         }
      }
   });

</script>