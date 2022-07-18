<?php
require_once '../admin/contorller/bdconfig.php';

// contact message insert 
if(isset($_POST['sendMessage'])){
   $name= $_POST['name'];
   $email= $_POST['email'];
   $subject= $_POST['subject'];
   $message= $_POST['message'];
   if(empty($name)|| empty($email)|| empty($subject)){
    echo "All filed is requerd";
   }else{
    $insertQuery = "INSERT INTO contact_messages (name,email,subject,message) VALUES('{$name}','{$email}','{$subject}','{$message}')";
    $issubmit=mysqli_query($dbcon,$insertQuery);
    if($issubmit){
        $message= 'contact message insert succesful';
    }else{
        $message= 'insert failed';
    }
    header("Location:../index.php?msg={$message}");

   }
}


// contact message delete 




?>