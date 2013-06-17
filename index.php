<?php
include_once('connexion_sql.php');
if(!isset($_SESSION['login'])){
	echo "Vous n'êtes pas identifié!";
}else{
	echo "Bonjour ".$_SESSION['login'];
}
?>
   
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" 
>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Urgence Informatique</title>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="" />
  </head>
  <body>
   <?php	
		  include_once('en-tete.php');
		  
		  if(isset($_SESSION['droits'])){
			if(isset($_SESSION['droits']['client'])){
				include_once('options_client.php');
			}
			if(isset($_SESSION['droits']['membre'])){
				include_once('options_membre.php');
			}else{
				if(isset($_SESSION['droits']['admin'])){
					include_once('options_membre.php');
					include_once('options_admin.php');
				}
			}
		  }

          if(!isset($_GET['section']))
          {
		  //on verra
          }
          else
          {
             include_once($_GET['section'].'.php');
          }	 
	?>
  
  </body>
  </html>
