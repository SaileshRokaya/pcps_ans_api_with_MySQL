<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../notice.php';
$database = new Database();

$db = $database->getConnection();
$items = new Notice($db);
$records = $items->getNotices();
$itemCount = $records->num_rows;
// echo json_encode($itemCount);
if ($itemCount > 0) {
    $noticeArr = array();
    $noticeArr["body"] = array();
    $noticeArr["itemCount"] = $itemCount;
    while ($row = $records->fetch_assoc()) {
        array_push($noticeArr["body"], $row);
    }
    echo json_encode($noticeArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
