<?php

namespace LF\allclassfile;

class user
{
    private $db;
    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    function verificationCode($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++)
        {
            $randomString .= $characters[rand(8, $charactersLength - 1)];
        }
        return $randomString;
    }

function userRegistration($data)
{

    if(isset($data['submit']) && !empty($data['submit'])) {
        $errors =[];
        if(!empty($data['user_name'])){

            $user_name = htmlspecialchars($data['user_name']);
        }else{

            $errors[] = "Please Put Your Name";
        }


        if(!empty($data['user_email'])){
            $user_email = htmlspecialchars($data['user_email']);
            $query = "SELECT * FROM user_profile WHERE user_email = :user_email";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":user_email", $user_email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                $errors[] = "This Email is already in use.";

            } else{

                $user_email = htmlspecialchars($data['user_email']);
            }

        }else{

            $errors[] = "Please Put Your Email";
        }

        if(!empty($data['user_pass'])){

            if($data['user_pass'] == $data['user_confirm_pass']){
                $user_pass = $data['user_pass'];

            }else{
                $errors[] = "Password Not Match";
            }
        }else{

            $errors[] = "Please give password";
        }

        //$user_confirm_pass = $_POST['user_confirm_pass'];
        $user_code = $this->verificationCode(10);

        $mass='';

        if(!$errors) {

            try {
                $query = "INSERT INTO user_profile
              (user_name,user_pass,user_email,user_code)
              VALUES(:user_name,:user_pass,:user_email,:user_code)";

                $stmt = $this->db->prepare($query);

                $stmt->bindParam(":user_name", $user_name);
                $stmt->bindParam(":user_pass", $user_pass);
                $stmt->bindParam(":user_email", $user_email);
                $stmt->bindParam(":user_code", $user_code);
                $stmt->execute();

if($stmt->execute()) {

   /* $message = "Your Activation Code is " . $user_code . "";
    $to = "mdarman780@gmail.com";
    $subject = "Activation Code For LostAndFound.com";
    $from = 'mdarman780@gmail.com';
    $body = 'Your Activation Code is ' . $user_code . ' Please Click On This link <a href="verification.php">Verify.php?email=' . $user_email . '&code=' . $user_code . '</a>to activate  your account.';
    $headers = "From:" . $from;
    mail($to, $subject, $body, $headers);*/
   //header("Location:verify.php?verifyCode=$user_code");
    return true;
}
               //

            }catch (\PDOException $e){
                $e->getMessage();
            }

        }else{

            return $errors;
        }

    }
}


    function signIn(){

        $error =[];

        if(isset($_POST['log']) && !empty($_POST['log'])) {

            if (empty($_POST['user_email'])) {
                $error[] = "Your Email Field Empty";
            } else {
                $user_email = $_POST['user_email'];
            }

            if (empty($_POST['user_pass'])) {
                $error[] = "Your Password Field Empty";
            } else {
                $user_pass = $_POST['user_pass'];
            }


            if (!$error) {

                $query = "SELECT * FROM user_profile WHERE user_email = :user_email AND user_pass = :user_pass";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(":user_email", $user_email);
                $stmt->bindParam(":user_pass", $user_pass);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                    return $row;
                } else {
                    $error[] = "SORRY... YOU ENTERD WRONG USEREMAIL AND PASSWORD... PLEASE RETRY...";
                }
            }
            return $error;
        }
    }


    function profileData($data)
    {

        if (!empty($data['user_id'])) {
            $user_id = $data['user_id'];
        }

        $query = 'SELECT * FROM user_profile WHERE id=' . $user_id;

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $user = [];

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $row;
        } else {
            return "No Data Available In User Table";
        }
    }


    function profileUpdate($data){

        if(isset($data['submit']) && !empty($data['submit'])) {
            $error = [];

            $id = $data['user_id'];

            if (!empty($data['user_name'])) {
                $user_name = htmlspecialchars($data['user_name']);
            } else {
                $error[] = "You Can't Emtpy Name Field";
            }

            if (!empty($data['user_email'])) {
                $user_email = $data['user_email'];
            }
            if (!empty($data['user_number'])) {

                $user_number = $data['user_number'];
            } else {
                $error[] = "You Must Enter Your Mobile Number";
            }


            if (!empty($data['user_address'])) {
                $user_address = htmlspecialchars($data['user_address']);
            } else {
                $error[] = "You Must Enter Your Full Address Details";
            }


            $user_country = $data['user_country'];

            $user_dob = htmlspecialchars($data['user_dob']);

            if (!empty($data['user_address'])) {
                $user_des = htmlspecialchars($data['user_des']);
            }else{
                $user_des ="";
            }

            if (!empty($data['user_img'])) {

                $user_img = $data['user_img'];

            }else{
                $user_img = "";
            }


            if ($_FILES['user_img']['name']){

                $picture_tmp = $_FILES['user_img']['tmp_name'];
                $picture_name = $_FILES['user_img']['name'];
                $picture_type = $_FILES['user_img']['type'];

                $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');

                $final_pic_name = $id . $picture_name;

                if (in_array($picture_type, $allowed_type)) {
                    $path = '../../profileimg/' . $final_pic_name; //change this to your liking

                    unlink('../../profileimg/' . $final_pic_name);

                    move_uploaded_file($picture_tmp,$path);
                } else {
                    $error[] = 'File type not allowed';
                }

            }else {

                $final_pic_name=  $user_img;

            }



            if (!empty($error)) {
                //header("Location:../profile_form.php?user_id=$id&error=$error");
                return $error;

            } else if (empty($error)) {

                try {
                    $query = "UPDATE user_profile SET user_name=:user_name, user_email=:user_email, user_number=:user_number, 
            user_address=:user_address,user_country=:user_country,user_dob=:user_dob, user_des=:user_des, user_img=:final_pic_name WHERE id=" . $id;

                    $stmt = $this->db->prepare($query);

                    $stmt->bindParam(":user_name", $user_name);
                    $stmt->bindParam(":user_email", $user_email);
                    $stmt->bindParam(":user_number", $user_number);
                    $stmt->bindParam(":user_address", $user_address);
                    $stmt->bindParam(":user_country", $user_country);
                    $stmt->bindParam(":user_dob", $user_dob);
                    $stmt->bindParam(":user_des", $user_des);
                    $stmt->bindParam(":final_pic_name", $final_pic_name);

                    $stmt->execute();
                    return true;
                }catch (\PDOException $e){
                    $e->getMessage();
                }
}


            }
        }


}



?>