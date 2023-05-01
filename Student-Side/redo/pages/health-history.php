<?php
   include "../includes/header_process.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/png" href="../../assets/favcon.png"/> <!-- Icon -->
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/health_history.css">

   <!-- Ajax -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
   <title>  SMRMS | STUDENT | Health History </title>
</head>
<body>

   

   <div class="side-panel">

      <?php include "../includes/profile_nav.php" ?>
        
      <nav class="nav primary-nav">
         
         <div class="sub-header">
         
            <p> Main </p>
         
         </div>
         
         <ul>
            <li> 
               <a href="./dashboard.php"> Dashboard </a>
            </li>
            
            <li> 
               <a href="./personal-information.php"> Personal Information </a>
            </li>
         
            <li> 
               <a href="./medical-requirements.php"> Medical Requirements</a>
            </li>
         
            <li> 
               <a href="./medical-history.php"> Medical History </a>
            </li>

            <li class="selected"> 
               <a href="./health-history.php"> Health History  </a>
            </li>
         
         
            <li> 
               <a href="./appointment-list.php"> Appointment </a>
            </li>

             <li> 
               <a href="./entrancelog.php"> Entrace Log </a>
            </li>
         </ul>
        
      </nav>
        
      <nav class="nav secondary-nav">
        
         <div class="sub-header">
         
            <p> Settings </p>
         
         </div>
        
         <ul>
            <li> 
               <a href="./manage-account.php"> Manage Account </a>
            </li>
         
            <li> 
               <a href="../../process/logout.php"> Logout </a>
            </li>
         </ul>
        
      </nav>
        
   </div>

   <main>

      <header>

         <div class="logo">
            <img src="../../assets/favcon.png" alt="">
         </div>

         <div class="title">
            <h1>Student Medical Record</h1>
         </div>

      </header>

      <div class="container">

         

         <div class="health-history">

            <h3> Health History </h3>

            <div class="hh-navigation">

               <div class="nav-button current">

                  <p> Covid-19 Vaccine Information </p>

               </div>

               <div class="nav-button">

                  <p> Health History </p>
                  
               </div>  
               
               <div class="nav-button">

                  <p> Family Health History </p>
                  
               </div>  

            </div>

            <div class="hh-container">

               <!-- Vaccine information container -->
               <div class="vaccine-container">

                  <div class="covid-container">

                     <div class="covid-answer">
                        <p> Covid-19 Vaccinated: <span> <?=$res_stud_hh['isVaccinated']?> </span> </p>
                     </div>


                     <div class="covid-answer">
                        <h3> 1st Dose </h3>
                        <p> Type of vaccine: <span> <?=$res_stud_hh['first-vaccine']?></span></p>
                        <p> Date of 1st dose: <span>  <?=$res_stud_hh['first-vaccine_date']?>  </span></p>
                     </div>

                     <div class="covid-answer">
                        <h3> 2nd Dose </h3>
                        <p> Type of vaccine: <span> <?=$res_stud_hh['second-vaccine']?> </span></p>
                        <p> Date of 2nd dose: <span> <?=$res_stud_hh['second-vaccine_date']?>  </span></p>
                     </div>

                  </div>

                  
                  <div class="booster-container">

                     <div class="booster-answer">
                        <p> Booster Shots </p>
                     </div>


                     <div class="booster-answer">
                        <h3> 1st Booster </h3>
                        <p> Type of vaccine: <span> <?=$res_stud_hh['first-booster']?> </span></p>
                        <p> Date of 1st booster: <span> <?=$res_stud_hh['first-booster_date']?> </span></p>
                     </div>

                     <div class="booster-answer">
                        <h3> 2nd Booster </h3>
                        <p> Type of vaccine: <span> <?=$res_stud_hh['second-booster']?> </span></p>
                        <p> Date of 2nd booster: <span> <?=$res_stud_hh['second-booster_date']?> </span></p>
                     </div>

                  </div>

               </div>

               <!-- Health history information container -->
               <div class="health-history-container">

                  <div class="hh-info-container">

                     <div class="hh-answer">
                        <div class="hh-q">
                           <p> Head and neck injury: <span> <?=$res_stud_hh['head_injury']?> </span> </p>
                        </div>
                     </div>

                     <div class="hh-answer w-sub-q">

                        <div class="hh-q">
                           <p> Eye problem: <span> <?=$res_stud_hh['eye_problem']?> </span> </p>
                        </div>

                        <div class="sub-q">
                           <p> Wearing removable lenses: <span><?=$res_stud_hh['wear_lenses']?> </span> </p>
                        </div>
                        
                     </div>

                     <div class="hh-answer">
                        <div class="hh-q">
                           <p> Ear Problem/Deafness: <span> <?=$res_stud_hh['ear_problem']?> </span> </p>
                        </div>
                     </div>

                     <div class="hh-answer w-sub-q">

                        <div class="hh-q">
                           <p> Asthma: <span> <?=$res_stud_hh['has_asthma']?> </span> </p>
                        </div>

                        <div class="sub-q">
                           <p> Medication: <span> <?=$res_stud_hh['asthma_med']?> </span> </p>

                           <p> Last attack: <span> <?=$res_stud_hh['asthma_date']?> </span> </p>
                        </div>
                        
                     </div>

                     <div class="hh-answer w-sub-q">

                        <div class="hh-q">
                           <p> Ulcer/Hyperacidity: <span> <?=$res_stud_hh['has_ulcer']?> </span> </p>
                        </div>

                        <div class="sub-q">
                           
                           <p> Medication: <span> <?=$res_stud_hh['ulcer_med']?> </span> </p>

                        </div>
                        
                     </div>

                     <div class="hh-answer w-sub-q">

                        <div class="hh-q">
                           <p> Pulmonary Tuberculosis: <span> <?=$res_stud_hh['has_ptb']?> </span> </p>
                        </div>

                        <div class="sub-q">
                           
                           <p> Date of diagnosis: <span> <?=$res_stud_hh['ptb_date_diag']?>  </span> </p>

                           <p> Date of medication started: <span> <?=$res_stud_hh['ptb_date_med_start']?>  </span> </p>

                        </div>
                        
                     </div>

                     <div class="hh-answer w-sub-q">

                        <div class="hh-q">
                           <p> Heart Problem: <span> <?=$res_stud_hh['heart_problem']?> </span> </p>
                        </div>

                        <div class="sub-q">
                           
                           <p> Type of Heart Problem: <span> <?=$res_stud_hh['hp_spec']?> </span> </p>

                           <p> Medication: <span> <?=$res_stud_hh['hp_med']?> </span> </p>

                        </div>
                        
                     </div>

                     <div class="hh-answer w-sub-q">

                        <div class="hh-q">
                           <p> Allergy: <span> <?=$res_stud_hh['has_allergy']?> </span> </p>
                        </div>

                        <div class="sub-q">
                           
                           <p> Type of Allergy: <span> <?=$res_stud_hh['allergy_spec']?> </span> </p>

                           <p> Medication: <span> <?=$res_stud_hh['allergy_med']?>  </span> </p>

                        </div>
                        
                     </div>

                     <div class="hh-answer w-sub-q">

                        <div class="hh-q">
                           <p> Hospitalization/Operation: <span> <?=$res_stud_hh['hospitalized']?> </span> </p>
                        </div>

                        <div class="sub-q">
                           
                           <p> Details: <span>  <?=$res_stud_hh['hospitalized_details']?> </span> </p>

                        </div>
                        
                     </div>

                     <div class="hh-answer">
                        <div class="hh-q">
                           <p> Fainting spells(madalas na pagkahilo)/Seizure: <span> <?=$res_stud_hh['has_seizure']?> </span> </p>
                        </div>
                     </div>

                     <div class="hh-answer">
                        <div class="hh-q">
                           <p> Fracture, history of dengue, measles, chicken pox: <span> <?=$res_stud_hh['has_fracture']?> </span> </p>
                        </div>
                     </div>

                     <div class="hh-answer">
                        <div class="hh-q">
                           <p> Vices (alcoholic, smoker, etc.): <span> <?=$res_stud_hh['has_vices']?> </span> </p>
                        </div>
                     </div>


                     <div class="hh-answer">

                        <div class="hh-q">
                           <p> Other significant medical history: <span> <?=$res_stud_hh['other']?> </span> </p>
                        </div>
                        
                     </div>


                  </div>

               </div>

               <!-- Family medical history -->
               <div class="fam-hh-container">

                  <div class="fam-hh-answer">

                     <div class="father-answer">
                        <p> Father's side </p>
                        <textarea name="" id="" disabled> <?=$res_stud_hh['father']?> </textarea>
                     </div>
                     
                  </div>

                  <div class="fam-hh-answer">

                     <div class="mother-answer">
                        <p> Mother's side </p>
                        <textarea name="" id="" disabled> <?=$res_stud_hh['mother']?> </textarea>
                     </div>
                     
                  </div>
               </div>
            </div>
   
         </div>

      </div>

   </main>

