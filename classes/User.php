<?php

class User extends Database{
    public static $autoIncrement; 
    private $id;
    private $nom;
    private $prenom;
    private $genre;
    private $dateN;
    private $address;
    private $ville;
    private $tel;

    public function __construct($nom, $prenom, $genre, $dateN, $address, $ville, $tel) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->genre = $genre;
        $this->dateN = $dateN;
        $this->address = $address;
        $this->ville = $ville;
        $this->tel = $tel;
    }
    
    public static function allUsers() {
        return Database::query("SELECT * FROM user");
    }

    public static function selectUser($condition,$value) {
        return Database::query("SELECT * FROM user WHERE $condition = '$value'")[0];
    }


    public function createUserDB() {
        $request = "INSERT INTO user(nomUser, prenomUser, dateNaissance, genreUser, adressUser, villeUser, telUser) VALUES (:nomUser, :prenomUser, :dateNaissance, :genreUser, :adressUser, :villeUser, :telUser)";
        $stmt = self::con()->prepare($request);
        $stmt->bindParam(':nomUser', $this->nom);
        $stmt->bindParam(':prenomUser', $this->prenom);
        $stmt->bindParam(':dateNaissance', $this->dateN);
        $stmt->bindParam(':genreUser', $this->genre);
        $stmt->bindParam(':adressUser', $this->address);
        $stmt->bindParam(':villeUser', $this->ville);
        $stmt->bindParam(':telUser', $this->tel);
        $stmt->execute();
        return true;
    }

    public function updateUserDB($id) {
        $request = "UPDATE user SET nomUser = :nomUser, prenomUser = :prenomUser, dateNaissance = :dateNaissance, genreUser = :genreUser, adressUser = :adressUser, villeUser = :villeUser, telUser = :telUser WHERE  idUser = :id;";
        $stmt = self::con()->prepare($request);
        $stmt->bindParam(':nomUser', $this->nom);
        $stmt->bindParam(':prenomUser', $this->prenom);
        $stmt->bindParam(':dateNaissance', $this->dateN);
        $stmt->bindParam(':genreUser', $this->genre);
        $stmt->bindParam(':adressUser', $this->address);
        $stmt->bindParam(':villeUser', $this->ville);
        $stmt->bindParam(':telUser', $this->tel);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return true;
    }
    



    



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of genre
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get the value of dateN
     */ 
    public function getDateN()
    {
        return $this->dateN;
    }

    /**
     * Set the value of dateN
     *
     * @return  self
     */ 
    public function setDateN($dateN)
    {
        $this->dateN = $dateN;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of autoIncrement
     */ 
    public static function getAutoIncrement()
    {
        return self::$autoIncrement = Database::query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'mvc' AND TABLE_NAME = 'user'")[0]['AUTO_INCREMENT'];
    }
  
}