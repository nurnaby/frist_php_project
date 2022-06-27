<?php
require 'contorller/bdconfig.php';
 $project_id= $_GET['project_id'];

$updatequery= "UPDATE `our_projects` SET active_status=0 WHERE id='{$project_id}'";



$issubmit=mysqli_query($dbcon,$updatequery);
if($issubmit==true){
    $message= 'project delete succesful';
}else{
    $message= 'project delete failed';
}
header("Location:project_list.php?msg={$message}");


?>