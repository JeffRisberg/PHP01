<?php

$buyer_name = $_REQUEST['buyer_name'];
$type_name = $_REQUEST['type_name'];

$user = "developer";
$password = "123456";
$host = "localhost";
$db_name = "php01";

$db = new mysqli($host, $user, $password, $db_name);

if (!$result = $db->query(
    "insert into orders (buyer_name, type_name, date_created, last_updated) " .
    "values('" . $buyer_name . "', '" . $type_name . "', now(), now())")
) {
    die('There was an error running the query [' . $db->error . ']');
}

header('Location: http://localhost/PHP01/index.php');
