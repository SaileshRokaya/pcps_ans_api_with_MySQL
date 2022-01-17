<?php
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// include_once '../database.php';
// include_once '../LeaveReq.php';
// $database = new Database();

// $db = $database->getConnection();
// $items = new LeaveReq($db);
// $records = $items->getSingleLeaveReqByStatus();
// $itemCount = $records->num_rows;
// // echo json_encode($itemCount);
// if ($itemCount > 0) {
//     $leaveArr = array();
//     $leaveArr["body"] = array();
//     $leaveArr["itemCount"] = $itemCount;
//     while ($row = $records->fetch_assoc()) {
//         array_push($leaveArr["body"], $row);
//     }
//     echo json_encode($leaveArr);
// } else {
//     http_response_code(404);
//     echo json_encode(
//         array("message" => "No record found.")
//     );
// }
?>