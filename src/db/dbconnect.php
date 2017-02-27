<?php

//namespace LF\db;


 include_once("dbconfig.php");

 $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

try
{
    $DB_con = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."",DB_USER,DB_PASS);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}

?>
