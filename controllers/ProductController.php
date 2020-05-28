<?php

class ProductController extends Controller {
    private $id;
    private $title;
    private $desc;
    private $genre;
    private $prix;
    private $img;
    private $marqueId=null;
    private $postedAt;
    private static $fields = array('title' ,'desc' ,'genre' ,'marque' ,'prix' );
    private $prod;

    public function createProduct() {
        $this->id = Produit::getAutoIncrement();
        $this->errorHandling('createProduct');
        // Check if product exists
        $prods = Produit::allProducts(); 
        foreach ($prods as $index => $prod) {
            if ($prod['titleProd'] == $_POST['title']) {
                Controller::redirect("createProduct&message=product_already_exist&title=".$_POST['title']."&desc=".$_POST['desc']."&marque=".$_POST['marque']."&prix=".$_POST['prix']."&genre=".$_POST['genre']);
            }
        }

        $this->title = $_POST['title'];
        $this->desc = $_POST['desc'];
        $this->genre = $_POST['genre'];
        $this->prix = $_POST['prix'];
        $this->marqueId = $_POST['marque'];
 
        $this->prod = new Produit($this->title, $this->desc, $this->genre, $this->prix, $this->img, $this->marqueId);

        $this->prod->createProductDB();    
    }

    public function editProduct() {
        if(isset($_GET['id'])) {
            $this->id = $_GET['id'];
            $this->errorHandling('editProduct?id='.$this->id);
            $this->title = $_POST['title'];
            $this->desc = $_POST['desc'];
            $this->genre = $_POST['genre'];
            $this->prix = $_POST['prix'];
            $this->marqueId = $_POST['marque'];
           
            $this->prod = new Produit($this->title, $this->desc, $this->genre, $this->prix, $this->img, $this->marqueId);
            print_r($this->prod);
            $this->prod->updateProductDB($this->id); 
            Controller::redirect('index?updated');

        }else {
            Controller::redirect('admin>no_id');
        }
    }

    private function errorHandling($redirectPage) {
        if(isset($_POST['submit'])) {
            $fieldsGet = "&title=".$_POST['title']."&desc=".$_POST['desc']."&marque=".$_POST['marque']."&prix=".$_POST['prix']."&genre=".$_POST['genre'];
            if(empty($_POST['title']) || empty($_POST['prix']) || !isset($_POST['genre']) || $_POST['marque'] == null )   {
                Controller::redirect($redirectPage."&message=empty_fields".$fieldsGet);
            }else {
                
                // Check if image exists
                if(isset($_FILES["file"])) {
                    $imgInput = $_FILES["file"];
                    if ($imgInput['size'] == 0) {
                        $this->img =null;
                    }else {
                        $target_dir = "public/upload/products/";
                        $target_file = $target_dir . basename($imgInput["name"]);
                        $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        if ($imgInput['size'] > 500000)
                            Controller::redirect($redirectPage."&message=img_too_big".$fieldsGet);
                        elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
                            Controller::redirect($redirectPage."&message=type_is_not_img".$fieldsGet);
                        }else {
                            $dir = "public/upload/products/";
                            $file = "product_".($this->id).".".strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
                            move_uploaded_file($_FILES["file"]["tmp_name"], $dir.$file);	
                            $this->img = $file;
                        }
                        
                    }
                }
                
            }
            
        }else {
            Controller::redirect($redirectPage);
        }
    }
    

  

}