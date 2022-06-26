<?php
require 'bdconfig.php';
// This for insert 

 if(isset($_POST['saveStaff'])){
    $upload_status= false;
    if(isset(($_FILES['staff_image']))){
       
        $imgArray = $_FILES['staff_image'];

        $file_name     = $imgArray['name'];
        $file_tmp_name = $imgArray['tmp_name'];
        $file_size     = $imgArray['size'];

        $nameExtArr       = explode('.',$file_name);
        $file_extension   = strtolower(end($nameExtArr));
        $valid_extentions = array('jpg','png','jpeg');
        $random_file_name = time().'.'.$file_extension;

        if(in_array($file_extension,$valid_extentions)){
            
            move_uploaded_file($file_tmp_name,'../uploads/'.$random_file_name);
            $upload_status= true;

          
        }else{
           $message= $file_extension."is not supported";
        }
    }else{
       $message= "file not found";
    }
    
    $designation_id     = $_POST['designation_id'];
    $staff_name     = $_POST['staff_name'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $linkedin = $_POST['linkedin'];
    $instagram = $_POST['instagram'];
    
   
   if(empty($staff_name)|| empty($facebook)||$upload_status == false){
    echo 'All filed are required';

        }else{
        $insertquery= "INSERT INTO our_staff(staff_name,designation_id,staff_image,twitter,facebook,linkedin,instagram) VALUES ('{$staff_name}', '{$designation_id}','{$random_file_name}','{$twitter}','{$facebook}','{$linkedin}','{$instagram}')";
        $issubmit=mysqli_query($dbcon,$insertquery);
        if($issubmit){
            $message= 'Staff insert succesful';
        }else{
            $message= 'Staff insert failed';
        }
        header("Location:../staffCreat.php?msg={$message}");

        }
 }
//  This for update 

 if(isset($_POST['UpdateBanner'])){
    $upload_status= false;
    if(isset(($_FILES['images']))){
       
        $imgArray = $_FILES['images'];

        $file_name     = $imgArray['name'];
        $file_tmp_name = $imgArray['tmp_name'];
        $file_size     = $imgArray['size'];

        $nameExtArr       = explode('.',$file_name);
        $file_extension   = strtolower(end($nameExtArr));
        $valid_extentions = array('jpg','png','jpeg');
        $random_file_name = time().'.'.$file_extension;

        if(in_array($file_extension,$valid_extentions)){
            
            move_uploaded_file($file_tmp_name,'../uploads/'.$random_file_name);
            $upload_status= true;

          
        }else{
           $message= $file_extension."is not supported";
        }
    }else{
       $message= "file not found";
    }
    
    $title     = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $details   = $_POST['details'];
    
   
   if(empty($title)|| empty($sub_title)||empty($details)||$upload_status == false){
    echo 'All filed are required';

        }else{
        $insertquery= "INSERT INTO banners(title,sub_title,details,images) VALUES ('{$title}','{$sub_title}','{$details}','{$random_file_name}')";
        $issubmit=mysqli_query($dbcon,$insertquery);
        if($issubmit){
            $message= 'banner insert succesful';
        }else{
            $message= 'insert failed';
        }
        header("Location:../bannerCreat.php?msg={$message}");

        }
 }

 

?>