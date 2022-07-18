<?php
require 'contorller/bdconfig.php';
 $category_id= $_GET['category_id'];

$updatequery= "UPDATE `categories` SET active_status=0 WHERE id='{$category_id}'";



$issubmit=mysqli_query($dbcon,$updatequery);
if($issubmit==true){
    $message= 'category delete succesful';
}else{
    $message= 'category delete failed';
}
header("Location:category_list.php?msg={$message}");


?>