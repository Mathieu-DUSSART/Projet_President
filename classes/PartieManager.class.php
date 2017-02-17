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
		$res=$req->fetch(PDO::FETCH_NUM);
		return $res;
	}
}
?>