</body>

<script>
   $(document).ready(function(){

      let navButtons = document.querySelectorAll('.nav-button')
      let containers = document.querySelectorAll('.hh-container > div');

      $('.vaccine-container').show();
      $('.health-history-container').hide();
      $('.fam-hh-container').hide();

      for(let i = 0; i < navButtons.length; i++){

         $(navButtons[i]).click(function(){

            for(let j = 0; j < navButtons.length; j++) {

               if (j !== i){
                  
                  $(navButtons[j]).removeClass('current');
                  $(containers[j]).hide();
               }

               else{
                  $(navButtons[j]).addClass('current');
                  $(containers[j]).show();
               }
            }

         });
      }


      let withSubQ = document.querySelectorAll('.w-sub-q');

      let hhQ = document.querySelectorAll('.w-sub-q .hh-q');

      let SubQ = document.querySelectorAll('.w-sub-q .sub-q');

      for(let i = 0; i < withSubQ.length; i++){

         $(withSubQ[i]).click(function(){

            for(let j = 0; j < withSubQ.length; j++){
            
               if(j !== i){
                  
                  hhQ[j].style.background = "#fff";
                  hhQ[j].style.color = "#000";
                  SubQ[j].style.display = 'none';
               
               } else {

                  hhQ[j].style.background = "var(--primary)";
                  hhQ[j].style.color = "#fff";
                  SubQ[j].style.display = 'block';
               }
            }

         });

         $(withSubQ[i]).mouseenter(function(){

            for(let j = 0; j < withSubQ.length; j++){
            
               if(j !== i){
                  
                  hhQ[j].style.background = "#fff";
                  hhQ[j].style.color = "#000";
                  SubQ[j].style.display = 'none';
               
               } else {

                  hhQ[j].style.background = "var(--primary)";
                  hhQ[j].style.color = "#fff";
                  SubQ[j].style.display = 'block';
               }
            }

         });
      }

   });
</script>
</html>