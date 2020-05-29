<?php

class Panier extends Database{ 
    private $idPan;
    private $prodId;
    private $qte;
    private $userId;
    private $comId;
    public static $autoIncrement;



    public function __construct($prodId, $qte, $userId)
    {
        $this->prodId = $prodId;
        $this->qte = $qte;
        $this->userId = $userId;
       

    }

    public static function panierUser($userId)
    {
        
        return Database::query("SELECT * FROM panier,produit WHERE userId = $userId AND prodId=idProd AND comId IS NULL ORDER BY idPan DESC LIMIT 10;");
    }

    public function addToPanierDB()
    {

        $request = "INSERT INTO panier(prodId ,  qte,  userId) VALUES (:prodId ,  :qte,  :userId) ";
        $stmt = self::con()->prepare($request);     
        $stmt->bindValue(':prodId',$this->prodId);
        $stmt->bindValue(':qte',$this->qte);
        $stmt->bindValue(':userId',$this->userId);
        $stmt->execute();
        return true;

    }


}



     
    
    