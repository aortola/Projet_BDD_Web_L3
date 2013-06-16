<?php
if(!isset($_SESSION['nom'])){
?>
<div id="connexion">

 <form method="post" action="connexion.php" >
 <input type="text" name="nom" value="nom" size="5" />
 <input type="password" name="mdp" value="****" size="5" />
 <input type="submit" name="Connexion" value="Connexion" />
 </form>
 <a href="index.php?section=inscription">Inscription</a>
</div>

<?php
}else{
?>
<div id="deconnexion">
 <form method="post" action="deconnexion.php" >
 <input type="submit" name="deconnexion" value="deconnexion" />
 </form>
</div>


<ul>
<li><a href="index.php?section=liste_incidents">Liste des incidents</a></li>
</ul>
<?php
}
?>

