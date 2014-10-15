<?php

$buyer_name = $_REQUEST['buyer_name'];
$type_name = $_REQUEST['type_name'];
$spicyness = $_REQUEST['spicyness'];

$user = "developer";
$password = "123456";
$host = "localhost";
$db_name = "php01";

$db_connection = mysqli_connect($host, $user, $password, $db_name);

$sql = <<<SQL
INSERT INTO orders (buyer_name, type_name, spicyness, date_created, last_updated)
VALUES('$buyer_name', '$type_name', '$spicyness', now(), now());
SQL;

if (!$result = mysqli_query($db_connection, $sql)) {
    die('There was an error running the query [' . mysqli_error($db_connection) . ']');
}

header('Location: http://localhost/PHP01/index.php');

