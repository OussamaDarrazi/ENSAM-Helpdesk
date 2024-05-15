<?php

class HelpdeskDatabase {
    // Singleton pour ne pas etablir plusieur connection a la bdd
    private static $instance = null;
    private $pdo;
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'ensamhelpdesk';
    private function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->database}";
        $this->pdo = new PDO($dsn, $this->user, $this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function getConnection() {
        return $this->pdo;
    }

    /**
     * R part of the CRUD
     */
    public function executeDQL($query, $params = []) {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * CUD part of the CRUD
     */
    public function executeDML($query, $params = []) {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            return true; //success
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}
