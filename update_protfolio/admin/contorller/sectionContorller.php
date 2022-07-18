<?php
require 'bdconfig.php';

// This for section insert 
 if(isset($_POST['saveSection'])){
    $title     = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $details   = $_POST['details'];
    $page_no   = $_POST['page_no'];

   if(empty($title)|| empty($sub_title)||empty($details)||empty($page_no)){
    echo 'All filed are required';

        }else{
        $insertquery= "INSERT INTO sections(title,sub_title,details,page_no) VALUES ('{$title}','{$sub_title}','{$details}','{$page_no}')";
        $issubmit=mysqli_query($dbcon,$insertquery);
        if($issubmit){
            $message= 'banner insert succesful';
        }else{
            $message= 'insert failed';
        }
        header("Location:../sectionCreat.php?msg={$message}");

        }
 }
// This update section 

 if(isset($_POST['updateSection'])){

    $section_id = $_POST['section_id'];
    $title      = $_POST['title'];
    $sub_title  = $_POST['sub_title'];
    $details    = $_POST['details'];
    $page_no    = $_POST['page_no'];

   if(empty($title)|| empty($sub_title)||empty($details)||empty($page_no)){
    echo 'All filed are required';

        }else{

            $updatequery= "UPDATE sections set title='{$title}', sub_title='{$sub_title}', details='{$details}', page_no='{$page_no}' WHERE id='{$section_id}'";

        // $insertquery= "INSERT INTO sections(title,sub_title,details,page_no) VALUES ('{$title}','{$sub_title}','{$details}','{$page_no}')";

        $issubmit=mysqli_query($dbcon,$updatequery);
        if($issubmit){
            $message= 'section update succesful';
        }else{
            $message= 'section failed';
        }
        header("Location:../sectionUpdate.php?section_id={$section_id}&msg={$message}");

        }
 }