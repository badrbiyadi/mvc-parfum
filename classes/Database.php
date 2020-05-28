<?php


class Database {

    public static $host = "localhost";
    public static $dbName = "mvc";
    public static $usernameDB = "root";
    public static $passwordDB = "";

    protected static function con() {
  
      $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8", self::$usernameDB, self::$passwordDB);
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    }
  
    public static function query($query, $params = array()) {
      $stmt = self::con()->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute($params);
      $data = $stmt->fetchAll();
      if(empty($data))
        $data = null;
      return $data;
    }

    protected static function resetAutoIncrement($table) {
      $stmt = self::con()->prepare("ALTER TABLE $table AUTO_INCREMENT = 1;");
      $data = $stmt->fetchAll();
      return $data;
    }
    
    

    
  
  }