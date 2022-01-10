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
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->getSingleEvent();
if ($item->event_title != null) {

    // create array
    $evn_arr = array(
        "id" => $item->id,
        "event_title" => $item->event_title,
        "event_message" => $item->event_message,
        "event_created" => $item->event_created
    );

    http_response_code(200);
    echo json_encode($evn_arr);
} else {
    http_response_code(404);
    echo json_encode("Event not found.");
}
