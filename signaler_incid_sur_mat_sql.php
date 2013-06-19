<?php
  include_once('connexion_sql.php');
	date_default_timezone_set("Europe/Berlin");
	$reponse= $bdd->prepare('INSERT INTO incident (num_id_incid, type_incid, date_heure_incid, descrip_incid) 
							  VALUES ("", ?, ?, ?);
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute(array($_POST['type_incident'],date('Y-m-d H:i:s'),$_POST['description_incident']));
	
	$reponse= $bdd->prepare('INSERT INTO incident_survenu_sur_materiel (num_id_mat, num_id_incid, etat_incid) 
							 VALUES ('.$_GET['id_mat'].','.$bdd->lastInsertId().',"non_traite")
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute();

	header('Location: index.php?section=afficher_liste_materiels_client');
?>