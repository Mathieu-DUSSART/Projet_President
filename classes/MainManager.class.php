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

	public function getMainJoueur($idJoueur){
		$tabCarte = Array();
		$sql = "SELECT c.carte_id, carte_valeur, carte_img FROM main m JOIN carte c ON c.carte_id = m.carte_id WHERE m.joueur_id = :idJoueur";
		$req = $this->db->prepare($sql);
		$req->bindValue(':idJoueur', $idJoueur, PDO::PARAM_INT);
		$req->execute();

		while($ligne = $req->fetch(PDO::FETCH_OBJ)){
			$tabCarte[] = new Carte($ligne);
		}

		return $tabCarte;
	}

	public function getNombreCarteMainAutreJoueur($idPartie, $idJoueur){
		$tabNbCarte = Array();
		$sql = "SELECT m.joueur_id, COUNT(carte_id) as nbCarte FROM main m JOIN joueurpartie jp ON jp.joueur_id = m.joueur_id WHERE jp.partie_id = :idPartie AND jp.joueur_id <> :idJoueur GROUP BY m.joueur_id";
		$req = $this->db->prepare($sql);
		$req->bindValue(':idPartie', $idPartie, PDO::PARAM_INT);
		$req->bindValue(':idJoueur', $idJoueur, PDO::PARAM_INT);
		$req->execute();

		while($ligne = $req->fetch(PDO::FETCH_OBJ)){
			$tabNbCarte[] = $ligne;
		}

		return $tabNbCarte;
	}
}
