<?php
if (isset($_SESSION["loggedIn"])) {
echo "<h3>".'Rentre ton voyage'."</h3>";
printRegisterFormV(); 
}
else{
    echo "Tu n'es pas connecté";
}
?>


