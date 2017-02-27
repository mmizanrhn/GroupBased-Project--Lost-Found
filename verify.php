<?php
session_start();
include_once('vendor/autoload.php');
use LF\db\db;
use LF\allclassfile\user;
use LF\allclassfile\verification;

/*include_once("src/allinclude.php");*/
$DB_con= db::connect();
$user = new user($DB_con);

$verifyCode = new verification($DB_con);

if(isset($_POST['submit'])) {

    $reg = $user->userRegistration($_POST);
}

if(array_key_exists("verifyCode",$_GET)AND isset($_GET["verifyCod"])) {
    $activeCode = $_GET["verifyCode"];
}

if(array_key_exists("code",$_GET)AND isset($_GET["code"])) {
    $user_code = $_GET["code"];
}

include_once('header.php');

if ($reg == "true") {

    echo '<div class="modal-body">
                <div class="modal-content">
                    <div class="modal-header">
                        
                    </div>

 <div class="alert alert-success center-block" role="alert"><h3>You Have Successfully Registration Lostandfound.com Please Login Your Account  <a href="login.php"> Click Here </a></h3></div>
 </div>
 </div> ';

}else {
    $error = http_build_query(array('error' => $reg));
    header("Location:login.php?$error");
}




include_once("footer.php");



?>