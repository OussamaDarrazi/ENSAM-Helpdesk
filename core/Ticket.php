<?php
class Ticket{
    public $id;
    public $owner_id;
    public $assigned_helpdesk_id;
    public DateTime $created_at;
    public DateTime $last_updated_at;
    public $subject;
    public $category_id;
    public $category;
    public $status_id;
    public $status;
    public $helpdesk_name;
    public $owner_name;
    public $db;
    public function __construct( $owner_id, $assigned_helpdesk_id, $created_at, $last_updated_at, $subject, $category_id, $status_id, $id=null) {
        $this->db = HelpdeskDatabase::getInstance();
        $this->id = $id;
        $this->owner_id = $owner_id;
        $this->assigned_helpdesk_id = $assigned_helpdesk_id;
        $this->created_at = $created_at;
        $this->last_updated_at = $last_updated_at;
        $this->subject = $subject;
        $this->category_id = $category_id;
        $this->status_id = $status_id;
        $this->category = $this->db->executeDQL("select category_name from ticket_category where category_id = $this->category_id")[0]["category_name"];
        $this->status = $this->db->executeDQL("select status_name from ticket_status where status_id = $this->status_id")[0]["status_name"];
        //getting the names
        $hd = $this->db->executeDQL("SELECT first_name, last_name from employe where employe_id = ?", [$this->assigned_helpdesk_id]);
        $this->helpdesk_name = $hd? $hd[0]["first_name"] . " " . $hd[0]["last_name"] : "";
        $owner = $this->db->executeDQL("SELECT first_name, last_name from employe where employe_id = ?", [$this->owner_id]);
        $this->owner_name = $owner? $owner[0]["first_name"] . " " . $owner[0]["last_name"] : "";
    }
    public function save() {
        if ($this->id === null) {
            // Insert new ticket
            $sql = "INSERT INTO ticket (created_by, assigned_to, created_at,  subject, category_id, status_id) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $params = [
                $this->owner_id,
                $this->assigned_helpdesk_id,
                $this->created_at->format('Y-m-d H:i:s'),
                $this->subject,
                $this->category_id,
                $this->status_id
            ];
            if($this->db->executeDML($sql, $params)){
                //Retirieving the id
                $sql = "SELECT ticket_id FROM ticket WHERE created_by=? AND created_at=? AND subject=? AND category_id=? AND status_id=?";
                $params = [
                    $this->owner_id,
                    $this->created_at->format('Y-m-d H:i:s'),
                    $this->subject,
                    $this->category_id,
                    $this->status_id
                ];
                //UPDATING the statics
               $this->id = $this->db->executeDQL($sql, $params)[0]["ticket_id"];
            }
            
        } else {
            // Update existing ticket
            $sql = "UPDATE ticket SET created_by = ?, assigned_to = ?, created_at = ?, 
                    subject = ?, category_id = ?, status_id = ? WHERE ticket_id = ?";
            $params = [
                $this->owner_id,
                $this->assigned_helpdesk_id,
                $this->created_at->format('Y-m-d H:i:s'),
                $this->subject,
                $this->category_id,
                $this->status_id,
                $this->id
            ];
            $this->db->executeDML($sql, $params) or die("Failed to insert ticket");;
        }
        $this->category = $this->db->executeDQL("select category_name from ticket_category where category_id = $this->category_id")[0]["category_name"];
        $this->status = $this->db->executeDQL("select status_name from ticket_status where status_id = $this->status_id")[0]["status_name"];
        $hd = $this->db->executeDQL("SELECT first_name, last_name from employe where employe_id = ?", [$this->assigned_helpdesk_id]);
        $this->helpdesk_name = $hd? $hd[0]["first_name"] . " " . $hd[0]["last_name"] : "";
        $owner = $this->db->executeDQL("SELECT first_name, last_name from employe where employe_id = ?", [$this->owner_id]);
        $this->owner_name = $owner? $owner[0]["first_name"] . " " . $owner[0]["last_name"] : "";
        $this->last_updated_at = new DateTime($this->db->executeDQL("select last_updated_at from ticket where ticket_id = $this->id")[0]["last_updated_at"]);
        return $this->id;
    }

    public static function TicketsFromDB($query)
    {
        $db = HelpdeskDatabase::getInstance();
        $tickets = [];
        $ticket_results = $db->executeDQL($query);
        foreach ($ticket_results as $ticket_result) {
            $id = $ticket_result["ticket_id"];
            $owner_id = $ticket_result["created_by"];
            $assigned_helpdesk_id = $ticket_result["assigned_to"];
            $created_at = DateTime::createFromFormat('Y-m-d H:i:s', $ticket_result["created_at"]);
            $last_updated_at = DateTime::createFromFormat('Y-m-d H:i:s', $ticket_result["last_updated_at"]);
            $subject = $ticket_result["subject"];
            $category_id = $ticket_result["category_id"];
            $status_id = $ticket_result["status_id"];
            $ticket = new Ticket( $owner_id, $assigned_helpdesk_id, $created_at, $last_updated_at, $subject, $category_id, $status_id, $id);
            $tickets[] = $ticket;
        }
        return $tickets;
    }
}