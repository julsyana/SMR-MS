<?php
                        include "db_conn.php";
                        $sql = "SELECT * FROM students LIMIT 4";
                        $run_sql = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                        if(mysqli_num_rows($run_sql) > 0){
                          while ($row = mysqli_fetch_array($run_sql)) {
  ?>
     <tr class="border-bottom">
                          <td><?php echo $row['student_id'] ?></td>
                          <td><?php echo $row['firstname'] ." ". $row['lastname'] ?></td>
                          <td><?php echo $row['course'] ?></td>
                          <td><?php echo $row['year_level'] ?></td>
                          <td><?php echo $row['remarks'] ?></td>
                        </tr>
 <?php }
                        }
                        
                        ?>
<?php
                        include "db_conn.php";
                        $sql = "SELECT position FROM nurses WHERE emp_id='empid'";
                        $run_sql = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                        if(mysqli_num_rows($run_sql) > 0){
                          while ($row = mysqli_fetch_array($run_sql)) {
  ?>

<div class="text-light">
                          <p><?php echo $_SESSION['emp_id'] ?></p>
                          <p class="fw-bold"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']  ?></p>
                          <p><?php echo $row['position'] ?></p>
                        </div>
                        <div class="text-light text-center">
                          <p class="fw-bold fs-2">20</p>
                          <p class="p-0">Consult Today</p>
                        </div>

    <?php                      }
                        }
                        ?>