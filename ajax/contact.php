<?php
    // if(isset($_POST['name'], $_POST['email'])){

        // $name = $_POST['name'];
        // $email= $_POST['email'];


        // if (empty($_POST["name"])) {
        //     // $nameError = "Name is required";
        //     echo "Name is required";
        //     } else {
        //     $name = $_POST["name"];
        //     // check name only contains letters and whitespace
        //     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        //     // $nameError = "Only letters and white space allowed";
        //     echo "Only letters and white space allowed";
        //     }
        //     }


        //     if (empty($_POST["email"])) {
        //     // $emailError = "Email is required";
        //     echo "Email is required";
        //     } else {
        //     $email = $_POST["email"];
        //     // check if e-mail address syntax is valid or not
        //     if (!preg_match("/([w-]+@[w-]+.[w-]+)/",$email)) {
        //     // $emailError = "Invalid email format";
        //     echo "Invalid email format";

        //     }
        // }

        // $to ='kent.shikano@gmail.com';
    //     $to ='trivikram244@gmail.com';
    //
    //
    //     $subject = 'お問い合わせがありました。「大富豪の学校」';
    //     $message = "お名前: ". $name . "\n" . "Email: ".$email;
    //     $headers = "メールアドレス: ". $email;
    //
    //
    //     if(mail($to, $subject, $message, $headers)){
    //         echo "1" ;
    //     }
    //     else{
    //         echo "0";
    //     }
    //
    // }


    // Only process POST reqeusts.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the form fields and remove whitespace.
            $name = strip_tags(trim($_POST["name"]));
    				$name = str_replace(array("\r","\n"),array(" "," "),$name);
            $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
            // $message = trim($_POST["message"]);

            // Check that data was sent to the mailer.
            if ( empty($name)  OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Set a 400 (bad request) response code and exit.
                http_response_code(400);
                echo "Oops! There was a problem with your submission. Please complete the form and try again.";
                exit;
            }

            // Set the recipient email address.
            // FIXME: Update this to your desired email address.kent.shikano@gmail.com
            $recipient = "sample@sample.com";

            // Set the email subject.
            $subject = "お問い合わせがありました。「大富豪の学校";

            // Build the email content.
            $email_content = "お名前: $name\n";
            $email_content .= "Email: $email\n\n";

            // Build the email headers.
            $email_headers = "メールアドレス: $name <$email>";

            // Send the email.
            if (mail($recipient, $subject, $email_content, $email_headers)) {
                // Set a 200 (okay) response code.
                http_response_code(200);
                echo "Thank You! Your message has been sent.";
            } else {
                // Set a 500 (internal server error) response code.
                http_response_code(500);
                echo "Oops! Something went wrong and we couldn't send your message.";
            }

        } else {
            // Not a POST request, set a 403 (forbidden) response code.
            http_response_code(403);
            echo "There was a problem with your submission, please try again.";
        }











?>
