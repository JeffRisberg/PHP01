<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 10/14/2014
 * Time: 4:27 PM
 */

$order_id='1';
$buyer_name = $_REQUEST['buyer_name'];
$type_name = $_REQUEST['type_name'];
$spicyness = $_REQUEST['spicyness'];

$user = "developer";
$password = "123456";
$host = "localhost";
$db_name = "php01";

$db_connection = mysqli_connect($host, $user, $password, $db_name);

$sql = <<<SQL
UPDATE orders
SET buyer_name='$buyer_name', type_name='$type_name' spicyness='$spicyness';
SQL;

if (!$result = mysqli_query($db_connection, $sql)) {
    die('There was an error running the query [' . mysqli_error($db_connection) . ']');
}

header('Location: http://localhost/PHP01/index.php');