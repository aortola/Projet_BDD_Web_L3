 <?php  
   include_once('connexion_sql.php');
	$reponse= $bdd->prepare('
							SELECT *
							FROM incident i, incident_survenu_sur_materiel s
							WHERE s.num_id_incid=i.num_id_incid
							AND s.num_id_mat=?
							')or die(print_r($bdd->errorInfo()));
	
	$reponse->execute(array($_GET['id_mat']));
	
	$reponse_intervention= $bdd->prepare('
										SELECT *
										FROM intervention v
										WHERE v.num_id_mat = ?
										AND v.num_id_incid = ?
							')or die(print_r($bdd->errorInfo()));
?>   
<h2> Liste des incidents et interventions pour ce materiel:</h2>
<table border="1">
  <tr>
  	<th>Type</th>
	<th>Date</th>
	<th>Descript</th>
	<th>Etat traitement</th>
	<th>Commentaire intervention</th>
	<th>Duree</th>
	<th>Difficulte</th>
  </tr>
	<?php while($donnees = $reponse->fetch()){ ?>
			<tr>
				<td><?php echo $donnees['type_incid'] ?></td>
				<td><?php echo $donnees['date_heure_incid'] ?></td>
				<td><?php echo $donnees['descrip_incid'] ?></td>
				<td><?php echo $donnees['etat_incid'] ?></td>
				<?php 
						if($donnees['etat_incid']=="clos"){
							$reponse_intervention->execute(array($_GET['id_mat'],$donnees['num_id_incid']));
							if($donnees_interv = $reponse_intervention->fetch()){
								echo "<td>".$donnees_interv['commentaire_interv']."</td>";
								echo "<td>".$donnees_interv['duree_interv']."</td>";								
								echo "<td>".$donnees_interv['difficulte_interv']."</td>";
							}
				     	}else{
								echo "<td>vide</td>";
								echo "<td>vide</td>";
								echo "<td>vide</td>";
						}						
				?>
			</tr>
	<?php } ?>
</table>