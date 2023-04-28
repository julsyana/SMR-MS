<?php include "../includes/date.php"; ?>
<div class="modal-container new-appointment-container" id="new-appointment-container">
    
    <div class="modal-header">
       <h3> New Service/Type of Appointment <span id="app-mess"></span> </h3>
    </div>

    <div class="modal-content">

       <form id="appointment-form">
          <div class="form-input">
             <label for="app-slot"> Available Slot(s): </label>
             <input type="number" name="app_slot" id="app-slot" min="1" max="100" value="100"> 
          </div>

          <div class="form-input">
             <label for="app-type"> Appointment Type: </label>
             <select name="app_type" id="app-type" required>
                <option value=""> --Select Appointment type-- </option>
                <option value="Medical"> Medical Appointment</option>
                <option value="Dental"> Dental Appointment</option>
             </select>
          </div>

          <div class="form-input date">
             <label for="app-dates"> Pick an available dates </label>
             <table id="app-dates-tbl" border="0">
               <tr>
                  <td> 
                     <input type="date" id="date_choose" min="<?=$curr_date?>" required>
                  </td>
                  <td> 
                     <button type="button" id="add-date"> <i class="fas fa-plus-circle"> </i> Add </button>
                  </td>
               </tr>
             </table>
             <!-- <input type="text" class="form-control" id="date-picker" hidden> -->
             
          </div>

          <div class="form-button">
             <button type="button" id="new-app-cancel"> Cancel </button>
             <button type="submit" id="new-app-add"> Add Services </button>
          </div>
       </form>

    </div>

</div>

<script>
   $(document).ready(function(){


      $('#add-date').click(function(){

         const date_choose = $('#date_choose').val();

         if(date_choose != ''){

            const table = $('#app-dates-tbl');

            if(table.children().length === 1){

               const add_row = '<tr> <td> <input class="date_selected" name="date_selected[]" type="text" value="' + date_choose + '" readonly> </td> <td> <button type="button" class="del-date"> <i class="fas fa-trash-alt"> </i> Del </button></td> </tr>';

               let values = [];

               table.append(add_row);

               $('.date_selected').each(function(){
   
                  if(!values.includes(this.value)){
   
                     values.push(this.value);

                     $('#date_choose').css('outline', 'none');
   
                  } else{
   
                     $(this).parent().parent().remove();

                     $('#date_choose').css('outline', '1.5px solid var(--alertBgButton)');
                     
                  }
   
               });

            }
         } else {
            
            $('#date_choose').css('outline', '1.5px solid var(--alertBgButton)');
            empty_row = "";
            table.append(empty_row);

         }

         $('.del-date').click(function(){

            $(this).parent().parent().remove();

            if(table.children().length === 0){

               empty_row = "<tr> <td colspan='3'> Select Schedule First </td> </td>";
               table.append(empty_row);

            } else {
               
               $('#add-date').attr('disabled', false);

            }
            
         });

      });

      

      
      
      $('#appointment-form').submit(function(e){

          e.preventDefault(); 

          const form = $('#appointment-form')[0];
          const formData = new FormData(form);

          $.ajax({
             type: "POST",
             url: "../process/add_appointment.php",
             data: formData,
             contentType: false, 
             processData: false,
             cache: false,
             success: function(data){


               $("#modal-overlay-container").html(data);
               // $('#app-mess').html(data);

             },
             

          });

      });


      $('#new-app-cancel').click(function(){

          $("#modal-overlay-container").hide();

          $('#new-appointment-container').hide();

      });
      

   });

</script>

<!-- custom script -->
<script src="../js/date_picker.js"></script>
