<?php
include_once('../../vendor/autoload.php');
use LF\db\db;
use LF\allclassfile\item;

// include_once("../allinclude.php");
$DB_con= db::connect();
$item = new item($DB_con);

if(array_key_exists('dl_id',$_GET)) {

    $delete_item = $item->deleteItem($_GET);

}
if($delete_item == "true"){
    header("Location:../../all_item.php?mess=delete");
}else{
    echo "Something Wrong ! Please Try Again";
    die();
}
?>