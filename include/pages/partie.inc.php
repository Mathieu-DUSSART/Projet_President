<?php
	$partieManager = new PartieManager($pdo);
?>

<input type="button" id="BoutonNouvellePartie" value="nouvelle partie">  

<table>
	<tr> 
		<th>Partie en cours </th>
	</tr>
	<?php
		
		$parties = $partieManager->getPartie();
		foreach($parties as $partie){
			?>
			<tr>
			<td><?php echo $partie ?></td><td><input type="BoutonRejoindrePartie" value="rejoindre partie"></td>
			</tr>
		
	<?php
	}
?>
</table>

