  
<?php
  include_once('connexion_sql.php');
	$reponse= $bdd->prepare('UPDATE incident_survenu_sur_materiel SET etat_incid = "en_cours" WHERE num_id_incid =? AND num_id_mat =?
							')or die(print_r($bdd->errorInfo()));
	$reponse->execute(array($_GET['id_incid'],$_GET['id_mat']));
	header('Location: index.php?section=afficher_ma_liste_incid_pris_en_charge');
?>