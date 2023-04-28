<?php

   include "./includes/db_con.php";
   include "./functions/student_function.php";

   // error_reporting(0);
   session_start();

   $student_id = $_SESSION['student_id'];

   $stud_logged = selStudentAcc($conn, $student_id);

   if($stud_logged['isVerified'] == 1){

      header("location: ./pages/personal-information.php");

   }


   if(empty($student_id)){

      header("location: ./student-login.php");
   }



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="../assets/favcon.png" type="image/x-icon">
   <link rel="stylesheet" href="./css/survey.css">

   <!-- Font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- Ajax -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

   <title> Survey Form | QCU CMS </title>
</head>
<body>

   <header>

      <div>
         
         <div class="img-handler">
            <img src="../clinic-logo.png" alt="">
         </div>
   
         <div class="qcu-title">
            <h1> Welcome to Quezon City University Clinic </h1>
   
            
         </div>
      </div>

      <div>

         <div class="account-logout">

            <div class="stud-profile">

               <div class="img-handler">
                  
                  <img src="../assets/<?=$stud_logged['id_image']?>" alt="">

               </div>

               <i class="fa fa-angle-down" aria-hidden="true"></i>

            </div>


            <div class="stud-logout">
               <div class="email">
                  <div class="img-handler">
                     <img src="../assets/<?=$stud_logged['id_image']?>" alt="">
                  </div>
                  
                  <?=$stud_logged['email']?>
               </div>

               <div class="logout">
                  <a href="../process/logout.php"> Logout <i class="fa fa-power-off" aria-hidden="true"></i> </i> </a>
               </div>
            </div>

         </div>

      </div>

      <script>
         $(document).ready(function(){

            $('.stud-logout').hide();

            // $('.account-logout').mouseenter(function(){

              

            //    $('.stud-logout').mouseleave(function(){

            //       $('.stud-logout').hide();

            //    });

            // });

            $('.stud-profile').click(function(){

               $('.stud-logout').show();

               $('.stud-logout').mouseleave(function(){

                  $('.stud-logout').hide();

               });

            });

            

         });
      </script>
   </header>
   
   <main>

      <div class="header-identifier">

         <div class="step-identifier current">
            <h3> Covid-19 Vaccine </h3>
         </div>

         <div class="step-identifier ">
            <h3> Health History </h3>
         </div>

         <div class="step-identifier">
            <h3> Medical Requirements </h3>
         </div>

      </div>


      <form action="../process/verify_student.php" method="POST" enctype="multipart/form-data">
         
         <div class="vaccine-booster-form">
            
            <div class="form-header">
               <h2> COVID-19 VACCINE INFORMATION </h2>
            </div>

            <div class="form-submit">
            
               <div class="vaccine-form">

                  <div class="form-input radio">

                     <h3> Are you fully vaccinated? <span>*</span> </h3>

                     <div class="form-radio">
                        <input type="radio" name="isVaccinated" id="yes-vaccinated" value="Yes" required>
                        <label for="yes-vaccinated"> Yes </label>

                        <input type="radio" name="isVaccinated" id="no-vaccinated"  value="No" required>
                        <label for="no-vaccinated"> No </label>
                     </div>
                     

                  </div>

                  <div class="form-input">

                     <h3> 1st Dose </h3>

                     <div class="form-select">

                        <label for="vaccine_type-1"> Type of vaccine: <span>*</span> </label>

                        <select name="vaccineType" class="input-selector" id="vaccine_type-1" required disabled>
                           <option value=""> Select type of vaccine </option>
                           <option value="Astrazeneca"> Astrazeneca </option>
                           <option value="Sinovac"> Sinovac </option>
                           <option value="Pfizer-BioNTech"> Pfizer-BioNTech </option>
                        </select>

                     </div>

                     <div class="form-date">

                        <label for="vaccine_date-1"> Date of 1st dose: <span>*</span></label>

                        <input type="date" name="vaccineDate1" class="input-selector" id="vaccine_date-1" required disabled>
                        
                     </div>
                  </div>

                  <div class="form-input">

                     <h3> 2nd Dose </h3>

                     <div class="form-select">
                        <label for="vaccine_type-2"> Type of vaccine: <span>*</span></label>

                        <select name="vaccineType2" class="input-selector" id="vaccine_type-2" required disabled>
                           <option value=""> Select type of vaccine </option>
                           <option value="Astrazeneca"> Astrazeneca </option>
                           <option value="Sinovac"> Sinovac </option>
                           <option value="Pfizer-BioNTech"> Pfizer-BioNTech </option>
                        </select>

                     </div>

                     <div class="form-date">

                        <label for="vaccine_date-2"> Date of 2nd dose: <span>*</span> </label>

                        <input type="date" name="vaccineDate2" class="input-selector" id="vaccine_date-2" required disabled>
                        
                     </div>
                  </div>

               </div>


               <div class="booster-form">

                  <div class="form-title">

                     <h3> Booster Shots (Optional)</h3>

                  </div>

                  <div class="form-input">

                     <h3> 1st Booster </h3>

                     <div class="form-select">
                        <label for="booster_type-1"> Type of booster: </label>

                        <select name="boosterType1" class="input-selector" id="booster_type-1" disabled>
                           <option value="N/A"> Select type of booster </option>
                           <option value="Astrazeneca"> Astrazeneca </option>
                           <option value="Sinovac"> Sinovac </option>
                           <option value="Pfizer-BioNTech"> Pfizer-BioNTech </option>
                        </select>

                     </div>

                     <div class="form-date">

                        <label for="booster_date-1"> Date of 1st booster: </label>

                        <input type="date" name="boosterDate1" class="input-selector" id="booster_date-1" disabled >
                        
                     </div>
                  </div>

                  <div class="form-input">

                     <h3> 2nd Booster </h3>

                     <div class="form-select">
                        <label for="booster_type-2"> Type of booster: </label>

                        <select name="boosterType2" class="input-selector" id="booster_type-2" disabled>
                           <option value="N/A"> Select type of booster </option>
                           <option value="Astrazeneca"> Astrazeneca </option>
                           <option value="Sinovac"> Sinovac </option>
                           <option value="Pfizer-BioNTech"> Pfizer-BioNTech </option>
                        </select>

                     </div>

                     <div class="form-date">

                        <label for="booster_date-2"> Date of 2nd dose: </label>

                        <input type="date" name="boosterDate2" class="input-selector" id="booster_date-2" disabled>
                        
                     </div>
                  </div>

               </div>
               
            </div>


            <div class="form-button">
               <button type="button" id="next-1"> Next </button>
            </div>
               
         </div>

         <div class="health-history-form">

            <div class="form-header">
               <h2> Health History </h2>
            </div>

            <p> If not applicable please type <span style="color: red;"> N/A </span></p>


            <div class="form-submit">

               <div class="form-division">

                  <div class="form-input-checkbox">

                     <label for="head-injury" class="checkbox">
                        <input type="checkbox" value="Yes" name="head-injury" id="head-injury" value="">
                        <span> Head and neck injury? </span>
                     </label>

                  </div>

                  <div class="form-input-checkbox w-sub">

                     <label for="eye-problem" class="checkbox">
                        <input type="checkbox" name="eye-problem" id="eye-problem" value="Yes">
                        <span> Eye problem? </span>
                     </label>


                     <div class="sub-q">

                        <label for=""> Are you wearing removable lenses? <span>*</span></label>

                        <select name="removalLenses" id="" disabled>
                           <option value=""> Select (Y/N)</option>
                           <option value="No"> No </option>
                           <option value="Yes"> Yes </option>
                        </select>
                     </div>

                  </div>

                  <div class="form-input-checkbox">

                     <label for="ear-problem" class="checkbox">
                        <input type="checkbox" name="ear-problem" id="ear-problem" value="Yes">
                        <span> Ear problem/Deafness </span>
                     </label>
                  </div>

                  <div class="form-input-checkbox w-sub">

                     <label for="asthma" class="checkbox">
                        <input type="checkbox" value="Yes" name="asthma" id="asthma">
                        <span> Asthma? </span>
                     </label>


                     <div class="sub-q">        

                        <label for="asthma-med"> Medication <span>*</span></label>

                        <input type="text" name="asthma-med" id="asthma-med" disabled>

                        <label for="asthma-last-attact"> Last attack <span>*</span></label>

                        <input type="date" name="asthma-last-attact" id="asthma-last-attact" disabled>

                        
                     </div>

                     

                  </div>

                  <div class="form-input-checkbox w-sub">

                     <label for="ulcer" class="checkbox">
                        <input type="checkbox" name="ulcer" id="ulcer">
                        <span> Ulcer/Hyperacidity </span>
                     </label>


                     <div class="sub-q">

                        <label for="ulcer-med"> Medication <span>*</span></label>

                        <input type="text" id="ulcer-med" name="ulcerMed" disabled>
                        
                     </div>

                     

                  </div>

                  <div class="form-input-checkbox w-sub">

                     <label for="pul-tuber" class="checkbox">
                        <input type="checkbox" name="pulTuber" id="pul-tuber">
                        <span> Pulmonary Tuberculosis </span>
                     </label>


                     <div class="sub-q">

                        <label for="pt-date-diag"> Date of diagnosis <span>*</span></label>

                        <input type="date" id="pt-date-diag" name="ptDateDiag" disabled>

                        <label for="pt-date-med-start"> Date of medication started <span>*</span></label>

                        <input type="date" id="pt-date-med-start" name="ptDateMedStart" disabled>
                        
                     </div>

                     

                  </div>

                  <div class="form-input-checkbox w-sub">

                     <label for="heart-prob" class="checkbox">
                        <input type="checkbox" name="heartProb" id="heart-prob">
                        <span> Heart problem </span>
                     </label>


                     <div class="sub-q">

                        <label for="hp-spec"> Please specify <span>*</span></label>

                        <input type="text" id="hp-spec" name="hpSpec" disabled>

                        <label for="hp-med"> Medication <span>*</span></label>

                        <input type="text" id="hp-med" name="hpMed" disabled>
                        
                     </div>

                     

                  </div>

                  <div class="form-input-checkbox w-sub">

                     <label for="allergy" class="checkbox">
                        <input type="checkbox" name="allergy" id="allergy">
                        <span> Allergy </span>
                     </label>


                     <div class="sub-q">

                        <label for="allergy-spec"> Please specify <span>*</span></label>

                        <input type="text" id="allergy-spec" name="allergySpec" disabled>

                        <label for="allergy-med"> Medication <span>*</span></label>

                        <input type="text" id="allergy-med" name="allergyMed" disabled>
                        
                     </div>

                     

                  </div>

                  <div class="form-input-checkbox w-sub">

                     <label for="hospital-operation" class="checkbox">
                        <input type="checkbox" value="Yes" name="hospitalOperation" id="hospital-operation">
                        <span> Hospitalization/Operation: </span>
                     </label>


                     <div class="sub-q">

                        <label for="ho-details"> Details <span>*</span></label>

                        <input type="text" id="ho-details" name="hoDetails" disabled>
                        
                     </div>

                     

                  </div>

                  <div class="form-input-checkbox">

                     <label for="fainting-spells" class="checkbox">
                        <input type="checkbox" value="Yes" name="seizure" id="fainting-spells">
                        <span> Fainting spells (madalas na pagkahilo)/Seizure </span>
                     </label>

                  </div>

                  <div class="form-input-checkbox">

                     <label for="fracture" class="checkbox">
                        <input type="checkbox" value="Yes" name="fracture" id="fracture">
                        <span> Fracture, history of dengue, measles, chicken pox </span>
                     </label>

                  </div>

                  <div class="form-input-checkbox">

                     <label for="vices" class="checkbox">
                        <input type="checkbox" value="Yes" name="vices" id="vices">
                        <span> Vices (alcoholic, smoker, etc.) </span>
                     </label>

                  </div>

                  <div class="form-input-checkbox w-sub">

                     <label for="other-med-history" class="checkbox">
                        <input type="checkbox" value="Yes" name="otherMedHistory" id="other-med-history">
                        <span> Other significant medical history </span>
                     </label>


                     <div class="sub-q">

                        <input type="text" name="otherMedHistoryDetails" disabled>
                        
                     </div>

                     

                  </div>

               </div>


               <div class="form-family">
                  <h3> Please Indicate family medical history below: </h3>

                  <div class="med-history">

                     <div class="form-input">
                        <label for="med-history-father"> Father's side </label>
                        <textarea name="med-history-father" id="med-history-father" placeholder="if not applicable leave attended"></textarea>
                     </div>

                     <div class="form-input">
                        <label for="med-history-mother"> Mother's side </label>
                        <textarea name="med-history-mother" id="med-history-mother" placeholder="if not applicable leave attended"></textarea>
                     </div>

                  </div>
                 
               </div>

            </div>


            <div class="form-button">
               <button type="button" class="back-submit" id="back-1"> Back </button>
               <button type="button" id="next-2"> Next </button>
            </div>

         </div>

         <div class="med-requirements-form">

            <div class="form-header">
               <h2> Medical Requirements </h2>
            </div>

            <div class="form-submit">

            

               <div class="form-input form-file">

                  <label for="cbc">

                     <div class="title">
                        
                        Complete Blood Count (CBC) <span>* (pdf only) </span>
                        
                     </div>
                     
                     <input type="file" name="cbc" accept="application/pdf" id="cbc" required>

                    
                  </label>

               </div>

               <div class="form-input form-file">

                  <label for="urinalysis">

                     <div class="title">
                        Urinalysis <span>* (pdf only)</span>
                        
                     </div>
                     
                     <input type="file" name="urinalysis" accept="application/pdf" id="urinalysis" required>

                    
                  </label>

               </div>

               <div class="form-input form-file">

                  <label for="chest_x-ray">

                     <div class="title">
                        Chest X-Ray <span>* (pdf only)</span>
                        
                     </div>
                     
                     <input type="file" name="chestXray" accept="application/pdf" id="chest_x-ray" required>

                    
                  </label>

               </div>

               <div class="form-input form-file">

                  <label for="med-cert">

                     <div class="title">
                        Medical Certificate <span>* (pdf only)</span>
                        
                     </div>
                     
                     <input type="file" name="medCert" accept="application/pdf" id="med-cert" required>

                    
                  </label>

               </div>

               <div class="note">
                  <p> Please make sure to upload the required (*) documents above before submmitting! </p>
               </div>


            </div>

            <div class="form-button">
               <button type="button" class="back-submit" id="back-2"> Back </button>
               <button type="submit" name="insert-btn"> Submit </button>
            </div>

         </div>

      </form>
    
   </main>
