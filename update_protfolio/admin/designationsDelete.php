<?php
require 'contorller/bdconfig.php';
 $designation_id= $_GET['designation_id'];

$updatequery= "UPDATE `designatoins` SET active_status=0 WHERE id='{$designation_id}'";



$issubmit=mysqli_query($dbcon,$updatequery);
if($issubmit==true){
    $message= 'designations delete succesful';
}else{
    $message= 'designations delete failed';
}
header("Location:designations_list.php?msg={$message}");


?>