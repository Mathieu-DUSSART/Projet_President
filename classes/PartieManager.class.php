<?php
class ArticleManager{
	private $db;

	public function __construct($db){
		$this->db=$db;
	}

	public function getParite(){
		$tabPartie=Array();
		$sql="SELECT * FROM Partie ";
		$req=$this->db->prepare($sql);
        $req->execute();
		while($ligne=$req->fetch(PDO::FETCH_OBJ)){
			$tabPartie[]=new Partie($ligne);
		}
		return $tabPartie;
	}
}
?> 