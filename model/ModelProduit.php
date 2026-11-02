<?php

class ModelProduit{
 
private int $id_produit;
private int $id_categorie;
private string $nom_produit;
private string $nom_categorie;
private PDO $pdo;

public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

/**
 * Get the value of id_produit
 *
 * @return int
 */
public function getIdProduit(): int {
return $this->id_produit;
}

/**
 * Set the value of id_produit
 *
 * @param int $id_produit
 *
 * @return self
 */
public function setIdProduit(int $id_produit): self {
$this->id_produit = $id_produit;
return $this;
}

/**
 * Get the value of id_categorie
 *
 * @return int
 */
public function getIdCategorie(): int {
return $this->id_categorie;
}

/**
 * Set the value of id_categorie
 *
 * @param int $id_categorie
 *
 * @return self
 */
public function setIdCategorie(int $id_categorie): self {
$this->id_categorie = $id_categorie;
return $this;
}

/**
 * Get the value of nom_produit
 *
 * @return string
 */
public function getNomProduit(): string {
return $this->nom_produit;
}

/**
 * Set the value of nom_produit
 *
 * @param string $nom_produit
 *
 * @return self
 */
public function setNomProduit(string $nom_produit): self {
$this->nom_produit = $nom_produit;
return $this;
}

/**
 * Get the value of nom_categorie
 *
 * @return string
 */
public function getNomCategorie(): string {
return $this->nom_categorie;
}

/**
 * Set the value of nom_categorie
 *
 * @param string $nom_categorie
 *
 * @return self
 */
public function setNomCategorie(string $nom_categorie): self {
$this->nom_categorie = $nom_categorie;
return $this;
}

/**
 * Get the value of pdo
 *
 * @return PDO
 */
public function getPdo(): PDO {
return $this->pdo;
}

/**
 * Set the value of pdo
 *
 * @param PDO $pdo
 *
 * @return self
 */
public function setPdo(PDO $pdo): self {
$this->pdo = $pdo;
return $this;
}

public function findAll(){
        //Recupération produit , nom de categorie
        try{
            //1. Construire l'objet connexion PDO

            //2. Préparation de la requête
            $request = $this->pdo->prepare("SELECT p.id_produit, c.id_categorie, p.nom_produit, c.nom_categorie FROM produit p 
            INNER JOIN categorie c ON p.id_categorie = c.id_categorie;");

            //3. Execution de la requête
            $request->execute();

            //4. Récupérere la réponse
            return $request->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $error){
            return $error->getMessage();
        }
    }

}



?>