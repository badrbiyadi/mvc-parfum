<?php

class CompteController extends Controller {
    private $id;
    private $email;
    private $username;
    private $password;
    private $userId;
    private $imgProfil=null;
    private $fields = array('email', 'username', 'password', 'repassword');
    private $compte;
    


    public function CreateCompte() {

            $this->id = User::getAutoIncrement();
            $this->errorHandling(); 
            
            $this->email = $_POST['email'];
            $this->username = $_POST['username'];
            $this->password = $_POST['password'];
            $this->userId = User::getAutoIncrement() - 1;
         
            $this->compte = new Compte($this->email, $this->username, $this->password, $this->userId, $this->imgProfil);
            $this->compte->createCompteDB();

            $this->compte = Compte::selectCompte('email', $this->email);

            $session = new Session($this->compte);
            $session->login();
            Controller::redirect('index?connected');
    }

    public static function allUsers() {
        return Database::query("SELECT email, username, userId, imgProfil, statut FROM compte ");
    }

    public function showUser($email) {
        return Database::query("SELECT email, username, userId, imgProfil, statut FROM compte WHERE email='$email'");
    }

    private function errorHandling() {
        if(isset($_POST['submit'])) {
            
            $urlElem = "&email=".$_POST['email']."&username=".$_POST['username']."&img=".$_FILES["file"]["name"];
            //Check if empty
            if (empty($_POST['email'] || $_POST['username'] || $_POST['password'] || $_POST['repassword'] )) {

                Controller::redirect("register?confirmed&message=empty_fields".$urlElem);
                
            }else {
                if ($_POST['repassword'] != $_POST['password']) {
                    Controller::redirect("register?confirmed&message=password_repeat_error".$urlElem) ;
                }elseif (isset($_FILES["file"])) {
                    $imgInput = $_FILES["file"];
                    if ($imgInput['size'] == 0) {
                        $this->imgProfil =null;
                    } else {
                        $target_dir = "public/upload/users/";
                        $target_file = $target_dir . basename($imgInput["name"]);
                        $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        if ($imgInput['size'] > 500000)
                            Controller::redirect("register?confirmed&message=size_img_too_big".$urlElem);
                        elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
                            Controller::redirect("register?confirmed&message=type_is_not_img".$urlElem);
                        else 
                            $this->setProfileImg();  
                    } 
                }

                $rows = Compte::allComptes();

                foreach ($rows as $index => $row) {
                    if($row['email'] == $_POST['email'])
                        Controller::redirect("register?confirmed&message=email_exists".$urlElem);
                    if($row['username'] == $_POST['username'])
                        Controller::redirect("register?confirmed&message=username_exists".$urlElem);
                }
                
            }
        }else {
            Controller::redirect('register?confirmed');
        }
    }

    public function setProfileImg(){
        $dir = "public/upload/users/";
        $file = "user_".($this->id).".".strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["file"]["tmp_name"], $dir.$file);	
        $this->imgProfil = $file;
    }



}