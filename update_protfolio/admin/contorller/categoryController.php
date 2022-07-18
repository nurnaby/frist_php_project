<?php
require 'bdconfig.php';

// This for section insert 
 if(isset($_POST['saveCategory'])){
    $category_name     = $_POST['category_name'];
  

   if(empty($category_name)){
    echo ' filed are required';

        }else{
        $insertquery= "INSERT INTO categories(category_name) VALUES ('{$category_name}')";
        $issubmit=mysqli_query($dbcon,$insertquery);
        if($issubmit){
            $message= 'category insert succesful';
        }else{
            $message= 'insert failed';
        }
        header("Location:../category_list.php?msg={$message}");

        }
 }
// This update section 

if(isset($_POST['updateDesignation'])){

    $category_id = $_POST['category_id'];
    $category_name      = $_POST['category_name'];
   

   if(empty($category_name)){
    echo 'All filed are required';

        }else{

            $updatequery= "UPDATE categories set 	category_name='{$category_name}' WHERE id='{$category_id}'";

        // $insertquery= "INSERT INTO sections(title,sub_title,details,page_no) VALUES ('{$title}','{$sub_title}','{$details}','{$page_no}')";

        $issubmit=mysqli_query($dbcon,$updatequery);
        if($issubmit){
            $message= 'category update succesful';
        }else{
            $message= 'section failed';
        }
        header("Location:../categoryUpdate.php?category_id={$category_id}&msg={$message}");

        }
 }