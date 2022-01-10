<?php
class Notice
{
    // dbection
    private $db;
    // Table
    private $db_table = "notice";
    // Columns
    public $id;
    public $notice_title;
    public $notice_message;
    public $notice_created;


    // Db dbection
    public function __construct($db)
    {
        $this->db = $db;
    }

    // GET ALL
    public function getNotices()
    {
        $sqlQuery = "SELECT id, notice_title, notice_message, notice_created FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

    // CREATE
    public function createNotices()
    {
        // sanitize
        $this->notice_title = htmlspecialchars(strip_tags($this->notice_title));
        $this->notice_message = htmlspecialchars(strip_tags($this->notice_message));
        // $this->notice_created=htmlspecialchars(strip_tags($this->notice_created));    , notice_created = '".$this->notice_created."'
        $sqlQuery = "INSERT INTO
" . $this->db_table . " SET notice_title = '" . $this->notice_title . "', notice_message = '" . $this->notice_message . "'";
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // UPDATE
    public function getSingleNotice()
    {
        $sqlQuery = "SELECT id, notice_title, notice_message, notice_created FROM
" . $this->db_table . " WHERE id = " . $this->id;
        $record = $this->db->query($sqlQuery);
        $dataRow = $record->fetch_assoc();
        $this->notice_title = $dataRow['notice_title'];
        $this->notice_message = $dataRow['notice_message'];
        $this->notice_created = $dataRow['notice_created'];
    }

    // UPDATE
    public function updateNotice()
    {
        $this->notice_title = htmlspecialchars(strip_tags($this->notice_title));
        $this->notice_message = htmlspecialchars(strip_tags($this->notice_message));
        $this->notice_created = htmlspecialchars(strip_tags($this->notice_created));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $sqlQuery = "UPDATE " . $this->db_table . " SET notice_title = '" . $this->notice_title . "',
notice_message = '" . $this->notice_message . "' , notice_created = '" . $this->notice_created . "'
WHERE id = " . $this->id;
        echo ("$sqlQuery");

        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // DELETE
    function deleteNotice()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
}
