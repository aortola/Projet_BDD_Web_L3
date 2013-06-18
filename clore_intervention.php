     <form method="post" action="clore_intervention_sql.php?id_incid=<?php echo $_GET['id_incid'] ?>&id_mat=<?php echo $_GET['id_mat'] ?>">
	    <fieldset>
		 <legend>Détails d'intervention</legend>
		 
		 <label for="commentaire_intervention">Commentaire particulier: </label> 
		 <br/>
		 <textarea name="commentaire_intervention" rows="4" cols="60">
		 </textarea>
		 
		 <br/>
		 
		 <label for="heures">Durée intervention approximative: </label> 
		 <input type="text" name="heures" value="00" size="1" />
		 :
		 <input type="text" name="minutes" value="00" size="1" />
		 
		 <br/>
		 
		 <label for="difficulte_intervention">Difficulté estimée de l'intervention: </label> 
		 <select name="difficulte_intervention">
		    <option value="facile">facile</option>
			<option value="intermediaire">intermediaire</option>
			<option value="dur">dur</option>
		 </select>
	     <input type="submit" name="Valider" value="Clore intervention"/>
		 
		</fieldset>
	  </form>