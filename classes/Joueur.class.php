<?php

class Joueur {

	private $id;
	private $pseudo;
<<<<<<< HEAD
	private $password;
	
=======
	private $main;

>>>>>>> 629adcdf9de337a77520b06151185ed6ec0d0366
	public function __construct($valeurs = array()){
        if(!empty($valeurs)){
            $this->affecte($valeurs);
        }
    }

    public function affecte($tab = array()){
		foreach($tab as $val => $valeurs){
			switch ($val){
				case "id" : $this->setIdJoueur($valeurs);
				break;
				case "pseudo": $this->setPseudo($valeurs);
				break;
<<<<<<< HEAD
				case "main": $this ->setPassword($valeur);	
				break;
=======
				case "main": $this ->setMain($valeur);
>>>>>>> 629adcdf9de337a77520b06151185ed6ec0d0366
			}
		}
	}
	//**********************************GETTERS**************************
	public function getIdJoueur(){
		return $this->id;
	}

	public function getPseudo(){
		return $this->pseudo;
	}
<<<<<<< HEAD
	
	public function getPassword(){
=======

	public function getMain(){
>>>>>>> 629adcdf9de337a77520b06151185ed6ec0d0366
		return $this->main;
	}

	//**********************************SETTERS**************************
    public function setIdJoueur($id){
        $this->id = $id;
    }

	public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }
<<<<<<< HEAD
	
	public function setPassword($main){
=======

	public function setMain($main){
>>>>>>> 629adcdf9de337a77520b06151185ed6ec0d0366
        $this->main = $main;
    }

}
