<?php
   include "../functions/dept.php";
   include "../includes/db_conn.php";

   $dept_id = $_POST['dept_id'];

   $dept_res = fetchSelDept($conn, $dept_id);

   $dept = mysqli_fetch_assoc($dept_res);

?>

<div class="add-dept-container">
   <div class="dept-header">
      <h3> Edit department </h3>
   </div>

   <form enctype="multipart/form-data" id="edit-dept-form">

      <div class="form-upload">

         <label for="dept-profile">
            
           <img src="../assets/<?=$dept['image']?>" alt="<?=$dept['image']?>">

         </label>

         <input type="file" name="dept_profile" id="dept-profile" hidden>

      </div>

      <div class="form-input">
         <input type="text" name="dept_id" value="<?=$dept['emp_id']?>" id="" readonly>
      </div>

      <div class="form-input">
         <input type="text" name="" value="<?=$dept['position']?>" id="" readonly>
      </div>

      


      <div class="building-room">

         <div class="form-input">
            <label for="dept"> Department </label>

            <input type="text" name="" value="<?=$dept['dept_name']?>" id="" readonly>

         </div>

         <div class="form-input">
            <label for="dept-building"> Building </label>

            <select name="dept_building" id="dept-building">
               <option value="<?=$dept['building_name']?>"> <?=$dept['building_name']?> </option>
               <option value="Bautista"> Bautista Building </option>
               <option value="TechVoc"> TechVoc Building </option>
               <option value="Belmonte"> Belmonte Building </option>
            </select>
         </div>

         <div class="form-input">
            <label for="dept-room"> Room </label>

            <select name="dept_room" id="dept-room">
               <option value="<?=$dept['room_num']?>"> <?=$dept['room_num']?> </option>
               <option value="IC301a"> IC301a </option>
               <option value="IC302a"> IC302a</option>
               <option value="IC303a"> IC303a </option>
               <option value="IC304a"> IC304a </option>
               <option value="IC305a"> IC305a </option>
               <option value="IC306a"> IC306a </option>
            </select>
         </div>


         
      </div>


      <div class="form-input">
         <label for="dept-fname"> Firstname </label>
         <input type="text" name="dept_fname" id="dept-fname" placeholder="Ex: Juan " value="<?=$dept['firstname']?>">
      </div>

      <div class="form-input">
         <label for="dept-lname"> Lastname </label>
         <input type="text" name="dept_lname" id="dept-lname" placeholder="Ex: Dela Cruz" value="<?=$dept['lastname']?>">
      </div>

      <div class="form-input">
         <label for="dept-email"> Email Address </label>
         <input type="text" name="dept_email" id="dept-email" placeholder="Ex: juan.delacruz@gmail.com" value="<?=$dept['email']?>">
      </div>

      <div class="form-input">
         <label for="dept-cNum"> Contact Number </label>
         <input type="text" name="dept_cnum" id="dept-cNum" placeholder="Ex: 09**********" maxlength="11" minlength="11" value="<?=$dept['contact_num']?>">
      </div>


      <div class="form-button">
         <button type="button" id="cancel-dept-btn"> Cancel </button>
         <button id="add-dept-btn"> Save Changes </button>
      </div>

   </form>

</div>

<script>
   $(document).ready(function(){

      $('#cancel-dept-btn').click(function(){

         $('#modal-dept-container').hide();

      });

       // when form is submitted
      $('#edit-dept-form').submit(function(e){

         e.preventDefault(); // prevent load page

         const form =  $('#edit-dept-form')[0];
         const formData = new FormData(form);
         
         // // ajax
         $.ajax({

            url: "../process/edit_dept.php",
            type: "POST",
            data: formData,
            contentType: false, 
            processData: false,
            cache: false,
            success: function (data) {

               $('#modal-dept-container').hide();
               $('#dept-message-modal').show();

               $('#dept-message-modal').html(data);

               // $('#admin-message-modal').fadeOut(3000);

               window.location.href = "../pages/department.php";

            },
           


         });
         

       

      });





   });
 
</script>