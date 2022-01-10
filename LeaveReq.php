<?php
class LeaveReq
{
    // dbection
    private $db;
    // Table
    private $db_table = "leave_req";
    // Columns
    public $id;
    public $name;
    public $roll_no;
    public $level;
    public $leave_date;
    public $status;
    public $req_reason;
    public $acc_rej_reason;


    // Db dbection
    public function __construct($db)
    {
        $this->db = $db;
    }

    // GET ALL
    public function getLeaveReq()
    {
        $sqlQuery = "SELECT id, name, roll_no, level, leave_date, status, req_reason, acc_rej_reason  FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

    // CREATE
    public function createLeaveReq()
    {
        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->roll_no = htmlspecialchars(strip_tags($this->roll_no));
        $this->level = htmlspecialchars(strip_tags($this->level));
        // $this->leave_date = htmlspecialchars(strip_tags($this->leave_date));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->req_reason = htmlspecialchars(strip_tags($this->req_reason));
        $this->acc_rej_reason = htmlspecialchars(strip_tags($this->acc_rej_reason));

        $sqlQuery = "INSERT INTO
    " . $this->db_table . " SET name = '" . $this->name . "', roll_no = '" . $this->roll_no . "', 
    level = '" . $this->level . "', leave_date = '" . $this->leave_date . "', status = '" . $this->status . "', 
    req_reason = '" . $this->req_reason . "', acc_rej_reason = '" . $this->acc_rej_reason . "'";
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // GetSingleData
    public function getSingleLeaveReq()
    {
        $sqlQuery = "SELECT id, name, roll_no, level, leave_date, status, req_reason, acc_rej_reason FROM
        " . $this->db_table . " WHERE id = " . $this->id;
        $record = $this->db->query($sqlQuery);
        $dataRow = $record->fetch_assoc();
        $this->name = $dataRow['name'];
        $this->roll_no = $dataRow['roll_no'];
        $this->level = $dataRow['level'];
        $this->leave_date = $dataRow['leave_date'];
        $this->status = $dataRow['status'];
        $this->req_reason = $dataRow['req_reason'];
        $this->acc_rej_reason = $dataRow['acc_rej_reason'];
    }

    // UPDATE
    public function updateLeaveReq()
    {
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->roll_no = htmlspecialchars(strip_tags($this->roll_no));
        $this->level = htmlspecialchars(strip_tags($this->level));
        $this->leave_date = htmlspecialchars(strip_tags($this->leave_date));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->req_reason = htmlspecialchars(strip_tags($this->req_reason));
        $this->acc_rej_reason = htmlspecialchars(strip_tags($this->acc_rej_reason));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $sqlQuery = "UPDATE " . $this->db_table . " SET name = '" . $this->name . "', roll_no = '" . $this->roll_no . "', 
        level = '" . $this->level . "', leave_date = '" . $this->leave_date . "', status = '" . $this->status . "', 
        req_reason = '" . $this->req_reason . "', acc_rej_reason = '" . $this->acc_rej_reason . "'
        WHERE id = " . $this->id;
        echo ("$sqlQuery");

        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // DELETE
    function deleteLeaveReq()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
}
