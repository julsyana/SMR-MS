<div class="add-admin-container">

<div class="add-container-header">
   <p> Add new admin </p>
</div>

<form enctype="multipart/form-data" id="add-admin-form">

   <div class="form-upload">
      <label for="admin-profile"> Upload Image </label>
      <input type="file" name="admin_profile" id="admin-profile">
   </div>
   
   <div class="form-input">
      <label for="admin-fname"> Firstname </label>
      <input type="text" name="admin_fname" id="admin-fname">
   </div>
   
   <div class="form-input">
      <label for="admin-lname"> Lastname </label>
      <input type="text" name="admin_lname" id="admin-lname">
   </div>
   
   <div class="form-input">
      <label for="admin-cnum"> Contact number </label>
      <input type="text" name="admin_cNum" maxlength="11" minlength="11" id="admin-cnum">
   </div>
   
   <div class="form-input">
      <label for="admin-email"> Email </label>
      <input type="text" name="admin_email" id="admin-email">
   </div>

   <!-- <div class="form-input">
      <label for="admin-pass"> Password </label>
      <input type="password" name="admin_pass" id="admin-pass">
   </div> -->

   <div class="form-button">
      <button type="button" id="admin-add-cancel"> Cancel </button>
      <button type="submit" name="add-admin-btn" id="admin-add"> Add Admin </button>
   </div>

</form>

</div>

<script>
   $(document).ready(function(){

      $('#admin-add-cancel').click(function(){

         $('#admin-modal-container').hide();

      });


      // when form is submitted
      $('#add-admin-form').submit(function(e){

         e.preventDefault(); // prevent load page

         const form =  $('#add-admin-form')[0];
         const formData = new FormData(form);

         // ajax

         $.ajax({

            url: "../process/add_admin.php",
            type: "POST",
            data: formData,
            contentType: false, 
            processData: false,
            cache: false,
            success: function (data) {

               $('#admin-modal-container').hide();
               $('#admin-message-modal').show();
               $('#admin-message-modal').html(data);

               $('#admin-message-modal').fadeOut(3000);

               window.location.href = "../pages/admin.php";

            },


         });

      });



   });
</script>
