<?php
 $form_values_valid=false;
            
if(isset($_POST["id"]) && $_POST["id"] != ""){
   $voyage=Voyage::getVoyage($dbh,$_POST["id"]);
   if(Voyage::ifVoyage($_POST["id"])!=NULL){
    echo $voyage->__ToString();
    echo "<br>";
    echo "Merci";
    $form_values_valid=true;
   }
   else{
       echo "<h4>"."Voyage inconnu, veuillez entrer un nouvel identifiant"."</h4>";
   }
}
 
if (!$form_values_valid) {
printSearchForm();
}


?>
