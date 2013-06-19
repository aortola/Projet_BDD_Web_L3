 <?php  
   include_once('connexion_sql.php');
	$reponse= $bdd->prepare('
						SELECT * 
						FROM individu i, client c
						WHERE c.num_id_cli=i.num_id_indiv
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute();
?>   
<h2> Liste de tous les clients de Urgence Info:</h2>
<table border="1">
  <tr>
	<th>Nouveau contrat</th>
  	<th>Login</th>
	<th>Nom</th>
	<th>Prenom</th>
	<th>Date naissance</th>
	<th>Adresse</th>
	<th>Télépone</th>
	<th>E-mail</th>
	<th>Date premier contrat</th>
  </tr>
	<?php while($donnees = $reponse->fetch()){ ?>
			<tr>
				<td><a href="index.php?section=ajouter_contrat&id_cli=<?php echo $donnees['num_id_cli'] ?>">Ajouter</a></td>
				<td><?php echo $donnees['login'] ?></td>
				<td><?php echo $donnees['nom'] ?></td>
				<td><?php echo $donnees['prenom'] ?></td>
				<td><?php echo $donnees['date_naissance'] ?></td>
				<td><?php echo $donnees['adresse'] ?></td>
				<td><?php echo $donnees['telephone'] ?></td>
				<td><?php echo $donnees['email'] ?></td>
				<td><?php echo $donnees['date_prem_contrat'] ?></td>
			</tr>
	<?php } ?>
</table>