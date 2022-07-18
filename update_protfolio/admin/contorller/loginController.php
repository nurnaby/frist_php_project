<?php
require 'bdconfig.php';
// forgot button check 
if(isset($_POST['resetPassword'])){
    $email = $_POST['email'];
    $selectQuery= "SELECT * FROM admins WHERE email = '{$email}'";
    $emailQueryResult=mysqli_query($dbcon,$selectQuery);
    if($emailQueryResult){
        if(mysqli_num_rows($emailQueryResult)>0){
            $token = rand(999999,111111);
            $updateQuery= "UPDATE admins set 	token='{$token}' WHERE email = '{$email}' "; 
            $udateQueryResult = mysqli_query($dbcon,$updateQuery);
            if($udateQueryResult){
                $subject= 'Email verifycation code';
                $massage= "our varifycation cond is $token";
                $sander= "Form: amir.hamza251192@gmail.com";
                if(mail($email,$subject,$massage,$sander)){
                    header("Location:../verifyEmail.php");

                }

            }

        }
    }
}
?>