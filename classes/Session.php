<?php

class Session extends Database {
    private $sessionEmail;
    private $userId;
    private $userStatus;
    private $compte = [];
    private $user = [];

  
    public function __construct($compte) {
        $this->userId = $compte['userId'];
        $this->userStatus = $compte['statut'];
        $this->sessionEmail = $compte['email'];
        $this->compte = Compte::selectCompte('userId', $this->userId);
        $this->compte = User::selectUser('idUser', $this->userId);
        
    }


    public function login() {
        session_start();
        $_SESSION['userId']  = $this->userId;
        $_SESSION['userStatus']  = $this->userStatus;
        $_SESSION['sessionEmail']  = $this->sessionEmail;

    }

    public static function logout() {
        session_start();
        session_unset();
        session_destroy();
    }
}