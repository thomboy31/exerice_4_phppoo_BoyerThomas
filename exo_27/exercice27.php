<?php
/*Exercice 27 : Récupération de Donnée
A partir de la bdd ticket dont l'export est fourni, et ne vous aidant de la démo PDO

Créer une page PHP qui affiche au sein d'un HTML la liste des produits et de leur catégorie.
l'affichage doit ressembler à :

<li>Galaxy S : Smartphone</li>

Pour ce faire, vous aurez besoin d'initialiser une variable d'affichage $produit avec une chaîne de caractère vide.
Puis d'une boucle Foreach qui va parcourir le tableau de donnée.
A chaque tour de boucle, vous allez concaténer dans $produit les nouvelles données. La syntaxe ressemble  à :

$produit = $produit."<li>Les données que je souhaite</li>";
*/

/*ETAPES :
1) Se connecter à la BDD en créant l'objet PDO
2) Préparer la requête SELECT pour récupérer le nom des produits et leur catégorie
3) Envoyer la requête à la BDD
4) Récupérer la réponse de la BDD
5) Mettre en forme la réponse avec une boucle
6) Faire l'Affichage
*/

try{
    //1) Se connecter à la BDD en créant l'objet PDO
    $pdo = new PDO('mysql:host=localhost;dbname=ticket','root','root',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    //2) Préparer la requête SELECT pour récupérer le nom des produits et leur catégorie
    $request = $pdo->prepare('SELECT p.nom_produit, c.nom_categorie FROM produit p INNER JOIN categorie c ON p.id_categorie = c.id_categorie;');

    //3) Envoyer la requête à la BDD
    $request->execute();

    //4) Récupérer la réponse de la BDD
    // PDO::FETCH_ASSOC : permet de récupérer la réponse uniquement sous forme de tableaux associatifs
    $data = $request->fetchAll(PDO::FETCH_ASSOC);

    // je teste $data en l'affichant pour savoir si tout se passe bien et que je récupère des données
    print_r($data);

    // Affichage des Produits : 2nd Méthode
    //5) Mettre en forme la réponse avec une boucle
    $product = "";
    foreach($data as $tab){
        $product = $product."<li>{$tab["nom_produit"]} : {$tab["nom_categorie"]}</li>";
    }

}catch(EXCEPTION $error){
    die($error->getMessage());
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Liste de Produits : 1er Méthode</h1>
        <ul>
            <?php 
                //Affichage des produits : 1er Méthode
                foreach($data as $produit){
                    echo("<li>{$produit["nom_produit"]} : {$produit["nom_categorie"]}</li>");
                }
            ?>
        </ul>
        <h1>Liste de Produits : 2nd Méthode</h1>
        <ul>
            <?php
                echo($product);
            ?>
        </ul>
    </main>
</body>
</html>