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

	public function getJoueurPartie($partie_id){
		$tabJoueur = Array();
		$sql="SELECT joueur_id FROM joueurpartie where partie_id =:partie_id ";
		$req=$this->db->prepare($sql);
		$req->bindValue(':partie_id', $partie_id, PDO::PARAM_INT);
		$req->execute();
		while($ligne=$req->fetch(PDO::FETCH_OBJ)){
			$tabJoueur[]=$ligne->joueur_id;
		}

		return $tabJoueur;
	}
	
	public function getIdJoueur($login){
		$sql = "SELECT joueur_id FROM joueur WHERE joueur_pseudo = :login";
		$req = $this->db->prepare($sql);
		$req->bindValue(':login', $login, PDO::PARAM_STR);
		$req->execute();
		$resu = $req->fetch(PDO::FETCH_OBJ);
		return $resu->joueur_id;
	}
	
	public function existeJoueurPartie($id_joueur){
		$sql="SELECT partie_id FROM joueurpartie where joueur_id =:joueur_id ";
		$req=$this->db->prepare($sql);
		$req->bindValue(':joueur_id', $id_joueur, PDO::PARAM_INT);
		$req->execute();
		$resu = $req->fetch(PDO::FETCH_OBJ);
		if(isset($resu->partie_id)){
			return $resu->partie_id;
		}
		else{
			return null;
		}
	}
}
?>
