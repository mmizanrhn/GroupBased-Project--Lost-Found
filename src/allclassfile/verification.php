<?php
namespace LF\allclassfile;

class verification
{

// generate Random Key for Item
    function verificationCode($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(8, $charactersLength - 1)];
        }
        return $randomString;
    }



    function activeAccount($email,$user_email){

        $code=$this->verificationCode(15);

        $message = "Your Activation Code is ".$code."";
        $to=$email;
        $subject="Activation Code For LostAndFound.com";
        $from = 'mdarman780@gmail.com';
        $body='Your Activation Code is '.$code.' Please Click On This link <a href="verification.php">Verify.php?email='.$user_email.'&code='.$code.'</a>to activate  your account.';
        $headers = "From:".$from;
        mail($to,$subject,$body,$headers);

        echo "An Activation Code Is Sent To You Check You Emails";

    }

}