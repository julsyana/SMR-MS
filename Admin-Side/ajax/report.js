$(document).ready(function(){

   $('#report-content-container').load('../ajax/pages/report_consultation.php');

   $('#type').change(function(){

      let type = $(this).val();

      switch (type) {
         case "Appointments":

            $('#report-content-container').load('../ajax/pages/report_appointment.php')
            break;

         case "Consultation":

            $('#report-content-container').load('../ajax/pages/report_consultation.php')
            break;

         case "Medicine":

            $('#report-content-container').load('../ajax/pages/report_medicine.php')
            break;

         default:
            break;
      }
      
   });

});