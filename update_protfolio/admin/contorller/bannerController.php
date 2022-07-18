<?php
require 'bdconfig.php';
// This for insert 

 if(isset($_POST['saveBanner'])){
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
//  This for update 1656514295.png
 if(isset($_POST['saveUpdate'])){
// get old image name 
    $banner_id = $_POST['banner_id'];
    $getSinglDataQry = "SELECT * FROM banners WHERE id='{$banner_id}'";
    $getResult = mysqli_query($dbcon,$getSinglDataQry);
    $oldImg = '';
    foreach($getResult as $key => $banner){
         $oldImg = $banner['images'];
        
    }
    // End get old image name 

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
        if($random_file_name!=$oldImg){ //when new image does not match with old image 
            //file remove
            $file ='../uploads/'.$oldImg;
            if(file_exists($file)){
                unlink($file); 
            }
            //End file remove
            // file update
            if(in_array($file_extension,$valid_extentions)){
            
                move_uploaded_file($file_tmp_name,'../uploads/'.$random_file_name);
                $upload_status= true;
    
              
            }else{
               $message= $file_extension."is not supported";
            }
        }
       
    }else{
       $message= "file not found";
    }
    $banner_id = $_POST['banner_id'];
    $title     = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $details   = $_POST['details'];
    
   if(empty($title)|| empty($sub_title)||empty($details)||$upload_status == false){
    echo 'All filed are required';

        }else{
        $updatequery= "UPDATE banners SET title='{$title}',sub_title='{$sub_title}',details='{$details}',images='{$random_file_name}' WHERE id='{$banner_id}'";
        $issubmit=mysqli_query($dbcon,$updatequery);
        if($issubmit){
            $message= 'banner update succesful';
        }else{
            $message= 'insert failed';
        }
        header("Location:../bannerUpdate.php?banner_id={$banner_id}&msg={$message}");

        }
 }

 

?>