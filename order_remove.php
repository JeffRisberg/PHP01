<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 10/14/2014
 * Time: 4:51 PM
 */

$order_id=$_REQUEST['order_id'];

$user = "developer";
$password = "123456";
$host = "localhost";
$db_name = "php01";

$db_connection = mysqli_connect($host, $user, $password, $db_name);

$sql = <<<SQL
DELETE FROM orders
WHERE order_id='$order_id';
SQL;

if (!$result = mysqli_query($db_connection, $sql)) {
    die('There was an error running the query [' . mysqli_error($db_connection) . ']');
}

header('Location: http://localhost/PHP01/index.php');