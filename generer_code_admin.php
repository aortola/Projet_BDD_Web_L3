<fieldset>
		 <legend>Code creation nouveau membre</legend>
		 Voici votre code unique (Detruit après utilisation):
		 <?php 
			include_once('connexion_sql.php');
			$code=uniqid(); 
			
			$reponse= $bdd->prepare('
					INSERT INTO codes_membres (code_membre,droits)
					VALUES (?, "admin");
			')or die(print_r($bdd->errorInfo()));

			$reponse->execute(array($code));
			
			echo " ".$code;
		 ?>
</fieldset>