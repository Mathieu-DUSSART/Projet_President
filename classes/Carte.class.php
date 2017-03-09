<?php
class Carte{
    private $idCarte;
    private $valeurCarte;
    private $imgCarte;

    public function __construct($valeurs = array()){
        if(!empty($valeurs)){
            $this->affecte($valeurs);
        }
    }

    public function affecte($tab = array()){
		foreach($tab as $id => $valeurs){
			switch ($id){
                case "carte_id" : $this->setIdCarte($valeurs);
                break;
                case "carte_valeur" : $this->setValeurCarte($valeurs);
                break;
                case "carte_img" : $this->setImgCarte($valeurs);
                break;
			}
		}
	}

    //**********************************SETTERS**************************
    public function setIdCarte($idCarte){
        $this->idCarte = $idCarte;
    }

    public function setValeurCarte($valeur){
        $this->valeurCarte=$valeur;
    }

    public function setImgCarte($valeur){
        $this->imgCarte=$valeur;
    }
    //**********************************GETTERS**************************
    public function getIdCarte(){
        return $this->idCarte;
    }

    public function getValeurCarte(){
        return $this->valeurCarte;
    }

    public function getImgCarte(){
        return $this->imgCarte;
    }


}
?>
