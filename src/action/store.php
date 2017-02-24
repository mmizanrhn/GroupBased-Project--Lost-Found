<?php
include_once("../allinclude.php");
// create Object of item Class
$insert_item = new item($DB_con);

$return= $insert_item->store($_POST);

if ($return == "true") {
    header("Location:../../all_item.php?mess=success");
} else {
    $query = http_build_query(array('error' => $return));
    header("Location:../../insert_item.php?$query");

}





?>
