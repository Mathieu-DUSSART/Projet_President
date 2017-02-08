<?php

class CarteManager{
	private $db;

	public function __construct($db){
		$this->db=$db;
	}
	
	public function addCarte($idJoueur, $idCarte){
		$sql="INSERT INTO main(joueur_id, carte_id) VALUES(:idJoueur, :idCarte)";
        $req=$this->db->prepare($sql);
        $req->bindValue(':idJoueur', joueur_id, PDO::PARAM_INT);
        $req->bindValue(':idCarte', carte_id, PDO::PARAM_INT);
        $req->execute();
	}
	
	public function addCarte($idJoueur, $idCarte){
		$sql="DELETE FROM main where joueur_id=:idJoueur, carte_id=:idCarte)";
        $req=$this->db->prepare($sql);
        $req->bindValue(':idJoueur', joueur_id, PDO::PARAM_INT);
        $req->bindValue(':idCarte', carte_id, PDO::PARAM_INT);
        $req->execute();
	}
}