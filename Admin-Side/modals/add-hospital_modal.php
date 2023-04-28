<div class="add-admin-container">
   
   <div class="add-container-header">
      <p> Add hospital </p>
   </div>
   
   <form enctype="multipart/form-data" id="add-hospital-form">
      
      <div class="form-input">
         <label for="hospital-name"> Hospital name </label>
         <input type="text" name="hospital_name" id="hospital-name" required>
      </div>
      
      <div class="form-input">
         <label for="hospital-addr"> Address </label>
         <input type="text" name="hospital_addr" id="hospital-addr" required>
      </div>
      
      <div class="form-input">
         <label for="hospital-email"> Email address </label>
         <input type="text" name="hospital_email" id="hospital-email" required>
      </div>
      
      <div class="form-input">
         <label for="hospital-num"> Contact number </label>
         <input type="text" name="hospital_num" id="hospital-num" required>
      </div>

      <div class="form-button">
         <button type="button" id="hospital-add-cancel"> Cancel </button>
         <button type="submit" name="add-hospital-btn" id="hospital-add"> Add Hospital </button>
      </div>
   
   </form>
   
</div>


<script>
   $(document).ready(function(){

      $('#hospital-add-cancel').click(function(){

         $('#hospital-modal-container').hide();

      });


      // when form is submitted
      $('#add-hospital-form').submit(function(e){

         e.preventDefault(); // prevent load page

         const form =  $('#add-hospital-form')[0];
         const formData = new FormData(form);

         // ajax

         $.ajax({

            url: "../process/add_hospital.php",
            type: "POST",
            data: formData,
            contentType: false, 
            processData: false,
            cache: false,
            success: function (data) {

               $('#hospital-modal-container').hide();

               $('#hospital-message-modal').show();

               $('#hospital-message-modal').html(data);

               // $('#admin-message-modal').fadeOut(3000);

               // window.location.href = "../pages/admin.php";

            },


         });

      });



   });
</script>

