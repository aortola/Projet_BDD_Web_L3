     <form method="post" action="inscription2.php">
	    <fieldset>
		 <legend>Vos informations personnelles</legend>
		 <label for="prenom">Votre login: </label>
	     <input type="text" name="login"  value="hodor"size="8"/>
		 
		 <br/>
		 
		 <label for="nom">Votre nom: </label>
	     <input type="text" name="nom" value="hodor" size="8"/>
		 
		 <br/>
		 
		 <label for="prenom">Votre prenom: </label>
	     <input type="text" name="prenom"  value="hodor"size="8"/>
		 
		 <br/>
		  
		 <label for="date_naiss">Votre date de naissance: </label>
	     <input type="text" name="date_naiss"  value="1990-08-08" size="10"/>
		 
		 <br/>
		 
		 <label for="adresse">Votre adresse: </label>
	     <input type="text" name="adresse"  value="hodor" size="8"/>
		 
		 <br/>
		 
		 <label for="email">Votre e-mail: </label>
	     <input type="text" name="email"  value="hodor@hodor.hodor" size="8"/>
		 
		 <br/>
		 
		 <label for="tel">Votre numéro de téléphone: </label>
	     <input type="text" name="tel"  value="0123456789" size="10"/>
		 
		 <br/>
		 
		 <label for="mdp">Votre mot de passe: </label>
	     <input type="password" name="mdp"  value="hodor" size="8"/>
		 
		 <br/>
		 
		 <label for="mdp2">Confirmation de votre mot de passe: </label>
	     <input type="password" name="mdp2"  value="hodor" size="8"/>
		 
		 <br/>
		 
		 <label for="status">Vous êtes: </label>
	     <input type="checkbox" name="status[membre]"  value="membre" /> Membre du personnel
		 <input type="checkbox" name="status[client]"  value="client" /> Client
		 <br/>
		 
	     <input type="submit" name="Valider" value="Continuer"/>
		 
		</fieldset>
	  </form>