<?php
class Event{
// dbection
private $db;
// Table
private $db_table = "events";
// Columns
public $id;
public $event_title;
public $event_message;
public $event_created;


// Db dbection
public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getEvents(){
$sqlQuery = "SELECT id, event_title, event_message, event_created FROM " . $this->db_table . "";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createEvents(){
// sanitize
$this->event_title=htmlspecialchars(strip_tags($this->event_title));
$this->event_message=htmlspecialchars(strip_tags($this->event_message));
// $this->event_created=htmlspecialchars(strip_tags($this->event_created));    , event_created = '".$this->event_created."'
$sqlQuery = "INSERT INTO
". $this->db_table ." SET event_title = '".$this->event_title."', event_message = '".$this->event_message."'";
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// UPDATE
public function getSingleEvent(){
$sqlQuery = "SELECT id, event_title, event_message, event_created FROM
". $this->db_table ." WHERE id = ".$this->id;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->event_title = $dataRow['event_title'];
$this->event_message = $dataRow['event_message'];
$this->event_created = $dataRow['event_created'];
}

// UPDATE
public function updateEvent(){
$this->event_title=htmlspecialchars(strip_tags($this->event_title));
$this->event_message=htmlspecialchars(strip_tags($this->event_message));
$this->event_created=htmlspecialchars(strip_tags($this->event_created));
$this->id=htmlspecialchars(strip_tags($this->id));

$sqlQuery = "UPDATE ". $this->db_table ." SET event_title = '".$this->event_title."',
event_message = '".$this->event_message."' , event_created = '".$this->event_created."'
WHERE id = ".$this->id;
echo("$sqlQuery");

$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteEvent(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>