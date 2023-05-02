<div class="add-dept-container">
                  <div class="dept-header">
                     <h3> Add new department </h3>
                  </div>

                  <form enctype="multipart/form-data" id="add-dept-form">

                     <div class="form-upload">

                        <label for="dept-profile">
                           
                           <span> Upload profile </span>

                        </label>

                        <input type="file" name="dept_profile" id="dept-profile" hidden>

                     </div>

                     <!-- <div class="form-input">
                        <label for="dept-position"> Position </label>

                        <select name="dept_position" id="dept-position" required>
                           <option value="head"> Head </option> -->
                           <!-- <option value="assistant"> Assistant </option> -->
                        <!-- </select>
                     </div> -->

                     


                     <div class="building-room">

                        <div class="form-input">
                           <label for="dept"> Department </label>

                           <select name="dept" id="dept" required>
                              <option value="BSIT"> BSIT Department </option>
                              <option value="BSIE"> BSIE Department </option>
                              <option value="BSENT"> BSENT Department </option>
                              <option value="BSECE"> BSECE Department </option>
                              <option value="BSA"> BSA Department </option>
                           </select>
                        </div>

                        <div class="form-input">
                           <label for="dept-building"> Building </label>

                           <select name="dept_building" id="dept-building" required>
                              <option value="Bautista"> Bautista Building </option>
                              <option value="TechVoc"> TechVoc Building </option>
                              <option value="Belmonte"> Belmonte Building </option>
                           </select>
                        </div>

                        <div class="form-input">
                           <label for="dept-room"> Room </label>

                           <select name="dept_room" id="dept-room" required>
                              <option value="IC301a"> IC301a </option>
                              <option value="IC302a"> IC302a</option>
                              <option value="IC303a"> IC303a </option>
                              <option value="IC304a"> IC304a </option>
                              <option value="IC305a"> IC305a </option>
                              <option value="IC306a"> IC306a </option>
                           </select>
                        </div>


                        
                     </div>


                     <!-- <div class="form-input">
                        <label for="dept-fname"> Firstname </label>
                        <input type="text" name="dept_fname" id="dept-fname" placeholder="Ex: Juan" required>
                     </div> -->

                     <div class="form-input">
                        <label for="course_program"> Course/Program </label>
                        <input type="text" name="course_program" id="course_program" placeholder="Ex: BS Information Technology" required>
                     </div>

                     <div class="form-input">
                        <label for="dept-email"> Email Address </label>
                        <input type="text" name="dept_email" id="dept-email" placeholder="Ex: juan.delacruz@gmail.com" required>
                     </div>

                     <!-- <div class="form-input">
                        <label for="dept-cNum"> Contact Number </label>
                        <input type="text" name="dept_cnum" id="dept-cNum" placeholder="Ex: 09**********" maxlength="11" minlength="11" required>
                     </div> -->


                     <div class="form-button">
                        <button type="button" id="cancel-dept-btn"> Cancel </button>
                        <button id="add-dept-btn"> Add Department </button>
                     </div>

                  </form>

               </div>

<script>

   $(document).ready(function(){

      $('#cancel-dept-btn').click(function(){

         $('#modal-dept-container').hide();

      });

      // when form is submitted
      $('#add-dept-form').submit(function(e){

         e.preventDefault(); // prevent load page

         const form =  $('#add-dept-form')[0];
         const formData = new FormData(form);

         console.log($('#dept-profile').val());


         if($('#dept-profile').val() == ''){

            $('.form-upload label').css('border-color', 'red');

         } else {

            // ajax
            $.ajax({
   
               url: "../process/add_dept.php",
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
              

         }

       

      });


   });
   
</script>