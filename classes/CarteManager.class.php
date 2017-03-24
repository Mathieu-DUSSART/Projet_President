<?php

class CarteManager{
	private $db;

	public function __construct($db){
		$this->db=$db;
	}

	public function getAllCarte(){
		$tabcarte=Array();
		$sql="SELECT * FROM carte ";
		$req=$this->db->prepare($sql);
        $req->execute();
		while($ligne=$req->fetch(PDO::FETCH_OBJ)){
			$tabcarte[]=new Carte($ligne);
		}
		return $tabcarte;
	}

	public function poserCarte($carte){
		$sql="SELECT cp.carte_id as carte, cp.id FROM cartepose cp JOIN carte c ON c.carte_id = cp.carte_id WHERE c.carte_valeur <= :carteValeur AND cp.id = (SELECT MAX(cp2.id) as maxId FROM cartepose cp2)";
		$req=$this->db->prepare($sql);
		$req->bindValue(':carteValeur', $carte->getValeurCarte(), PDO::PARAM_INT);
        $req->execute();
		$resu = $req->fetch(PDO::FETCH_OBJ);

		return (isset($resu->carte));
	}

}
?>
