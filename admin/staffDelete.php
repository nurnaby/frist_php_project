<?php
require 'contorller/bdconfig.php';
 $staff_id= $_GET['staff_id'];

$updatequery= "UPDATE `our_staff` SET active_status=0 WHERE id='{$staff_id}'";



$issubmit=mysqli_query($dbcon,$updatequery);
if($issubmit==true){
    $message= 'staff delete succesful';
}else{
    $message= 'staff delete failed';
}
header("Location:staff_list.php?msg={$message}");


?>