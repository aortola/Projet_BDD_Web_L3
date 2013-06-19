<?php
   include_once('connexion_sql.php');
   
   $reponse = $bdd->prepare('SELECT * FROM individu WHERE login = ?') or die(print_r($bdd->errorInfo()));
   $reponse->execute(array(strip_tags($_POST['login'])));

   if($donnees = $reponse->fetch()){
   
    if(isset($_POST['mdp']) && $_POST['mdp']==$donnees['mdp']){
	
		$_SESSION['login']=strip_tags($_POST['login']);
		$_SESSION['num_id_indiv']=$donnees['num_id_indiv'];
		
		$reponse_client = $bdd->prepare('SELECT * FROM client WHERE num_id_cli = ?') or die(print_r($bdd->errorInfo()));
		$reponse_client->execute(array($donnees['num_id_indiv']));
		if($donnees_cli = $reponse_client->fetch()){	
			$_SESSION['droits']['client']='client';
		}
		
		
		$reponse_membre = $bdd->prepare('SELECT * FROM membre_personnel WHERE num_id_memb_perso = ?') or die(print_r($bdd->errorInfo()));
		$reponse_membre->execute(array($donnees['num_id_indiv']));
		
		if($donnees_membre = $reponse_membre->fetch()){	
			if(isset($donnees_membre['isAdmin'])){
				if($donnees_membre['isAdmin']=="non"){
					$_SESSION['droits']['membre']='membre';
				}else{
					$_SESSION['droits']['admin']='admin';
				}
			}
		}
    }
   }
header('Location: index.php');