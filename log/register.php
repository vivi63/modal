<!DOCTYPE html>
 
<html>
 
<head>
  <title>Formulaire</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head>
 
<body>
  <h1>S'enregistrer </h1>
      
  <?php
  $form_values_valid=false;
  require('log/printForms.php');
 
            
  function insererUtilisateur($login, $mdp, $nom, $prenom, $promotion, $naissance, $email, $feuille) {
                $dbh = Database::connect();
                $sth = $dbh->prepare("INSERT INTO `utilisateurs` (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`) VALUES(?,SHA1(?),?,?,?,?,?,?)");
                $sth->execute(array("$login", "$mdp", "$nom", "$prenom", "$promotion", "$naissance", "$email", "$feuille"));
                $dbh = null;
            }
            
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

</body>
 
</html>