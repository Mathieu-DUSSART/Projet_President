<?php 

class ArticleManager{
	private $db;

	public function __construct($db){
		$this->db=$db;
	}
	
public function checkLoginPassword($login, $password){
        $password = crypterPassword($password);
        $sql = "SELECT joueur_id FROM joueur WHERE joueur_pseudo = :login AND joueur_password = :password";
        $req = $this->db->prepare($sql);
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->execute();
        $resu = $req->fetch(PDO::FETCH_OBJ);

        return (isset($resu->joueur_id));
    }
}
?>