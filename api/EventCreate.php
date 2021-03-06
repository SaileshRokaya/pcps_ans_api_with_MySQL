<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../events.php';
$database = new Database();
$db = $database->getConnection();
$item = new Event($db);


$item->event_title = $_POST['event_title'];
$item->event_message = $_POST['event_message'];
// $item->event_created = $_POST['event_created'];
if ($item->createEvents()) {
    echo 'Event created successfully.';
} else {
    echo 'Event could not be created.';
}
