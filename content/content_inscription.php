<?php

  $form_values_valid=false;
            
if(isset($_POST["login"]) && $_POST["login"] != "" &&
   isset($_POST["email"]) && $_POST["email"] != "" && 
   isset($_POST["up"]) && $_POST["up"] != ""  ) {
    insererUtilisateur($_POST["login"],$_POST["up"]," "," ",NULL,2000-04-02,$_POST["email"]," ");
    $form_values_valid=true;
    echo "inscription effectuée";
    echo "<br>";
    echo "<a href='http://localhost/TD4/index.php'>Connexion</a>";
}
 
if (!$form_values_valid) {
printRegisterForm();
}
  

        ?>