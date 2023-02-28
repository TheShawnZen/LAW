<?php
	include("config.php");
	
	$query = $connect->query("SELECT * FROM joueur");
?>

<table border ="1">
<tr>
<td>No</td>
<td>joueur</td>
</tr>

<?php
	while($row = $query->fetch_assoc()){
		echo "<tr>
				<td>$no</td>
				<td>{$row['NOM']}</td>
			</tr>";
		
	$no++;
	}
?>
</table>