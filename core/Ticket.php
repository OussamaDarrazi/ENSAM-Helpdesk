<?php
class Ticket{
    public $id;
    public $owner_id;
    public $assigned_helpdesk_id;
    public DateTime $created_at;
    public DateTime $last_updated_at;
    public $subject;
    public $category_id;
    public $status_id;

    public function __construct($id, $owner_id, $assigned_helpdesk_id, $created_at, $last_updated_at, $subject, $category_id, $status_id) {
        $this->id = $id;
        $this->owner_id = $owner_id;
        $this->assigned_helpdesk_id = $assigned_helpdesk_id;
        $this->created_at = $created_at;
        $this->last_updated_at = $last_updated_at;
        $this->subject = $subject;
        $this->category_id = $category_id;
        $this->status_id = $status_id;
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
        $created_at = $ticket_result["created_at"];
        $last_updated_at = $ticket_result["last_updated_at"];
        $subject = $ticket_result["subject"];
        $category_id = $ticket_result["category_id"];
        $status_id = $ticket_result["status_id"];
        $ticket = new Ticket($id, $owner_id, $assigned_helpdesk_id, $created_at, $last_updated_at, $subject, $category_id, $status_id);
        $tickets[] = $ticket;
    }
    return $tickets;
}
}