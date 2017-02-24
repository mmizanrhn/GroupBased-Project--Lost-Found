<?php

include_once("../allinclude.php");
// create Object of item Class
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
