   
 <?php  
   include_once('connexion_sql.php');
   
		$insertion = $bdd->prepare("INSERT INTO individu VALUES('',?,?,?,?,?,?,?)") or die(print_r($bdd->errorInfo()));
		if($_POST['mdp']==$_POST['mdp2']){
			if($insertion->execute(array(
								strip_tags($_POST['nom']),
								strip_tags($_POST['prenom']),
								strip_tags($_POST['date_naiss']),
								strip_tags($_POST['adresse']),
								strip_tags($_POST['tel']),
								$_POST['email'],
								$_POST['mdp']
								
							)))
			{include_once('connexion.php');}
			else{
				die(print_r($bdd->errorInfo()));
			}
		}else{
			echo "Les mots de passe ne correspondent pas !";
		}