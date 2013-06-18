  
 <?php  
   include_once('connexion_sql.php');
	$reponse= $bdd->prepare('
							SELECT s.num_id_mat, type_mat, nom_mat, modele_mat, commentaire_mat, s.num_id_incid, type_incid, date_heure_incid, descrip_incid, etat_incid
							FROM materiel m, incident c, incident_survenu_sur_materiel s 
							WHERE (s.num_id_incid,s.num_id_mat) NOT IN(SELECT i.num_id_incid,i.num_id_mat FROM intervention i) 
							AND s.num_id_mat=m.num_id_mat
							AND s.num_id_incid=c.num_id_incid
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute();
?>   
<h2> Liste de tous les incidents non pris en charge:</h2>
<table border="1">
  <tr>
	<th>Intervenir</th>
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
				<td><a href="index.php?section=prendre_intervention&id_incid=<?php echo $donnees['num_id_incid']?>&id_mat=<?php echo $donnees['num_id_mat']?>">Intervenir</a></td>
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