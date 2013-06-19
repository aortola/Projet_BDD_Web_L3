<?php
  include_once('connexion_sql.php');
	date_default_timezone_set("Europe/Berlin");
	$reponse= $bdd->prepare('INSERT INTO contrat(num_id_cont, date_debut_cont, date_fin_cont, etat_contrat, motif_terminaison_cont, montant_cont) 
							 VALUES ("", ?, NULL, "actif", NULL, ?)
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute(array(date('Y-m-d H:i:s'),$_POST['montant']));
	
	$id_contrat = $bdd->lastInsertId();

	$reponse= $bdd->prepare('INSERT INTO contrat_couvre_materiel(num_id_cont,num_id_mat)
							 VALUES (?,?)
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute(array($id_contrat,$_GET['id_mat']));

	$reponse= $bdd->prepare('INSERT INTO client_signe_contrat(num_id_cont,num_id_cli)
							 VALUES (?,?)
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute(array($id_contrat,$_GET['id_cli']));
	
	header('Location: index.php?section=afficher_liste_clients_admin');
?>