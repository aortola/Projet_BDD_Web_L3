<?php
  include_once('connexion_sql.php');

	$reponse= $bdd->prepare('INSERT INTO materiel (num_id_mat, type_mat, nom_mat, modele_mat, commentaire_mat) 
							  VALUES ("", ?, ?, ?, ?);
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute(array($_POST['type_mat'],$_POST['nom_mat'],$_POST['modele_mat'],$_POST['commentaire_mat']));
	
	$reponse= $bdd->prepare('INSERT INTO client_possede_materiel (num_id_mat, num_id_cli) 
							 VALUES ('.$bdd->lastInsertId().','.$_GET['id_cli'].')
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute();

	header('Location: index.php?section=afficher_liste_tous_materiels_client');
?>