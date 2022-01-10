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


$item->notice_title = $_POST['notice_title'];
$item->notice_message = $_POST['notice_message'];
// $item->notice_created = $_POST['notice_created'];
if ($item->createNotices()) {
    echo 'Notice created successfully.';
} else {
    echo 'Notice could not be created.';
}
