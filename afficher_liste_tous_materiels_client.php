 <?php  
   include_once('connexion_sql.php');
	$reponse= $bdd->prepare('
							SELECT m.num_id_mat, m.type_mat, m.modele_mat, m.nom_mat, m.commentaire_mat
							FROM materiel m, client_possede_materiel p
							WHERE m.num_id_mat=p.num_id_mat
							AND p.num_id_cli=?
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute(array($_SESSION['num_id_indiv']));
?>   
<h2> Liste de tous mes materiels:</h2>
<table border="1">
  <tr>
	<th>Type</th>
	<th>Nom</th>
	<th>Modele</th>
	<th>Commentaire</th>
  </tr>
	<?php while($donnees = $reponse->fetch()){ ?>
			<tr>
				<td><?php echo $donnees['type_mat'] ?></td>
				<td><?php echo $donnees['nom_mat'] ?></td>
				<td><?php echo $donnees['modele_mat'] ?></td>
				<td><?php echo $donnees['commentaire_mat'] ?></td>
			</tr>
	<?php } ?>
</table>