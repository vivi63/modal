<?php
 $form_values_valid=false;
            
if(isset($_POST["id"]) && $_POST["id"] != ""){
   $voyage=Voyage::getVoyage($dbh,$_POST["id"]);
   if(Voyage::ifVoyage($_POST["id"])!=NULL){
    echo "<h3>".$voyage->__ToString()."</h3>";
    echo "<br>";
    echo "<div class='container-fluid'>"."<div class='row'>"."<div class='col-md-8'>";
    echo "<p>".$voyage->__ToStringInformation()."</p>";
    echo "</div>"."</div>"."</div>";
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
