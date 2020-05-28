<?php
class Compte extends Database{
    private $email;
    private $username;
    private $password;
    private $pannier;
    private $userId;
    private $imgProfil;
    private $statut = 0;

     

    public function __construct($email, $username, $password, $pannier, $userId, $imgProfil=null) {
        $this->email = $email;  
        $this->username = $username;  
        $this->password = $password;  
        $this->pannier = $pannier;  
        $this->userId = $userId;  
        $this->imgProfil = $imgProfil;  
    }

    public static function allComptes() {
        return Database::query("SELECT * FROM compte");
    }

    public static function selectCompte($condition,$value) {
        return Database::query("SELECT * FROM compte WHERE $condition = '$value'")[0];
    }

    public function createCompteDB() {
        $request = "INSERT INTO compte (email, username, password, pannier, userId, imgProfil) VALUES (:email, :username, :password, :pannier, :userId, :imgProfil);";
        $stmt = self::con()->prepare($request);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':pannier', $this->pannier);
        $stmt->bindParam(':userId', $this->userId);
        $stmt->bindParam(':imgProfil', $this->imgProfil);
        $stmt->execute();
        return true;
    }
    public function copy(Compte $compte){
        return new self($compte->email, $compte->username, $compte->password, $compte->pannier, $compte->userId, $compte->imgProfil);
    }




    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of pannier
     */ 
    public function getPannier()
    {
        return $this->pannier;
    }

    /**
     * Set the value of pannier
     *
     * @return  self
     */ 
    public function setPannier($pannier)
    {
        $this->pannier = $pannier;

        return $this;
    }

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of imgProfil
     */ 
    public function getImgProfil()
    {
        return $this->imgProfil;
    }

    /**
     * Set the value of imgProfil
     *
     * @return  self
     */ 
    public function setImgProfil($imgProfil)
    {
        $this->imgProfil = $imgProfil;

        return $this;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */ 
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }
 }