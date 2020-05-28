<?php

class MarqueController extends Controller {

    private $id;
    private $title;
    private $img;


    public function createMarque() {
        $this->id = Marque::getAutoIncrement();
        $this->errorHandling();

        $this->title = $_POST['title'];

        $marque = new Marque($this->title , $this->img);
        $marque->createMarqueDB();

        if(isset($_GET['redirect']))
            Controller::redirect('createProduct?redirect=brand');
        else
            Controller::redirect('index?created_marque');

    }

    private function errorHandling() {
        if(isset($_POST['submit'])) {
            if (empty($_POST['title'])){
                Controller::redirect('createMarque?message=empty_fields');
            }elseif (isset($_FILES["file"])){
                $imgInput = $_FILES["file"];
                if ($imgInput['size'] == 0) {
                    $this->img =null;
                } else {
                    $target_dir = "public/upload/marques/";
                    $target_file = $target_dir . basename($imgInput["name"]);
                    $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    if ($imgInput['size'] > 500000)
                        Controller::redirect("register?confirmed&message=size_img_too_big".$urlElem);
                    elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
                        Controller::redirect("register?confirmed&message=type_is_not_img".$urlElem);
                    else 
                        $dir = "public/upload/marques/";
                        $file = "marque_".$this->id.".".strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
                        move_uploaded_file($_FILES["file"]["tmp_name"], $dir.$file);	
                        $this->img = $file;
                }        
            }
        }else {
            Controller::redirect('createMarque');
        }
    }

}