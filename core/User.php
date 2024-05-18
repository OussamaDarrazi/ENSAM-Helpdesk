<?php
require_once ("EnsamHelpdeskDatabase.php");
require_once ("utils/send_activation_pin.php");
enum UserType
{
    case EMPLOYE;
    case ADMIN;
    case HELPDESK;
}
class User
{

    public string $first_name;
    public string $last_name;
    public string $email;
    public string $phone_number;
    public string $password_hash;
    public int $department_id;
    public ?int $id; // nullable
    public UserType $user_type;
    public  $isActive;
    public $pin;
    private $db;

    public function __construct($first_name, $last_name, $email, $phone_number, $password_hash, $department_id, $user_type = UserType::EMPLOYE, $isActive = false, $id = null)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->password_hash = $password_hash;
        $this->department_id = $department_id;
        $this->id = $id;
        $this->user_type = $user_type;
        $this->isActive = $isActive;
        $this->pin = false;
        $this->db = HelpdeskDatabase::getInstance();
    }

    public function save(){
        $isAdmin = ($this->user_type == UserType::ADMIN)? 1 : 0; 
        $isHelpdesk = ($this->user_type == UserType::HELPDESK)? 1 : 0; 
            
        if($this->id == null){
            $sql = "INSERT INTO employe (first_name, last_name, email, phone_number, password, dept_id, isActive, isAdmin, isHelpdesk) 
                    VALUES (?,?,?,?,?,?,?,?,?)";
            $params = [$this->first_name, $this->last_name, $this->email, $this->phone_number, $this->password_hash, 
                       $this->department_id, $this->isActive, $isAdmin, $isHelpdesk];
        } else {
            $sql = "UPDATE employe SET first_name =?, last_name =?, email =?, phone_number =?, password =?, dept_id =?, 
                    isActive =?, isAdmin =?, isHelpdesk =? WHERE employe_id =?";
    
            $params = [$this->first_name, $this->last_name, $this->email, $this->phone_number, $this->password_hash, 
                       $this->department_id, $this->isActive ,$isAdmin, $isHelpdesk,$this->id];
        }
        return $this->db->executeDML($sql, $params);
    }

    public function send_activation_pin(){
        $this->pin = send_activation_pin($this->email);
        if($this->pin){
            $this->db->executeDML("INSERT INTO verification_pin (email, pin) VALUES ('$this->email', '$this->pin');");
            return $this->pin;
        }else{
            throw new Exception("Unable to send verification pin to $this->email");
        }
    }
    public function activate(){
        $this->isActive = 1;
        $this->pin = false;
        $this->save();
        $this->db->executeDML("DELETE FROM verification_pin WHERE email = '$this->email'");
        return $this->isActive;
    }

    public static function UsersFromDB($query)
    {   $db = HelpdeskDatabase::getInstance();
        $users = [];
        $user_results = $db->executeDQL($query);
        foreach ($user_results as $user_result) {
            $first_name = $user_result["first_name"];
            $last_name = $user_result["last_name"];
            $email = $user_result["email"];
            $phone_number = $user_result["phone_number"];
            $password_hash = $user_result["password"];
            $department_id = $user_result["dept_id"];
            $user_type = $user_result["isAdmin"]? UserType::ADMIN: ( $user_result["isHelpdesk"]? UserType::HELPDESK: UserType::EMPLOYE);
            $id = $user_result["employe_id"];
            $isActive = (bool)$user_result["isActive"];
            $pin = $user_result["pin"];
            $user = new User($first_name, $last_name, $email, $phone_number, $password_hash, $department_id, $user_type, $isActive, $id);
            $user->pin = $pin;
            $users[] = $user;
        }
        return $users;
    }




}

