<?php
    // this is where the secret key goes to refer to it later
    define('SECRET_KEY','put secret key here');


    if($_POST){
        function getCaptcha($token){
            //get a response from google about whether the input is human or bot, based on a scoring system.
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$token}");
            $output = json_decode($response);
            return $output;
        }
        //call the function and assign the return value to a variable
        $output = getCaptcha($_POST['token']);
        // if curious you can call var_dump to see the contents of the JSON returned by google

        if($output->success != true){
          //activate the fail function if AJAX if captcha failed
          http_response_code(500);


        }
        else{
          //if captcha is ok then send success code to activate success ajax function
          http_response_code(200);
          echo 'Captcha deemed that input to be humanesque';
        }
    }
?>