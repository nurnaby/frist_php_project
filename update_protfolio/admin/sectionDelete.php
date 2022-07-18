<?php
require 'contorller/bdconfig.php';
$section_id= $_GET['section_id'];
$updatequery= "UPDATE sections set 	section_staus= 0 WHERE id='{$section_id}'";
$issubmit=mysqli_query($dbcon,$updatequery);
if($issubmit){
    $message= 'section delete succesful';
}else{
    $message= 'section failed';
}
header("Location:sections_list.php?msg={$message}");




?>