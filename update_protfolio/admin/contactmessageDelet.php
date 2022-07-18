<?php
require 'contorller/bdconfig.php';
$contactMess_id= $_GET['contactMess_id'];


$updatequery= "UPDATE `contact_messages` SET active_status=0 WHERE id='{$contactMess_id}'";



$issubmit=mysqli_query($dbcon,$updatequery);
if($issubmit==true){
   $message= 'contact message delete succesful';
}else{
   $message= 'message delete failed';
}
header("Location:contactMessates.php?msg={$message}");

?>