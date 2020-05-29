<?php
class Produit extends Database{
    private $idProd;
    private $titleProd;
    private $descProd;
    private $genreProd;
    private $prixProd;
    private $imgProd;
    private $marqueId;
    private $postedAt;
    protected static $autoIncrement; 

    public function __construct($titleProd, $descProd, $genreProd, $prixProd, $imgProd, $marqueId=null) {
        
        $this->titleProd = $titleProd;
        $this->descProd = $descProd;
        $this->genreProd = $genreProd;
        $this->prixProd = $prixProd;
        $this->imgProd = $imgProd;
        $this->marqueId = $marqueId;
        $this->postedAt = 'NOW()';

    }

    public static function allProducts() {
        return Database::query("SELECT * FROM produit"); 
    }

    public static function selectProduct($condition,$value) {
        return Database::query("SELECT * FROM produit WHERE $condition = '$value'")[0];
    }


    public function createProductDB() {
        
        $request = "INSERT INTO produit(titleProd, descProd, genreProd, prixProd, imgProd, marqueId ) VALUES (:titleProd, :descProd, :genreProd, :prixProd, :imgProd, :marqueId)";
        $stmt = self::con()->prepare($request);
        $stmt->bindValue(':titleProd', $this->titleProd); 
        $stmt->bindValue(':descProd', $this->descProd); 
        $stmt->bindValue(':genreProd', $this->genreProd); 
        $stmt->bindValue(':prixProd', $this->prixProd); 
        $stmt->bindValue(':imgProd', $this->imgProd); 
        $stmt->bindValue(':marqueId', $this->marqueId); 
        
        $stmt->execute();
        return true;
    }

    public function updateProductDB($id) {
        $request = "UPDATE produit SET titleProd = :titleProd, descProd = :descProd, genreProd = :genreProd, prixProd = :prixProd, imgProd = :imgProd, marqueId = :marqueId WHERE  idProd = :id;";
        $stmt = self::con()->prepare($request);
        $stmt->bindValue(':titleProd', $this->titleProd); 
        $stmt->bindValue(':descProd', $this->descProd); 
        $stmt->bindValue(':genreProd', $this->genreProd); 
        $stmt->bindValue(':prixProd', $this->prixProd); 
        $stmt->bindValue(':imgProd', $this->imgProd); 
        $stmt->bindValue(':marqueId', $this->marqueId); 
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return true;

    }

    public static function deleteProductDB($id) {
        $request = "DELETE FROM produit WHERE idProd = :id;";
        $stmt = self::con()->prepare($request);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return true;
    }

    public static function getAutoIncrement() {
        return self::$autoIncrement = Database::query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'mvc' AND TABLE_NAME = 'produit'")[0]['AUTO_INCREMENT'];
    }

}
