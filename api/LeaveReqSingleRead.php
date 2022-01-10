<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../LeaveReq.php';
$database = new Database();
$db = $database->getConnection();
$item = new LeaveReq($db);
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->getSingleLeaveReq();
if ($item->name != null) {

    // create array
    $leave_arr = array(
        "id" => $item->id,
        "name" => $item->name,
        "roll_no" => $item->roll_no,
        "level" => $item->level,
        "leave_date" => $item->leave_date,
        "status" => $item->status,
        "req_reason" => $item->req_reason,
        "acc_rej_reason" => $item->acc_rej_reason
    );

    http_response_code(200);
    echo json_encode($leave_arr);
} else {
    http_response_code(404);
    echo json_encode("data not found.");
}
