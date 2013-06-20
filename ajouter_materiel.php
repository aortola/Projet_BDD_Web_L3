     <form method="post" action="ajouter_materiel_sql.php?id_cli=<?php echo $_SESSION['num_id_indiv'] ?>">
	    <fieldset>
		 <legend>Ajouter un materiel</legend>
		 
		 <label for="nom_mat">Nom du materiel: </label> 
		 <br/>
		 <input type="text" name="nom_mat" size="16"/>
		 <br/>
		 
		 <label for="modele_mat">Modele du materiel: </label> 
		 <br/>
		 <input type="text" name="modele_mat" size="16"/>
		 <br/>
		 
		 <label for="commentaire_mat">Commentaire sur materiel: </label> 
		 <br/>
		 <textarea name="commentaire_mat" rows="4" cols="60">
		 </textarea>
		 
		 <br/>
		 
		 <label for="type_mat">Type de materiel: </label> 
		 <select name="type_mat">
		    <option value="ordiFixe">Ordinateur fixe</option>
			<option value="ordiPort">Ordinateur portable</option>
			<option value="imprim">Imprimante</option>
			<option value="routeur">Routeur</option>
			<option value="ecran">Ecran</option>
			<option value="serveur">Serveur</option>
			<option value="peripherique">Peripherique</option>
		 </select>
	     <input type="submit" name="Valider" value="Ajouter materiel"/>
		 
		</fieldset>
	  </form>