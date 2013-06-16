<?php
  if(isset($_POST['status'])){
?>

 <form method="post" action="inscription_sql.php">
 <?php
 foreach($_POST as $key => $val){
 ?>	
	<input type="hidden" name="<?php echo $key ?>" value="<?php echo $val ?>" > 
<?php		
 }
 
 if(isset($_POST['status']['membre'])){
 ?> 
	    <fieldset>
		 <legend>Vos informations en tant que membre du personnel</legend>
		 
		 <label for="code_membre">Veulliez saisir votre code membre: </label>
		 <br/>
	     <input type="password" name="code_membre" value="hodor" size="8"/>
		 
		 <br/>
		 
		 <label for="poste">Quel est votre poste ?: </label>
		 <br/>
		 <select name="poste">
			<option value="technicien">Technicien</option>
			<option value="ingenieur">Ingénieur</option>
			<option value="cadre">Cadre</option>
			<option value="RH">G.R.H.</option>
			<option value="commercial">Commercial</option>
		 </select>
		 
		 <br/>
		 
		 <label for="competences">Vos compétences en réparation: </label>
		 <br/>
	     <input type="checkbox" name="competences[]"  value="ordiFixe" /> Ordinateurs fixes
		 <input type="checkbox" name="competences[]"  value="ordiPort" /> Ordinateurs portables
		 <input type="checkbox" name="competences[]"  value="imprim" /> Imprimantes
		 <br/>
		 <input type="checkbox" name="competences[]"  value="routeur" /> routeurs
		 <input type="checkbox" name="competences[]"  value="ecran" /> Ecrans
		 <input type="checkbox" name="competences[]"  value="serveur" /> Serveurs
		 <br/>
		 <input type="checkbox" name="competences[]"  value="peripherique" /> Périphériques
		 <br/>
		 
	    </fieldset>
		<br/>

 <?php	  
	}
	if(isset($_POST['status']['client'])){
?>
		<fieldset>
		 <legend>Vos informations client</legend>
		 
		 <label for="code_membre">Veulliez saisir votre code promotionnel si vous en avez un: </label><br/>
	     <input type="text" name="code_promo" value="hodor" size="8"/>
		 <br/>
		 <label for="prev_mail">Souhaitez-vous être prévenu par e-mail de l'avancement de vos réparations ?: </label><br/>
		 <input type="radio" name="prev_mail" checked="true" value="oui"/> Oui
		 <input type="radio" name="prev_mail" value="non"/> Non
	    </fieldset>
		<br/>
<?php	   
	}
?>
<input type="submit" name="Valider" value="Valider"/>
</form>

<?php
}else{
echo "Veuillez choisir au moins un status!";
}