</body>

<script>
   $(document).ready(function(){

      let checkboxes = $('.form-input-checkbox.w-sub input[type=checkbox]');

      let subQuestions = $('.form-input-checkbox.w-sub');

      // console.log(checkboxes);

      for(let i = 0; i < checkboxes.length; i++){

         checkboxes[i].addEventListener('click', (e)=>{

            
            if(checkboxes[i].checked === true){

               $(subQuestions[i]).children().first().css('background', 'var(--primary)');
               $(subQuestions[i]).children().first().css('color', '#fff');
               $(subQuestions[i]).children().last().children().attr('disabled', false);

            } else {
               $(subQuestions[i]).children().first().css('background', '#d3d3d3');
               $(subQuestions[i]).children().first().css('color', '#000');
               $(subQuestions[i]).children().last().children().attr('disabled', true);
            }

         });

      }
   });
</script>

<script>

   const vaccineFormInput = document.querySelectorAll("main form .vaccine-booster-form .form-submit .input-selector");

   let vaccineYes = document.querySelector('#yes-vaccinated');
   let vaccineNo = document.querySelector('#no-vaccinated');
   
   vaccineYes.addEventListener('click', (e)=>{
      
      vaccineFormInput.forEach(element => {

         element.disabled = false; 

      });
   });


   vaccineNo.addEventListener('click', (e)=>{
      
      vaccineFormInput.forEach(element => {

         element.disabled = true;
         
      });
   });

  
