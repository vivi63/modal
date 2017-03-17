<?php

  $form_values_valid=false;
            
if(isset($_POST["id"]) && $_POST["id"] != "" &&
   isset($_POST["nom"]) && $_POST["nom"] != "" && 
   isset($_POST["prenom"]) && $_POST["prenom"] != "" && 
   isset($_POST["up"]) && $_POST["up"] != "" &&
   isset($_POST["statut"]) && $_POST["statut"] != "" &&
   isset($_POST["section"]) && $_POST["section"] != "" &&
   isset($_POST["promotion"]) && $_POST["promotion"] != "" ){
   insererUtilisateur($_POST["id"],$_POST["nom"],$_POST["prenom"],$_POST["up"],$_POST["statut"],$_POST["section"],$_POST["promotion"]);
    $form_values_valid=true;
    echo "inscription effectuée";
    echo "<br>";
    echo "<a href='http://localhost/Project/index.php?page=connexion'><h3>Connexion</h3></a>";
}
 
if (!$form_values_valid) {
printRegisterForm();
}
  

        ?>