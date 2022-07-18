<?php
require 'bdconfig.php';

// This for section insert 
 if(isset($_POST['savecontact_us'])){
    $address_details = $_POST['address_details'];
    $contact_number  = $_POST['contact_number'];
    $email_address   = $_POST['email_address'];
    $website_name    = $_POST['website_name'];

   if(empty($address_details)|| empty($contact_number)||empty($email_address)||empty($website_name)){
    echo 'All filed are required';

        }else{
        $insertquery= "INSERT INTO contact_us(address_details,contact_number,email_address,website_name) VALUES ('{$address_details}','{$contact_number}','{$email_address}','{$website_name}')";
        $issubmit=mysqli_query($dbcon,$insertquery);
        if($issubmit){
            $message= 'contact insert succesful';
        }else{
            $message= 'insert failed';
        }
        header("Location:../contactCreat.php?msg={$message}");

        }
 }
// This update section 

//  if(isset($_POST['updateSection'])){

//     $section_id = $_POST['section_id'];
//     $address_details      = $_POST['address_details'];
//     $contact_number  = $_POST['contact_number'];
//     $email_address    = $_POST['email_address'];
//     $website_name    = $_POST['website_name'];

//    if(empty($address_details)|| empty($contact_number)||empty($email_address)||empty($website_name)){
//     echo 'All filed are required';

//         }else{

//             $updatequery= "UPDATE sections set address_details='{$address_details}', contact_number='{$contact_number}', email_address='{$email_address}', website_name='{$website_name}' WHERE id='{$section_id}'";

//         // $insertquery= "INSERT INTO sections(address_details,contact_number,email_address,website_name) VALUES ('{$address_details}','{$contact_number}','{$email_address}','{$website_name}')";

//         $issubmit=mysqli_query($dbcon,$updatequery);
//         if($issubmit){
//             $message= 'section update succesful';
//         }else{
//             $message= 'section failed';
//         }
//         header("Location:../sectionUpdate.php?section_id={$section_id}&msg={$message}");

//         }
//  }