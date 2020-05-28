<?php

class LoginController extends Controller {
    private $email=null;
    private $password;
    private $compte;

    public function __construct($compte = null) {
        $this->compte = $compte;
    }

    public function connect() {
        $this->errorHandling();
        $this->connectSession();
    }
    public function connectSession() {
        
        $session = new Session($this->compte);
        $session->login();
        Controller::redirect('index?connected');
    }

    public function deconnect() {
        session_start();
        session_unset();
        session_destroy();
    }
    
    private function errorHandling() {
        if(isset($_POST['connect'])){
            if(empty($_POST['email'])) { 
                Controller::redirect('login?message=empty_email'); 
            }elseif(empty($_POST['password'])) {
                Controller::redirect('login?message=empty_password&email='.$_POST['email']); 
            }else {
                $comptes = Compte::allComptes();

                foreach ($comptes as $id => $compte) {
                    if ($_POST['email'] == $compte['email']) {
                        $this->email = $compte['email'];
                        $this->password = $_POST['password'];
                    }
                }
                if ($this->email == null) {
                    Controller::redirect('login?message=email_doesnt_exist&email='.$_POST['email']);
                }else {
                    $compte = Compte::selectCompte('email', $this->email);
                    if($compte['password'] != $this->password)  {
                        Controller::redirect('login?message=wrong_password&email='.$_POST['email']);
                    }
                    $this->compte = $compte;
                }
            } 
        }else {
            Controller::redirect('login');
        } 
    }

    



    /**
     * Set the value of compte
     *
     * @return  self
     */ 
    public function setCompte($compte)
    {
        $this->compte = $compte;

        return $this;
    }
}