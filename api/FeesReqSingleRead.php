<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../FeesReq.php';
$database = new Database();
$db = $database->getConnection();
$item = new FeesReq($db);
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->getSingleFeesReq();
if ($item->name != null) {

    // create array
    $fees_arr = array(
        "id" => $item->id,
        "name" => $item->name,
        "roll_no" => $item->roll_no,
        "level" => $item->level,
        "fees_date" => $item->fees_date,
        "status" => $item->status,
        "req_reason" => $item->req_reason,
        "acc_rej_reason" => $item->acc_rej_reason,
        "course" => $item->course
    );

    http_response_code(200);
    echo json_encode($fees_arr);
} else {
    http_response_code(404);
    echo json_encode("data not found.");
}
