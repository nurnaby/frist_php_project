<?php
require 'bdconfig.php';

// This for section insert 
 if(isset($_POST['saveService'])){
    $service_name    = $_POST['service_name'];
    $service_detaile = $_POST['service_detaile'];
    $icon_name       = $_POST['icon_name'];
    

   if(empty($service_name)|| empty($service_detaile)||empty($icon_name)){
    echo 'All filed are required';

        }else{
        $insertquery= "INSERT INTO services(service_name,service_details,icon_name) VALUES ('{$service_name}','{$service_detaile}','{$icon_name}')";

        $issubmit=mysqli_query($dbcon,$insertquery);
        if($issubmit){
            $message= 'banner insert succesful';
        }else{
            $message= 'insert failed';
        }
        header("Location:../serviceCreat.php?msg={$message}");

        }
 }
// This update service 

 if(isset($_POST['updateService'])){

    $service_id = $_POST['service_id'];
    $service_name      = $_POST['service_name'];
    $service_details  = $_POST['service_details'];
    $icon_name    = $_POST['icon_name'];

   if(empty($service_name)|| empty($service_details)||empty($icon_name)){
    echo 'All filed are required';

        }else{

            $updatequery= "UPDATE services set service_name='{$service_name}', service_details='{$service_details}', icon_name='{$icon_name}' WHERE id='{$service_id}'";

        // $insertquery= "INSERT INTO sections(title,sub_title,details,page_no) VALUES ('{$title}','{$sub_title}','{$details}','{$page_no}')";

        $issubmit=mysqli_query($dbcon,$updatequery);
        if($issubmit){
            $message= 'service update succesful';
        }else{
            $message= 'service failed';
        }
        header("Location:../service_list.php?msg={$message}");

        }
 }