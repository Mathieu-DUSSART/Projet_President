<?php
class Mypdo extends PDO
{

	protected $dbo;

	public function __construct ()
	{
	 // le paramétrage de cette classe se fait dans le fichier config.inc.php
		if (ENV=='dev'){
			$bool=true;
		}
		else
		{
			$bool=false;
		}
	}


}

?>
