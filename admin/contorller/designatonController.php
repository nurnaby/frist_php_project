<?php
require 'bdconfig.php';

// This for section insert 
 if(isset($_POST['saveDesignation'])){
    $designation_name     = $_POST['designation_name'];
  

   if(empty($designation_name)){
    echo ' filed are required';

        }else{
        $insertquery= "INSERT INTO designatoins(designation_name) VALUES ('{$designation_name}')";
        $issubmit=mysqli_query($dbcon,$insertquery);
        if($issubmit){
            $message= 'designaton insert succesful';
        }else{
            $message= 'insert failed';
        }
        header("Location:../designationsCreat.php?msg={$message}");

        }
 }
// This update section 

 if(isset($_POST['updateDesignation'])){

    $designation_id = $_POST['designation_id'];
    $designation_name = $_POST['designation_name'];
    

   if(empty($designation_name)){
    echo 'filed are required';

        }else{

            $updatequery= "UPDATE designatoins set designation_name='{$designation_name}' WHERE id='{$designation_id}'";
        $issubmit=mysqli_query($dbcon,$updatequery);
        if($issubmit){
            $message= 'designation update succesful';
        }else{
            $message= 'designation failed';
        }
        header("Location:../designationsUpdate.php?designation_id={$designation_id}&msg={$message}");

        }
 }