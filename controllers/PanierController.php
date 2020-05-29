<?php

class PanierController extends Controller {
    private $prodId;
    private $qte;
    private $userId;
    private $comId;

    public function addToPanier()
    {   
        if(!isset($_POST['submit'])){
            Controller::redirect('index?cannot_add_from_url');
        }elseif (!isset($_GET['user_id']) || !isset($_GET['prod_id']) || empty($_GET['user_id']) || empty($_GET['prod_id'])) {
            Controller::redirect('index?no_params_found');
        }else {
            $this->prodId = $_GET['prod_id'];
            $this->userId = $_GET['user_id'];
            $this->qte = $_POST['qte'];

        /*    print_r($this->prodId );echo "<br>";
            print_r($this->userId );echo "<br>";
            print_r($this->qte );echo "<br>";
        */
            $panier = new Panier($this->prodId, $this->qte, $this->userId);
            $panier->addToPanierDB();
            if(isset($_GET['redirect']))
                Controller::redirect($_GET['redirect'].'?added_to_panier');
                Controller::redirect('index');
        }
        
    }
}