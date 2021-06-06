<?php
session_start();

include 'config.php';

$ret=mysqli_query($con,"SELECT * FROM login WHERE userName='$_SESSION[login]'");
$row=mysqli_fetch_array($ret);
$rel=mysqli_query($con,"SELECT * FROM userlog WHERE userName='$_SESSION[login]' ");
$rows=mysqli_fetch_array($rel);




$now = new DateTime();
$login_time = new DateTime($rows['loginTime']);
$timess=$login_time->format('Y-m-d H:i:s');
echo $timess;
$times = $now->diff($login_time);
$alltime=new DateTime($row['totaltime']);
$timess=$alltime->format('Y-m-d H:i:s');
echo $timess;
$time=$alltime->add($times);
$time=$time->format('Y-m-d H:i:s');
 echo $time;
echo mysqli_error($con);
mysqli_query($con, "UPDATE login SET totaltime = '$time' WHERE userName = '$_SESSION[login]'");

$_SESSION = NULL;
$_SESSION = [];
session_unset();
session_destroy();
$_SESSION['msg']="You have logged out successfully..!";
 ?>
 <script language="javascript">
   document.location="index.php";

 </script>
