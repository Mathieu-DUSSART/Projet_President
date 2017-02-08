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
	
}
?>