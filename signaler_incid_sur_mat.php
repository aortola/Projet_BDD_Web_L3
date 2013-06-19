     <form method="post" action="signaler_incid_sur_mat_sql.php?id_mat=<?php echo $_GET['id_mat'] ?>">
	    <fieldset>
		 <legend>Signaler un incident</legend>
		 
		 <label for="description_incident">Description de l'incident: </label> 
		 <br/>
		 <textarea name="description_incident" rows="4" cols="60">
		 </textarea>
		 
		 <br/>
		 
		 <label for="type_incident">Type d'incident: </label> 
		 <select name="type_incident">
		    <option value="defaillance_meca">Défaillance mécanique</option>
			<option value="defaillance_log">Défaillance logicielle</option>
			<option value="defaillance_electro">Défaillance électronique</option>
		 </select>
	     <input type="submit" name="Valider" value="Signaler incident"/>
		 
		</fieldset>
	  </form>