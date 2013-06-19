 <?php  
   include_once('connexion_sql.php');
	$reponse= $bdd->prepare('
							SELECT m.num_id_mat, m.type_mat, m.modele_mat, m.nom_mat, m.commentaire_mat, c.etat_contrat
							FROM materiel m, contrat c, contrat_couvre_materiel v, client_signe_contrat s
							WHERE m.num_id_mat=v.num_id_mat
							AND c.num_id_cont=v.num_id_cont
							AND s.num_id_cont=v.num_id_cont
							AND s.num_id_cli=?
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute(array($_SESSION['num_id_indiv']));
?>   
<h2> Liste de tous mes materiels sous contrat:</h2>
<table border="1">
  <tr>
  	<th>Suivi</th>
	<th>Signaler un incident</th>
	<th>Type</th>
	<th>Nom</th>
	<th>Modele</th>
	<th>Commentaire</th>
	<th>Etat contrat</th>
  </tr>
	<?php while($donnees = $reponse->fetch()){ ?>
			<tr>
				<td><a href="index.php?section=suivi_incidents&id_mat=<?php echo $donnees['num_id_mat']?>">Details</a></td>
				<td><a href="index.php?section=signaler_incid_sur_mat&id_mat=<?php echo $donnees['num_id_mat']?>">Signaler</a></td>
				<td><?php echo $donnees['type_mat'] ?></td>
				<td><?php echo $donnees['nom_mat'] ?></td>
				<td><?php echo $donnees['modele_mat'] ?></td>
				<td><?php echo $donnees['commentaire_mat'] ?></td>
				<td><?php echo $donnees['etat_contrat'] ?></td>
			</tr>
	<?php } ?>
</table>