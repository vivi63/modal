<?php

// Formulaires pour les utilisateurs 

function printLoginForm($askedpage) {
    echo <<<EOS
     <form action='index.php?page=$askedpage' method="post" >
    <p>Pseudo : <input type="text" name="id"  required /></p>
    <p>Mot de passe : <input type="password" name="password"  required /></p>
     <p><input type="submit" value="Valider" /></p>
     <p><input type="hidden"  value="login" name="todo" /> </p>
     
     
EOS;
}

function printLogoutForm($askedpage) {
    echo <<<EOS
     <form action="index.php?page=$askedpage" method="post">
   <p><input type="hidden"  value="logout" name="todo" /> </p>
     <p><input type="submit" value="Se déconnecter" /></p>
EOS;
}

function printRegisterForm() {
    echo <<<EOS
     <form action="register.php" method="post"
      oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
 <p>
  <label for="id">Pseudo : </label>
  <input id="login" type=text required name=id>
 </p>
     <p>
  <label for="nom">Nom :</label>
  <input id="text" type=text required name=nom>
 </p>
     <p>
  <label for="prenom">Prénom : </label>
  <input id="text" type=text required name=prenom>
 </p>
 <p>
  <label for="password1">Mot de passe :</label>
  <input id="password1" type=password required name=up>
 </p>
 <p>
  <label for="password2">Confirmer le mot de passe :</label>
  <input id="password2" type=password name=up2>
 </p>
     <p>
  <label for="statut">Statut : </label>
  <input id="text" type=integer required name=statut>
 </p>
     <p>
  <label for="section">Section : </label>
  <input id="text" type=text required name=section>
 </p>
     <p>
  <label for="promotion">Promotion : </label>
  <input id="text" type=text required name=section>
 </p>
  <input type=submit value="Créer votre compte">
</form>
 
     
EOS;
}

function printchangeRegisterForm() {
    echo <<<EOS
     <form action="changePassword.php?todo=..." method="post"
      oninput="newpassword2.setCustomValidity(newpassword2.value != newpassword.value ? 'Les nouveaux mots de passe diffèrent.' : '')">
 <p>
  <label for="login">login:</label>
  <input id="login" type=text required name=login>
 </p>
 <p>
  <label for="email">Ancien MDP:</label>
  <input id="text" type=password required name=password>
 </p>
 <p>
  <label for="newpassword">New Password:</label>
  <input id="newpassword" type=password required name=newpassword>
 </p>
 <p>
  <label for="password2">Confirm new password:</label>
  <input id="password2" type=password name=newpassword2>
 </p>
  <input type=submit value="Submit">
</form>
 
     
EOS;
}

function printdeleteUser() {
    echo <<<EOS
     <form action="deleteUser.php?todo=..." method="post">
 <p>
  <label for="login">login:</label>
  <input id="login" type=text required name=login>
 </p>
 <p>
  <label for="mdp">Mot de passe</label>
  <input id="text" type=password required name=password>
 </p>
  <input type=submit value="Submit">
</form>
 
     
EOS;
}

//Formulaire pour les voyages 

function printRegisterFormV() {
    echo <<<EOS
     <form action="index.php?page=respovos" method="post">
     
 <p>
  <label for="id">Id :</label>
  <input id="login" type=text required name=id>
 </p>
     <p>
  <label for="nom">Nom :</label>
  <input id="text" type=text required name=nom>
 </p>
     <p>
  <label for="Promotion">Promotion :</label>
  <input id="text" type=text required name=promotion>
 </p>
     <p>
  <label for="Section">Section :</label>
  <input id="text" type=text required name=section>
 </p>
 <p>
  <label for="latitude">Latitude :</label>
  <input id="latitude" type=decimal required name=latitude>
 </p>
    <p>
  <label for="latitude">Longitude :</label>
  <input id="longitude" type=decimal required name=longitude>
 </p>
 <p>
  <label for="password2">Information :</label>
<input id="information" type=text name=information>
 </p>
      
 <input type=submit value="Submit">
</form>
     
 
     
EOS;
}
?>

