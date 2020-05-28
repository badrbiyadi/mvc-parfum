<?php

class Marque extends Database {
    private $idMarque;
    private $titleMarque;
    private $imgMarque;
    public static $autoIncrement;
    

    public function __construct($titleMarque, $imgMarque) {
        
        $this->titleMarque = $titleMarque;
        $this->imgMarque = $imgMarque;
    }

    public static function allMarques() {
        return Database::query("SELECT * FROM marque");
    }

    public static function selectMarque($condition,$value) {
        return Database::query("SELECT * FROM marque WHERE $condition = '$value'")[0];
    }

    public function createMarqueDB() {
        
        $request = "INSERT INTO marque(titleMarque, imgMarque) VALUES (:titleMarque, :imgMarque);";
        $stmt = self::con()->prepare($request);
        $stmt->bindValue(':titleMarque', $this->titleMarque); 
        $stmt->bindValue(':imgMarque', $this->imgMarque); 
        
        $stmt->execute();
        return true;
    }

    public static function getAutoIncrement()
    {
        return self::$autoIncrement = Database::query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'mvc' AND TABLE_NAME = 'user'")[0]['AUTO_INCREMENT'];
    }


}