<?php
class Message
{
    public $id;
    public $ticket_id;
    public $sender_id;
    public Datetime $sent_at;
    public $content;
    public $db;

    public function __construct($content, $sender_id, $ticket_id, $sent_at, $id = null)
    {
        $this->content = $content;
        $this->sender_id = $sender_id;
        $this->ticket_id = $ticket_id;
        $this->sent_at = $sent_at;
        $this->id = $id;
        $this->db = HelpdeskDatabase::getInstance();
    }

    public function save()
    {
        if ($this->id === null) {
            $sql = "INSERT INTO chat_message ( message_datetime, sender_id, ticket_id, content) 
                    VALUES ( ?, ?, ?, ?)";
            $params = [
                $this->sent_at->format('Y-m-d H:i:s'),
                $this->sender_id,
                $this->ticket_id,
                $this->content
            ];

            if ($this->db->executeDML($sql, $params)) {
                //Retirieving the id
                $sql = "SELECT message_id FROM chat_message WHERE message_datetime = ? AND sender_id = ? AND ticket_id = ? AND content = ?";
                $params = [
                    $this->sent_at->format('Y-m-d H:i:s'),
                    $this->sender_id,
                    $this->ticket_id,
                    $this->content
                ];
                //UPDATING the statics
                $this->id = $this->db->executeDQL($sql, $params)[0]["message_id"];
            }
        } else {
            $sql = "UPDATE chat_message SET message_datetime = ?, sender_id = ?, sender_id = ?, content = ? WHERE message_id = ?";
            $params = [
                $this->sent_at->format('Y-m-d H:i:s'),
                $this->sender_id,
                $this->ticket_id,
                $this->content,
                $this->id
            ];
            $this->db->executeDML($sql, $params) or die("Failed to insert message");
            ;
        }
        return $this->id;
    }


    public static function MessagesFromDB($query)
    {
        $db = HelpdeskDatabase::getInstance();
        $messages = [];
        $results = $db->executeDQL($query);

        foreach ($results as $result) {
            $id = $result["message_id"];
            $ticket_id = $result["ticket_id"];
            $sender_id = $result["sender_id"];
            $sent_at = DateTime::createFromFormat('Y-m-d H:i:s', $result["message_datetime"]);
            $content = $result["content"];

            $message = new Message($content, $sender_id, $ticket_id, $sent_at, $id);
            $messages[] = $message;
        }

        return $messages;
    }
}