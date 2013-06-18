<?php
  include_once('connexion_sql.php');
	$reponse= $bdd->prepare('INSERT INTO intervention (num_id_incid, num_id_memb_perso, num_id_mat, commentaire_interv, duree_interv, difficulte_interv) 
							VALUES (?, ?, ?, NULL, NULL, NULL);
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute(array($_GET['id_incid'],$_SESSION['num_id_indiv'],$_GET['id_mat']));
	header('Location: index.php?section=afficher_liste_incid_non_pris_en_charge');
?>