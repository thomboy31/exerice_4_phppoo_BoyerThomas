<?php
/* FICHIER VIEW pour l'Accueil

Son rôle est de géré l'affichage de l'écran et des données en les nettoyant et les formattant correctement.
*/
class ViewAccueil {
    //ATTRIBUT
    //Ici je donne des valeurs par défauts aux attributs de ma class
    private string $title = "Produits";
    private array $list = [];
    private string $messageError = "";

    //CONSTRUCTEUR

    //GETTER ET SETTER
    /**
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self {
        $this->title = $title;
        return $this;
    }

    /**
     * Get the value of list
     *
     * @return array
     */
    public function getList(): array {
        return $this->list;
    }

    /**
     * Set the value of list
     *
     * @param array $list
     *
     * @return self
     */
    public function setList(array $list): self {
        $this->list = $list;
        return $this;
    }

    /**
     * Get the value of messageError
     *
     * @return string
     */
    public function getMessageError(): string {
        return $this->messageError;
    }

    /**
     * Set the value of messageError
     *
     * @param string $messageError
     *
     * @return self
     */
    public function setMessageError(string $messageError): self {
        $this->messageError = $messageError;
        return $this;
    }

    //METHOD
    public function display(){
    ?>

        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo(htmlentities($this->title)) ?></title>
        </head>
        <body>
            <header>
                <h1><?php echo(htmlentities($this->title)) ?></h1>
            </header>

            <main>
                <h2>Liste des Produits</h2>
                <ul>
                    <?php 
                        foreach($this->list as $row){
                            echo("<li>".htmlentities($row['nom_produit'])." : ". htmlentities($row['nom_categorie'])."</li>");
                        }
                    ?>
                </ul>

                <p><?php echo(htmlentities($this->messageError)); ?></p>
            </main>

            <footer>
            </footer>
        </body>
        </html>

    <?php
    }    
}