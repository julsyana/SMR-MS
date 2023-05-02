<?php


$sqltotal = "SELECT COUNT(*) as count FROM `entrance_log` a
JOIN `sample_stud_data` b 
ON a.`student_number` = b.`student_id`
WHERE a.logdate = CURRENT_DATE();";

$result = mysqli_query($conn, $sqltotal);

$count = mysqli_fetch_assoc($result);
$total = $count['count'];






$sqlverfied = "SELECT COUNT(*) as count FROM `entrance_log` a
JOIN `sample_stud_data` b 
ON a.`student_number` = b.`student_id`
WHERE b.`Status` = 'Cleared' AND a.logdate = CURRENT_DATE();";

$result1 = mysqli_query($conn, $sqlverfied);

$count_verified = mysqli_fetch_assoc($result1);
$verified_total = $count_verified['count'];



// $sqlnotverified = "SELECT COUNT(*) as count FROM `entrance_log` a
// JOIN `sample_stud_data` b 
// ON a.`student_number` = b.`student_id`
// WHERE b.`Status` = 'PUI' AND a.logdate = CURRENT_DATE();";

// $result2 = mysqli_query($conn, $sqlnotverified);

// $count_not_verified = mysqli_fetch_assoc($result2);
// $notverified_total = $count_not_verified['count'];

$sqlnotverified = "SELECT COUNT(*) as count FROM `entrance_log`

WHERE `Status` = 'PUI' AND logdate = CURRENT_DATE();";

$result2 = mysqli_query($conn, $sqlnotverified);

$count_not_verified = mysqli_fetch_assoc($result2);
$notverified_total = $count_not_verified['count'];


$sel_archive = "SELECT * FROM `stud_archive` WHERE `date_archive` = CURRENT_DATE() ORDER BY id DESC LIMIT 5;";

$res_archive = mysqli_query($conn, $sel_archive);




$sel_cnt_archive = "SELECT COUNT(*) as count FROM `stud_archive` WHERE date_archive = CURRENT_DATE();";

$res_cnt_archive =  mysqli_query($conn, $sel_cnt_archive);

$count_archive = mysqli_fetch_assoc($res_cnt_archive);
$archive_total = $count_archive['count'];


// $sel_entrance_log_query ="SELECT *, LEFT(b.middlename, 1) AS `middle_initial` FROM `entrance_log` a
// JOIN `mis.student_info` b
// ON a.student_number = b.student_id
// JOIN `sample_stud_data` c
// ON a.student_number = c.student_id
// JOIN `mis.enrollment_status` d
// ON a.student_number = d.student_id
// WHERE (c.Status = 'Cleared' OR c.Status = 'Pending') AND a.logdate = CURRENT_DATE() ORDER BY a.id DESC LIMIT 5;";

$sel_entrance_log_query = "SELECT *, LEFT(b.middlename, 1) AS `middle_initial` FROM entrance_log a
JOIN `mis.student_info` b
ON a.student_number = b.student_id
JOIN `mis.enrollment_status` c
ON a.student_number = c.student_id
WHERE logdate = CURRENT_DATE() ORDER BY a.id DESC LIMIT 5;";

$res_entrance_log = mysqli_query($conn, $sel_entrance_log_query);


$sel_visitor_query = "SELECT * FROM `visitors` WHERE `date` = CURRENT_DATE() ORDER BY id DESC LIMIT 5;";

$res_visitor = mysqli_query($conn, $sel_visitor_query);


$cnt_visitor_query = "SELECT COUNT(*) as count FROM `visitors` WHERE `date` = CURRENT_DATE()";

$res_cnt_visitor =  mysqli_query($conn, $cnt_visitor_query);

$count_visitor = mysqli_fetch_assoc($res_cnt_visitor);
$total_visitor = $count_visitor['count'];



$overall_total = $total_visitor + $verified_total + $notverified_total + $archive_total;


?>