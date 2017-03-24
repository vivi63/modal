<?php
 $form_values_valid=false;
            
if(isset($_POST["id"]) && $_POST["id"] != ""){
   $voyage=Voyage::getVoyage($dbh,$_POST["id"]);
    echo $voyage->__ToString();
    echo "<br>";
    echo "Merci";
    $form_values_valid=true;
}
 
if (!$form_values_valid) {
printSearchForm();
}


?>
