<?php
require 'contorller/bdconfig.php';
$banner_id= $_GET['banner_id'];
$updatequery= "UPDATE `banners` SET active_status=0 WHERE id='{$banner_id}'";



$issubmit=mysqli_query($dbcon,$updatequery);
if($issubmit==true){
    $message= 'banner delete succesful';
}else{
    $message= 'banner delete failed';
}
header("Location:banner_list.php?msg={$message}");


?>