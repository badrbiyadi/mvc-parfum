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
  
    public static function query($query) {
      $stmt = self::con()->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
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
    
    public static function resetAll() {
      Session::logout();
      // delete Product
      self::deleteUpload('public/upload/products/*');
      self::query("DELETE FROM produit");
      self::query("ALTER TABLE produit AUTO_INCREMENT = 1;");

      // delete Marque
      self::deleteUpload('public/upload/marques/*');
      self::query("DELETE FROM marque");
      self::query("ALTER TABLE marque AUTO_INCREMENT = 1;");
      

      // delete User
      self::deleteUpload('public/upload/users/*');
      self::query("DELETE FROM user");
      self::query("ALTER TABLE user AUTO_INCREMENT = 1;");
      self::query("INSERT INTO  user(nomUser,  prenomUser ,  dateNaissance ,  genreUser ,  adressUser ,  villeUser ,  telUser ) VALUES ('admin' ,'admin' ,NOW(), 0,'10 Admin Home ' , 'Fez', '0666666666')");

      // delete Compte
      self::query("DELETE FROM compte");
      self::query("ALTER TABLE compte AUTO_INCREMENT = 1;");
      self::query("INSERT INTO  compte(email ,  username ,  password ,   userId ,  imgProfil ,  statut ) VALUES ('admin@admin.com', 'admin', '123456789',  1, null, 2)");

      // delete Panier
      self::query("DELETE FROM panier");
      self::query("ALTER TABLE panier AUTO_INCREMENT = 1;");

      header("Location: index");
    }
    
    private static function deleteUpload($path) {

      $files = glob($path); // get all file names
        foreach($files as $file){ // iterate files
          if(is_file($file))
            unlink($file); // delete file
        }

    }

    
  
  }