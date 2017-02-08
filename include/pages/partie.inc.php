<?php
	$db = new MyPdo();
	$partieManager = new PartieManager($db);
?>

<button type="button"> nouvelle partie </button>

<table>
	<tr> 
		<th>Partie en cours </th>
	</tr>
	<?php
		
		$parties = $partieManager->getPartie();
		foreach($parties as $partie){
			?>
			<tr>
			<td><?php echo $partie ?></td><td><button type="button"> rejoindre partie </button></td>
			</tr>
		
	<?php
	}
?>
</table>

