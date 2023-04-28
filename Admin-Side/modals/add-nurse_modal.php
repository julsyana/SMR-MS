<div class="add-admin-container">

   <div class="add-container-header">
      <p> Add new nurse </p>
   </div>

   <form enctype="multipart/form-data" id="add-nurse-form">

      <!-- <div class="form-upload">
         <label for="nurse-profile"> Upload Image </label>
         <input type="file" name="nurse_profile" id="nurse-profile" required>
      </div> -->
      
      <div class="form-input">
         <label for="nurse-email"> Email </label>
         <input type="text" name="nurse_email" id="nurse-email" placeholder="juan.delacruz@gmail.com" required>
      </div>
      
      <div class="form-input">
         <label for="nurse-position"> Position </label>
         <select name="nurse_position" id="nurse-position" required>
            <option value=""> --Select Position-- </option>
            <!-- <option value="Head Nurse"> Head Nurse </option> -->
            <option value="School Nurse"> School Nurse </option>
         </select>
         <!-- <input type="text" name="admin_lname" id="admin-lname"> -->
      </div>


      <div class="form-input">
         <label for="nurse-campus"> Campus Assigned </label>
         <select name="nurse_campus" id="nurse-campus" required>
            <option value=""> --Select Campus-- </option>
            <option value="San Bartolome"> San Bartolome </option>
            <option value="Batasan"> Batasan </option>
            <option value="San Francisco"> San Francisco </option>
         </select>
         <!-- <input type="text" name="admin_lname" id="admin-lname"> -->
      </div>

      <div class="form-input">

         <label for=""> Schedule </label>

         <div class="scheds">

            <div class="form-check">
               <input type="checkbox" value="Monday" name="sched[]" id="monday">
               <label for="monday"> Monday </label>
            </div>

            <div class="form-check">
               <input type="checkbox" value="Tuesday" name="sched[]" id="tuesday">
               <label for="tuesday"> Tuesday </label>
            </div>

            <div class="form-check">
               <input type="checkbox" value="Wednesday" name="sched[]" id="wednesday">
               <label for="wednesday"> Wednesday </label>
            </div>

            <div class="form-check">
               <input type="checkbox" value="Thursday" name="sched[]" id="thursday">
               <label for="thursday"> Thursday </label>
            </div>

            <div class="form-check">
               <input type="checkbox" value="Friday" name="sched[]" id="friday">
               <label for="friday"> Friday </label>
            </div>

            <div class="form-check">
               <input type="checkbox" value="Saturday" name="sched[]" id="saturday">
               <label for="saturday"> Saturday </label>
            </div>

         </div>
         
      </div>
      
      <div class="form-button">
         <button type="button" id="nurse-add-cancel"> Cancel </button>
         <button type="submit" name="add-nurse-btn" id="nurse-add"> Add Nurse </button>
      </div>

   </form>

</div>


<script>
   $(document).ready(function(){

      $('#nurse-add-cancel').click(function(){

         $('#nurse-modal-container').hide();

      });


      // when form is submitted
      $('#add-nurse-form').submit(function(e){

         e.preventDefault(); // prevent load page

         const form =  $('#add-nurse-form')[0];
         const formData = new FormData(form);

         // alert('submit');
         

         // ajax

         $.ajax({

            url: "../process/add_nurse.php",
            type: "POST",
            data: formData,
            contentType: false, 
            processData: false,
            cache: false,
            success: function (data) {

               $('#nurse-modal-container').hide();
               $('#nurse-message-modal').show();
               $('#nurse-message-modal').html(data);

               // $('#nurse-message-modal').fadeOut(3000);

               window.location.href = "../pages/nurses.php";

            },


         });

      });
      
   });
</script>
