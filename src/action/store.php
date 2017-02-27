<?php
include_once('../../vendor/autoload.php');
use LF\db\db;
use LF\allclassfile\item;



$DB_con= db::connect();
var_dump($DB_con);

$insert_item = new item($DB_con);

$return= $insert_item->store($_POST);

if ($return == "true") {
    header("Location:../../all_item.php?mess=success");
} else {
    $query = http_build_query(array('error' => $return));
    header("Location:../../insert_item.php?$query");

}





?>
