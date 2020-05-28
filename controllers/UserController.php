<?php

class UserController extends Controller {
    private $id;
    private $nom;
    private $prenom;
    private $genre;
    private $dateN;
    private $address;
    private $ville;
    private $tel;
    private $fields = array('nom', 'prenom' ,'dateNaissance' ,'address' ,'ville' ,'tel');

    
    private function errorHandling($redirectPage) {
        if(isset($_POST['submit'])) {
            foreach($this->fields as $field){
                if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['dateNaissance']) || empty($_POST['address']) || empty($_POST['ville']) || empty($_POST['tel'])) {
                    Controller::redirect($redirectPage."?message=empty_field&nom=".$_POST['nom']."&prenom=".$_POST['prenom']."&genre=".$_POST['genre']."&dateNaissance=".$_POST['dateNaissance']."&address=".$_POST['address']."&ville=".$_POST['ville']."&tel=".$_POST['tel']);

                }elseif($_POST['ville'] == null || $_POST['genre'] == null)
                    Controller::redirect($redirectPage."?message=empty_field&nom=".$_POST['nom']."&prenom=".$_POST['prenom']."&genre=".$_POST['genre']."&dateNaissance=".$_POST['dateNaissance']."&address=".$_POST['address']."&ville=".$_POST['ville']."&tel=".$_POST['tel']);
            }
        }else {
            Controller::redirect($redirectPage);
        }
    }

    public function EditUser() {
        $this->errorHandling("profile");
        if(isset($_GET['id'])){
            $this->nom = $_POST['nom'];
            $this->prenom = $_POST['prenom'];
            $this->genre = $_POST['genre'];
            $this->dateN = $_POST['dateNaissance'];
            $this->address = $_POST['address'];
            $this->ville = $_POST['ville'];
            $this->tel = $_POST['tel'];

            $user = new User($this->nom, $this->prenom, $this->genre, $this->dateN, $this->address, $this->ville, $this->tel);
            $user->updateUserDB($_GET['id']);
            Controller::redirect('index?edited');
        }else {
            Controller::redirect('profile');
        }
    }

    public function CreateUser() {
            $this->errorHandling('register'); 
            
            $this->nom = $_POST['nom'];
            $this->prenom = $_POST['prenom'];
            $this->genre = $_POST['genre'];
            $this->dateN = $_POST['dateNaissance'];
            $this->address = $_POST['address'];
            $this->ville = $_POST['ville'];
            $this->tel = $_POST['tel'];
            $user = new User($this->nom, $this->prenom, $this->genre, $this->dateN, $this->address, $this->ville, $this->tel);
            $user->createUserDB();

            Controller::redirect("register?confirmed");
        
    }

    public function test() {
        print_r(User::getAutoIncrement());
    }
    
    
}