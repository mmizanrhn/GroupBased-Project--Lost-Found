<?php
include_once('../../vendor/autoload.php');
use LF\db\db;
use LF\allclassfile\user;



$DB_con= db::connect();


$user = new user($DB_con);

$update= $user->profileUpdate($_POST);

    if ($update == "true") {

        $id= $_POST['user_id'];

        header("Location:../../profile_setting.php?user_id=$id&mess=success");

    } else {

        $query = http_build_query(array('error' => $update));
        $id= $_POST['user_id'];

        header("Location:../../profile_setting.php?user_id=$id&$query");
    }












//var_dump($result);
//}


?>
