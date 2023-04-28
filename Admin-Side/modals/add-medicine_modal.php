<div class="add-med-container">

   <div class="add-container-header">
      <p> Add new medicine </p>
   </div>

   <form enctype="multipart/form-data" id="add-medicine-form">

      <div class="form-input">
         <label for="med-campus"> Campus </label>
         <select name="med_camp" id="med-campus" required>
            <option value=""> --Select Campus-- </option>
            <option value="San Bartolome"> San Bartolome </option>
            <option value="Batasan"> Batasan </option>
            <option value="San Francisco"> San Francisco </option>
         </select>
      </div>

      <div class="form-upload">
         <label for="medicine-img"> Upload Image </label>
         <input type="file" name="med_img" id="medicine-img" required>
      </div>
      
      <div class="form-input">
         <label for="med-name"> Medicine Name </label>
         <input type="text" name="med_name" id="med-name" required>
      </div>
      
      <div class="form-input">
         <label for="med-qty"> Quantity </label>
         <input type="number" name="med_qty" id="med-qty" min="1" required>
      </div>
      
      <div class="form-input">
         <label for="med-expDate"> Expiration Date </label>
         <input type="date" name="med_expDate" id="med-expDate" required>
      </div>
      
      <div class="form-input">
         <label for="med-desc"> Description </label>
         <!-- <input type="text" name="admin_email" id="admin-email"> -->
         <textarea name="med_desc" style="text-transform:none;" id="med-desc" required></textarea>
      </div>

      <div class="form-button">
         <button type="button" id="med-add-cancel"> Cancel </button>
         <button type="submit" name="add-med-btn" id="med-add"> Add </button>
      </div>

   </form>

</div>

<script>
   $(document).ready(function(){

      $('#med-add-cancel').click(function(){

         $('#medicine-modal-container').hide();

      });


      // when form is submitted
      $('#add-medicine-form').submit(function(e){

         e.preventDefault(); // prevent load page

         const form =  $('#add-medicine-form')[0];
         const formData = new FormData(form);

         // ajax

         $.ajax({

            url: "../process/add_medicine.php",
            type: "POST",
            data: formData,
            contentType: false, 
            processData: false,
            cache: false,
            success: function (data) {

               $('#medicine-modal-container').hide();

               $('#medicine-message-modal').show();

               $('#medicine-message-modal').html(data);

               window.location.href = "../pages/medicine.php";

            },


         });

      });



   });
</script>
