<?php

   include_once('connexion_sql.php');
   $reponse = $bdd->prepare('SELECT mdp FROM individu WHERE nom = ?') or die(print_r($bdd->errorInfo()));
   $reponse->execute(array(strip_tags($_POST['nom'])));

   if($donnees = $reponse->fetch()){

    if(isset($_POST['mdp']) && $_POST['mdp']==$donnees['mdp']){
   
    $_SESSION['nom']=strip_tags($_POST['nom']);
    }
   }
header('Location: index.php');