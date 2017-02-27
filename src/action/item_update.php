<?php
session_start();
include_once('../../vendor/autoload.php');
use LF\db\db;
use LF\allclassfile\item;

if(!isset($_SESSION['login']) AND empty($_SESSION['login'])){

    header("Location:index.php");
}


$DB_con= db::connect();
$item = new item($DB_con);
//var_dump($_POST);
$update= $item->updateItem($_POST);


    if ($update == "true") {

        header("Location:../../all_item.php?mess=update");

    } else {
        $query = http_build_query(array('error' => $update));
        $id=$_POST['item_id'];
        header("Location:../../insert_item.php?edit_item=$id&$query");
    }




?>
