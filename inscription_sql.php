   
 <?php  
   include_once('connexion_sql.php');
   
		$insertion = $bdd->prepare("INSERT INTO individu VALUES('',?,?,?,?,?,?,?,?)") or die(print_r($bdd->errorInfo()));
		if($_POST['mdp']==$_POST['mdp2'] && (isset($_POST['prev_mail'])||isset($_POST['code_membre']))){
			if($insertion->execute(array(
								strip_tags($_POST['login']),
								strip_tags($_POST['nom']),
								strip_tags($_POST['prenom']),
								strip_tags($_POST['date_naiss']),
								strip_tags($_POST['adresse']),
								strip_tags($_POST['tel']),
								$_POST['email'],
								$_POST['mdp']
								
							)))
			{
				$reponse_id = $bdd->prepare('SELECT num_id_indiv FROM individu WHERE nom = ?') or die(print_r($bdd->errorInfo()));
				$reponse_id->execute(array(strip_tags($_POST['nom'])));
				
				if(isset($_POST['code_membre'])){
					$verification = $bdd->prepare("SELECT * FROM codes_membres WHERE code_membre=?") or die(print_r($bdd->errorInfo()));
					$verification->execute(array(($_POST['code_membre'])));
					if($donnees = $verification->fetch()){
						
							$suppression= $bdd->prepare("DELETE FROM codes_membres WHERE code_membre=?") or die(print_r($bdd->errorInfo()));
							$suppression->execute(array(($donnees['code_membre'])));
					
						echo $donnees['droits'];
						if($donnees['droits']=='admin'){
							$isAdmin='oui';
						}else{
							$isAdmin='non';
						}
						if($id = $reponse_id->fetch()){
							 $competences_string='';
							 foreach($_POST['competences'] as $key => $val){
								$competences_string = $competences_string.$val.',';
							 }	 
							 $competences_string=substr($competences_string,0,-1);
							 $competences_string='\''.$competences_string.'\'';
							 echo $competences_string;
						
							$insertion_membre = $bdd->prepare("INSERT INTO membre_personnel VALUES(?,?,".$competences_string.",?)") or die(print_r($bdd->errorInfo()));
							$insertion_membre->execute(array($id[0],$_POST['poste'],$isAdmin));
						}
					}
				}
			
				if(isset($_POST['prev_mail'])){
					if($id = $reponse_id->fetch()){
						$insertion_client = $bdd->prepare("INSERT INTO client VALUES(?,NULL,?)") or die(print_r($bdd->errorInfo()));
						$insertion_client->execute(array($id[0],$_POST['prev_mail']));
					}
				}
				
				include_once('connexion.php');
			}else{
				die(print_r($bdd->errorInfo()));
			}
		}else{
			echo "Les mots de passe ne correspondent pas !";
		}