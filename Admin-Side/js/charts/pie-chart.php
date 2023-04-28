
<script>

   const conPieChart = document.querySelectorAll('.con-pieChart');

   new Chart(conPieChart, {
      type: 'pie',

      data: {
         labels: [
            'Difficulty Breathing',
            'Fever or chills',
            'Headache',
            'Diarrhea',
            'Dizziness',
         ],
         datasets: [{
            label: 'Total',
            data: [5, 10, 40, 30, 2],
            backgroundColor: [
               '#2BB4D4',
               '#5CE1E6',
               '#6DE1E6',
               '#5CF2E6',
               '#5CE1F7',
            ],
            hoverOffset: 4
         }]
      },
      options: {
         plugins: {
            legend: {
               position: 'right'
            }
         }

      }
   });


   const appPieChart = document.querySelectorAll('.apps-pieChart');

   new Chart(appPieChart, {
      type: 'pie',

      data: {
         labels: [
            'Medical Service',
            'Dental Service',
         ],
         datasets: [{
            label: 'Total',
            data: [<?=$total_medical?>, <?=$total_dental?>],
            backgroundColor: [
               '#2BB4D4',
               '#5CE1E6',
            ],
            hoverOffset: 4
         }]
      },
      options: {
         plugins: {
            legend: {
               position: 'right'
            }
         }

      }
   });





</script>