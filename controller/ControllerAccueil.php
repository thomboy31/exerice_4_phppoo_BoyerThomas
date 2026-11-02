<?php

require_once '../model/modelProduit.php';
require_once '../view/viewAccueil.php';

class ControllerAccueil{
    //ATTRIBUT
    private ModelProduit $modelProduit;
    private ViewAccueil $viewAccueil;

    //CONSTRUCTEUR
    public function __construct(ModelProduit $modelProduit, ViewAccueil $viewAccueil){
        $this->modelProduit = $modelProduit;
        $this->viewAccueil = $viewAccueil;
    }

    /**
     * Get the value of modelProduit
     *
     * @return ModelProduit
     */
    public function getModelProduit(): ModelProduit {
        return $this->modelProduit;
    }

    /**
     * Set the value of modelProduit
     *
     * @param ModelProduit $modelProduit
     *
     * @return self
     */
    public function setModelProduit(ModelProduit $modelProduit): self {
        $this->modelProduit = $modelProduit;
        return $this;
    }

    /**
     * Get the value of viewAccueil
     *
     * @return ViewAccueil
     */
    public function getViewAccueil(): ViewAccueil {
        return $this->viewAccueil;
    }

    /**
     * Set the value of viewAccueil
     *
     * @param ViewAccueil $viewAccueil
     *
     * @return self
     */
    public function setViewAccueil(ViewAccueil $viewAccueil): self {
        $this->viewAccueil = $viewAccueil;
        return $this;
    }

    public function render(){
        //1.Récupérer les données utilisateurs
        // -> appelle à findAll() du model et stocker les données retournés dans une variable
        $data = $this->modelProduit->findAll();

        //2. Vérifier les data pour savoir si je reçois un tableau de donnée ou un message d'erreur
        switch(gettype($data)){
            case "string" :
                //Cas où on reçoit un message d'erreur
                $this->viewAccueil->setMessageError($data)->display();
                break;
            case "array" :
                //Cas où on reçoit nos données
                $this->viewAccueil->setList($data)->display();
                break;
        }
    }
}

$model = new ModelProduit(new PDO("mysql:host=localhost;dbname=ticket","root","root"));
$view = new ViewAccueil();

$controllerAccueil = new ControllerAccueil($model,$view);

//Lancer le rendu
$controllerAccueil->render();

?>