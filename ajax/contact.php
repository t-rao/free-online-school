<?php
    if(isset($_POST['name'], $_POST['email'])){
        
        $name = $_POST['name'];
        $email= $_POST['email'];

        $to ='kent.shikano@gmail.com';
        
        $subject = 'Form Submission';
        $message = "Name: ". $name . "\n" . "Email: ".$email;
        $headers = "From: ". $email;


        if(mail($to, $subject, $message, $headers)){
            echo "1" ;
        }
        else{
            echo "0";
        }
       
    }
?>