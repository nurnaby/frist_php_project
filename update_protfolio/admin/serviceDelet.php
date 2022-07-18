<?php
require 'contorller/bdconfig.php';
 $service_id= $_GET['service_id'];

$updatequery= "UPDATE `services` SET design_status=0 WHERE id='{$service_id}'";



$issubmit=mysqli_query($dbcon,$updatequery);
if($issubmit==true){
    $message= 'service delete succesful';
}else{
    $message= 'service delete failed';
}
header("Location:service_list.php?msg={$message}");


?>