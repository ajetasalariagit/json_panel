<?php 
require_once __DIR__ . "/vendor/autoload.php";
$database = new MongoDB\Client("mongodb://localhost:27017");
$db = $database->json_task;
$collection = $db->corp_comp;

?>