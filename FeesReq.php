<?php
class FeesReq
{
    // dbection
    private $db;
    // Table
    private $db_table = "fees_req";
    // Columns
    public $id;
    public $name;
    public $roll_no;
    public $level;
    public $fees_date;
    public $status;
    public $req_reason;
    public $acc_rej_reason;
    public $course;


    // Db dbection
    public function __construct($db)
    {
        $this->db = $db;
    }

    // GET ALL
    public function getFeesReq()
    {
        $sqlQuery = "SELECT id, name, roll_no, level, fees_date, status, req_reason, acc_rej_reason, course  FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

    // CREATE
    public function createFeesReq()
    {
        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->roll_no = htmlspecialchars(strip_tags($this->roll_no));
        $this->level = htmlspecialchars(strip_tags($this->level));
        // $this->fees_date = htmlspecialchars(strip_tags($this->fees_date));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->req_reason = htmlspecialchars(strip_tags($this->req_reason));
        $this->acc_rej_reason = htmlspecialchars(strip_tags($this->acc_rej_reason));
        $this->course = htmlspecialchars(strip_tags($this->course));

        $sqlQuery = "INSERT INTO
    " . $this->db_table . " SET name = '" . $this->name . "', roll_no = '" . $this->roll_no . "', 
    level = '" . $this->level . "', fees_date = '" . $this->fees_date . "', status = '" . $this->status . "', 
    req_reason = '" . $this->req_reason . "', acc_rej_reason = '" . $this->acc_rej_reason . "', course = '" . $this->course . "'";
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // GetSingleData
    public function getSingleFeesReq()
    {
        $sqlQuery = "SELECT id, name, roll_no, level, fees_date, status, req_reason, acc_rej_reason FROM
        " . $this->db_table . " WHERE id = " . $this->id;
        $record = $this->db->query($sqlQuery);
        $dataRow = $record->fetch_assoc();
        $this->name = $dataRow['name'];
        $this->roll_no = $dataRow['roll_no'];
        $this->level = $dataRow['level'];
        $this->fees_date = $dataRow['fees_date'];
        $this->status = $dataRow['status'];
        $this->req_reason = $dataRow['req_reason'];
        $this->acc_rej_reason = $dataRow['acc_rej_reason'];
        $this->course = $dataRow['course'];
    }


    // // GetSingleDataByAccept
    // public function getSingleFeesReqByStatus()
    // {
    //     $this->status='Reject';
    //     // $sqlQuery = "SELECT id, name, roll_no, level, fees_date, status, req_reason, acc_rej_reason, course FROM
    //     // " . $this->db_table . " WHERE status = '". $this->status."'";
        
    //     // $record = $this->db->query($sqlQuery);
    //     // $dataRow = $record->fetch_assoc();
    //     // $this->name = $dataRow['name'];
    //     // $this->roll_no = $dataRow['roll_no'];
    //     // $this->level = $dataRow['level'];
    //     // $this->fees_date = $dataRow['fees_date'];
    //     // $this->status = $dataRow['status'];
    //     // $this->req_reason = $dataRow['req_reason'];
    //     // $this->acc_rej_reason = $dataRow['acc_rej_reason'];
    //     // $this->course = $dataRow['course'];

    //     $sqlQuery = "SELECT id, name, roll_no, level, fees_date, status, req_reason, acc_rej_reason, course  FROM " . $this->db_table . " WHERE status = '". $this->status."'";
    //     $this->result = $this->db->query($sqlQuery);
    //     echo $sqlQuery.'<br>';
    //     $record = $this->db->query($sqlQuery);
    //     $dataRow = $record->fetch_assoc();
    //     $this->name = $dataRow['name'];
    //     $this->roll_no = $dataRow['roll_no'];
    //     $this->level = $dataRow['level'];
    //     $this->fees_date = $dataRow['fees_date'];
    //     $this->status = $dataRow['status'];
    //     $this->req_reason = $dataRow['req_reason'];
    //     $this->acc_rej_reason = $dataRow['acc_rej_reason'];
    //     $this->course = $dataRow['course'];
    //     return $this->result;
    // }


    // UPDATE
    public function updateFeesReq()
    {
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->roll_no = htmlspecialchars(strip_tags($this->roll_no));
        $this->level = htmlspecialchars(strip_tags($this->level));
        $this->fees_date = htmlspecialchars(strip_tags($this->fees_date));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->req_reason = htmlspecialchars(strip_tags($this->req_reason));
        $this->acc_rej_reason = htmlspecialchars(strip_tags($this->acc_rej_reason));
        $this->course = htmlspecialchars(strip_tags($this->course));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $sqlQuery = "UPDATE " . $this->db_table . " SET name = '" . $this->name . "', roll_no = '" . $this->roll_no . "', 
        level = '" . $this->level . "', fees_date = '" . $this->fees_date . "', status = '" . $this->status . "', 
        req_reason = '" . $this->req_reason . "', acc_rej_reason = '" . $this->acc_rej_reason . "', course = '" . $this->course . "'
        WHERE id = " . $this->id;
        echo ("$sqlQuery");

        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // UPDATE
    public function Accept()
    {
        $this->statusAccept='Reject';
        $this->status = htmlspecialchars(strip_tags($this->status));
        
        $this->id = htmlspecialchars(strip_tags($this->id));

        $sqlQuery = "UPDATE " . $this->db_table . " SET  status = '" . $this->statusAccept . "'
        WHERE id = " . $this->id;
        echo ("$sqlQuery");

        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // DELETE
    function deleteFeesReq()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
}
