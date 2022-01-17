<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../FeesReq.php';
$database = new Database();

$db = $database->getConnection();
$items = new FeesReq($db);
$records = $items->getFeesReq();
$itemCount = $records->num_rows;
// echo json_encode($itemCount);
if ($itemCount > 0) {
    $feesArr = array();
    $feesArr["body"] = array();
    $feesArr["itemCount"] = $itemCount;
    while ($row = $records->fetch_assoc()) {
        array_push($feesArr["body"], $row);
    }
    echo json_encode($feesArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
