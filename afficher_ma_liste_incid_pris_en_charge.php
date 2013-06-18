 <?php  
   include_once('connexion_sql.php');
	$reponse= $bdd->prepare('
							SELECT m.num_id_mat, type_mat, nom_mat, modele_mat, commentaire_mat, i.num_id_incid, type_incid, date_heure_incid, descrip_incid, etat_incid
							FROM intervention t, incident i, materiel m, incident_survenu_sur_materiel s
							WHERE  t.num_id_memb_perso=?
							AND i.num_id_incid=t.num_id_incid
							AND m.num_id_mat=t.num_id_mat
							AND s.num_id_mat=t.num_id_mat
							AND s.num_id_incid=t.num_id_incid
							AND s.etat_incid != "clos"
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute(array($_SESSION['num_id_indiv']));
?>   
<h2> Liste de tous les incidents que j'ai pris en charge:</h2>
<table border="1">
  <tr>
	<th>Changer status</th>
	<th>Interv. terminée</th>
	<th>Type</th>
	<th>Nom</th>
	<th>Modele</th>
	<th>Commentaire</th>
	<th>Type</th>
	<th>Date</th>
	<th>Descrip.</th>
	<th>Etat</th>
  </tr>
	<?php while($donnees = $reponse->fetch()){ ?>
			<tr>
				<td><a href="index.php?section=traiter_intervention&id_incid=<?php echo $donnees['num_id_incid']?>&id_mat=<?php echo $donnees['num_id_mat']?>">Traiter</a></td>
				<td><a href="index.php?section=clore_intervention&id_incid=<?php echo $donnees['num_id_incid']?>&id_mat=<?php echo $donnees['num_id_mat']?>">Clore</a></td>
				<td><?php echo $donnees['type_mat'] ?></td>
				<td><?php echo $donnees['nom_mat'] ?></td>
				<td><?php echo $donnees['modele_mat'] ?></td>
				<td><?php echo $donnees['commentaire_mat'] ?></td>
				<td><?php echo $donnees['type_incid'] ?></td>
				<td><?php echo $donnees['date_heure_incid'] ?></td>
				<td><?php echo $donnees['descrip_incid'] ?></td>
				<td><?php echo $donnees['etat_incid'] ?></td>
			</tr>
	<?php } ?>
</table>