<?php

class MainManager{
	private $db;

	public function __construct($db){
		$this->db=$db;
	}

	public function addCarte($idCarte, $idJoueur){
		$sql="INSERT INTO main(joueur_id, carte_id) VALUES(:idJoueur, :idCarte)";
        $req=$this->db->prepare($sql);
        $req->bindValue(':idJoueur', $idJoueur, PDO::PARAM_INT);
        $req->bindValue(':idCarte', $idCarte, PDO::PARAM_INT);
        $req->execute();
	}

	public function removeCarte($idCarte, $idJoueur){
		$sql="DELETE FROM main where joueur_id=:idJoueur, carte_id=:idCarte)";
        $req=$this->db->prepare($sql);
        $req->bindValue(':idJoueur', $idJoueur, PDO::PARAM_INT);
        $req->bindValue(':idCarte', $idCarte, PDO::PARAM_INT);
        $req->execute();
	}
}
