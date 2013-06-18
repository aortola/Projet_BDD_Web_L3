<?php
  include_once('connexion_sql.php');
  
	$reponse= $bdd->prepare('UPDATE incident_survenu_sur_materiel SET etat_incid = "clos" WHERE num_id_incid =? AND num_id_mat =?
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute(array($_GET['id_incid'],$_GET['id_mat']));
	
	$reponse= $bdd->prepare('UPDATE intervention SET commentaire_interv=?, duree_interv=?, difficulte_interv=?
							WHERE num_id_incid=? 
							AND num_id_memb_perso=? 
							AND num_id_mat=?
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute(array(
							$_POST['commentaire_intervention'],
							$_POST['heures'].":".$_POST['minutes'].":00",
							$_POST['difficulte_intervention'],
							$_GET['id_incid'],
							$_SESSION['num_id_indiv'],
							$_GET['id_mat']
							));

	header('Location: index.php?section=afficher_ma_liste_incid_pris_en_charge');
?>