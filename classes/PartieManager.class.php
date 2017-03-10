<?php
class PartieManager{
	private $db;

	public function __construct($db){
		$this->db=$db;
	}

	public function getPartie(){
		$tabPartie=Array();
		$sql="SELECT partie_id, partie_nom FROM Partie ";
		$req=$this->db->prepare($sql);
        $req->execute();
		while($ligne=$req->fetch(PDO::FETCH_OBJ)){
			$tabPartie[]=new Partie($ligne);
		}
		return $tabPartie;
	}

	public function getNbJoueurPartie($partie_id){
		$sql="SELECT count(joueur_id) as nbJoueur FROM joueurpartie where partie_id =:partie_id ";
		$req=$this->db->prepare($sql);
        $req->bindValue(':partie_id', $partie_id, PDO::PARAM_INT);
        $req->execute();
		$res=$req->fetch(PDO::FETCH_OBJ);
		return $res->nbJoueur;
	}

	public function addJoueurPartie($idJoueur, $idPartie){
		$sql="INSERT INTO joueurpartie VALUES (:idJoueur, :idPartie)";
		$req=$this->db->prepare($sql);
        $req->bindValue(':idJoueur', $idJoueur, PDO::PARAM_INT);
		$req->bindValue(':idPartie', $idPartie, PDO::PARAM_INT);
        $req->execute();

		return true;
	}
}
?>
