<?php

class MarqueController extends Controller {

    private $id;
    private $titleMarque;
    private $img;


    public function createMarque() {
        $this->id = Marque::getAutoIncrement()-1;
        $this->errorHandling('createMarque');

        $this->titleMarque = $_POST['title'];

        $marque = new Marque($this->titleMarque , $this->img);
        $marque->createMarqueDB();

        if(isset($_GET['redirect']))
            Controller::redirect('createProduct?redirect=brand');
        else
            Controller::redirect('allBrands?created_marque');

    }

    public function editMarque() {
        if(!isset($_GET['id'])) {
            Controller::redirect('allBrands?no_id');

        }else {
            $this->id = $_GET['id'];
            $this->errorHandling('editMarque?id='.$this->id);
            $this->titleMarque = $_POST['title'];

            print_r($this->id); echo "<br>";
            print_r($this->img);echo "<br>";
            print_r($this->titleMarque);echo "<br>";
           
            $marque = new Marque($this->titleMarque , $this->img);
            $marque->editMarqueDB($this->id);

            Controller::redirect('allBrands?updated');
            
        }

    }

    public function deleteBrand() {
        if(!isset($_GET['id'])) {
            Controller::redirect('allBrands?delete_marque_no_id');

        }else {
            $this->id = $_GET['id'];
            $brand = Marque::selectMarque('idMarque', $this->id);
            if(!empty($brand['imgMarque'])) {
                unlink('public/upload/marques/'.$brand['imgMarque']);
            }
            Marque::deleteMarqueDB($this->id);

            Controller::redirect("allBrands?message=brand_Deleted");
        }
    }

    private function errorHandling($path) {
        if(isset($_POST['submit'])) {
            if (empty($_POST['title'])){
                Controller::redirect($path.'&message=empty_fields');
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
                        $file = "marque_".($this->id).".".strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
                        move_uploaded_file($_FILES["file"]["tmp_name"], $dir.$file);	
                        $this->img = $file;
                }        
            }
        }else {
            Controller::redirect('createMarque');
        }
    }

}