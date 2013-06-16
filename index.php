<?php
session_start();
if(!isset($_SESSION['nom'])){
	echo "Vous n'êtes pas identifié!";
}else{
	echo "Bonjour ".$_SESSION['nom'];
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
