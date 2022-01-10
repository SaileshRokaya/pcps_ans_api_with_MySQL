<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../events.php';
$database = new Database();

$db = $database->getConnection();
$items = new Event($db);
$records = $items->getEvents();
$itemCount = $records->num_rows;
// echo json_encode($itemCount);
if ($itemCount > 0) {
    $eventArr = array();
    $eventArr["body"] = array();
    $eventArr["itemCount"] = $itemCount;
    while ($row = $records->fetch_assoc()) {
        array_push($eventArr["body"], $row);
    }
    echo json_encode($eventArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