</script>


<script>
   $(document).ready(function(){

      const stepIdentifier = document.querySelectorAll('.header-identifier .step-identifier');


      $('.vaccine-booster-form').show();
      $('.health-history-form').hide();
      $('.med-requirements-form').hide();

      $('#next-1').click(function(e){

         let isVaccinatedRadioButton = $('.vaccine-form .radio .form-radio input[type=radio]');

         let vaccineFormInputs = document.querySelectorAll('.vaccine-form .form-input .input-selector');


         if(isVaccinatedRadioButton[0].checked === true){


            let counter = 0;
            
            vaccineFormInputs.forEach(element => {

               if(element.value == '') { 

                  counter++;

               }

            });


            if(counter > 0) {

               alert('fill up required form')

            } else {
               
               for(let i = 0; i < stepIdentifier.length; i++){

                  if(i === 1){

                     stepIdentifier[i].classList.add('current');

                  } else {

                     stepIdentifier[i].classList.remove('current');
                  }

               }

               $('.vaccine-booster-form').hide();
               $('.health-history-form').show();
               $('.med-requirements-form').hide();

            }


         } else if(isVaccinatedRadioButton[1].checked === true){
            
            for(let i = 0; i < stepIdentifier.length; i++){

               if(i === 1){

                  stepIdentifier[i].classList.add('current');

               } else {

                  stepIdentifier[i].classList.remove('current');
               }

            }

            $('.vaccine-booster-form').hide();
            $('.health-history-form').show();
            $('.med-requirements-form').hide();


         } else {

            alert('click radio button first');
         }
      
         

      });


      $('#next-2').click(function(e){

         // console.log(stepIdentifier[1]);

         for(let i = 0; i < stepIdentifier.length; i++){

            console.log(stepIdentifier[i]);

            if(i === 2){

               stepIdentifier[i].classList.add('current');

            } else {

               stepIdentifier[i].classList.remove('current');
            }

         }

   

         $('.vaccine-booster-form').hide();
         $('.health-history-form').hide();
         $('.med-requirements-form').show();

      });


      $('#back-1').click(function(e){

         // console.log(stepIdentifier[1]);

         for(let i = 0; i < stepIdentifier.length; i++){

            console.log(stepIdentifier[i]);

            if(i === 0){

               stepIdentifier[i].classList.add('current');

            } else {

               stepIdentifier[i].classList.remove('current');
            }

         }

   

         $('.vaccine-booster-form').show();
         $('.health-history-form').hide();
         $('.med-requirements-form').hide();

      });


      $('#back-2').click(function(e){

         // console.log(stepIdentifier[1]);

         for(let i = 0; i < stepIdentifier.length; i++){

            console.log(stepIdentifier[i]);

            if(i === 1){

               stepIdentifier[i].classList.add('current');

            } else {

               stepIdentifier[i].classList.remove('current');
            }

         }

   

         $('.vaccine-booster-form').hide();
         $('.health-history-form').show();
         $('.med-requirements-form').hide();

      });

   });
</script>

</html>