<header>

<div class="admin-profile">

   <div class="admin-text">
      <p> Hey, Admin <span style=""> <?=$admin_logged['lname']?></span>! </p>             
   </div>

   <div class="profile" id="profile">
      
      <div class="img-handler">
         <img src="../assets/<?=$admin_logged['img']?>" alt="">
      </div>

      <div class="icon">
         <i class="fas fa-sort-down" aria-hidden="true"></i>
      </div>

      <div class="acc-sub-menu">
         <ul>
            <li> <a href="#"> Manage Account </a></li>
            <li> <a href="#"> My Activity </a></li>
            <li> <a href="../process/logout.php"> Logout </a></li>
         </ul>
      </div>

   </div>
      
</div>

</header>


<script>
   $(document).ready(function(){

      $('.acc-sub-menu').hide();

      $('#profile').click(function(){

         // $('.acc-sub-menu').show();

         if($('.acc-sub-menu').css('display') == 'none') {

            $('.acc-sub-menu').css('display', 'block');
            
         }else {

            $('.acc-sub-menu').css('display', 'none');

         }

      });

   });
</script>