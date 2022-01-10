<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../notice.php';
$database = new Database();
$db = $database->getConnection();
$item = new Notice($db);
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->getSingleNotice();
if ($item->notice_title != null) {

    // create array
    $notic_arr = array(
        "id" => $item->id,
        "notice_title" => $item->notice_title,
        "notice_message" => $item->notice_message,
        "notice_created" => $item->notice_created
    );

    http_response_code(200);
    echo json_encode($notic_arr);
} else {
    http_response_code(404);
    echo json_encode("Notice not found.");
}
