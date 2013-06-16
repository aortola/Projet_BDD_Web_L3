<?php
   include_once('connexion_sql.php');
   $reponse = $bdd->prepare('SELECT * FROM individu WHERE login = ?') or die(print_r($bdd->errorInfo()));
   $reponse->execute(array(strip_tags($_POST['nom'])));

   if($donnees = $reponse->fetch()){
    if(isset($_POST['mdp']) && $_POST['mdp']==$donnees['mdp']){
		$_SESSION['login']=strip_tags($_POST['login']);
		if(isset($donnees['isAdmin'])){
			if($donnees['isAdmin']=="non"){
				$_SESSION['droits']['membre']='membre';
			}else{
				$_SESSION['droits']['admin']='admin';
			}
		}else{
			$_SESSION['droits']['client']='client';
		}
    }
   }
header('Location: index.php');