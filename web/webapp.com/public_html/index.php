<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 4/23/2016
 * Time: 1:50 AM
 */
include_once "./classes/db.php";
$db = new db();
$mysqli = $db->connect();
$mysqli->set_charset("utf8");
$query = "SELECT msg FROM db_1.tbl;";
$result = $mysqli->query($query);
$tbody = "";
$i = 0;
while ($row = $result->fetch_array(MYSQLI_BOTH)){
    $tbody .= $row[$i];
    $i++;
}

/* free result set */
$result->free();

/* Close connection */
$mysqli -> close();

/* Output */
$page = file_get_contents('./tpl/index.tpl');
$page = str_replace("{DBRESULT}", $tbody, $page);
echo $page;


?>