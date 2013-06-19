 <fieldset>
	<legend>Ajouter un contrat client sur un materiel</legend>

	<?php  
		include_once('connexion_sql.php');
		$reponse= $bdd->prepare('
							SELECT m.num_id_mat, m.type_mat, m.modele_mat, m.nom_mat, m.commentaire_mat
							FROM materiel m
							')or die(print_r($bdd->errorInfo()));
							
		$reponse->execute();
	?>   
	
<h2> Liste de tous les materiels contractables:</h2>
<table border="1">
  <tr>

	<th>Montant nouveau contrat</th>
	<th>Type</th>
	<th>Nom</th>
	<th>Modele</th>
	<th>Commentaire</th>
  </tr>
	<?php while($donnees = $reponse->fetch()){ ?>
			<tr>
				<td>
				    <form method="post" action="index.php?section=ajouter_contrat_sql&id_cli=<?php echo $_GET['id_cli'] ?>&id_mat=<?php echo $donnees['num_id_mat']?>">
					<input type="text" name="montant" size="6">
					<input type="submit" name="Valider" value="Creer"/>
					</form>	
				</td>
				<td><?php echo $donnees['type_mat'] ?></td>
				<td><?php echo $donnees['nom_mat'] ?></td>
				<td><?php echo $donnees['modele_mat'] ?></td>
				<td><?php echo $donnees['commentaire_mat'] ?></td>
			</tr>
	<?php } ?>
</table>
</fieldset>



