<?php

// Formulaires liés aux utilisateurs et aux voyages

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
     <form action="index.php?page=inscription" method="post"
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
       <label for="statut">Statut :</label>
       <select name="statut" id="statut">
           <option value="0">Elève</option>
           <option value="1">Respo VOS</option>                  
</select>
   </p>
   <p>
  <label for="section">Section : </label>
  <select name="section" id="section">
           <option value="volley">Volley</option>
           <option value="natation">Natation</option>
           <option value="football">Football</option>
           <option value="ultimate">Ultimate</option>
           <option value="boxe">Boxe</option>
           <option value="aviron">Aviron</option>
           <option value="rugby">Rugby</option>
           <option value="escrime">Escrime</option>
           <option value="judo">Judo</option>
           <option value="raid">Raid</option>
           <option value="raid">Escalade</option>               
    </select>
    </p>
     <p>
  <label for="section">Promotion : </label>
   <select name="promotion" id="promotion">
           <option value="2017">2017</option>
           <option value="2016">2016</option>
           <option value="2015">2015</option>
           <option value="2014">2014</option>
           <option value="2013">2013</option>                  
</select>
 </p>
  <p><input type=submit value="Créer votre compte"></p>
</form>   
EOS;
}

function printchangeRegisterForm() {
    echo <<<EOS
    <form action = "index.php?page=account" method = "post"
    oninput = "newpassword2.setCustomValidity(newpassword2.value != newpassword.value ? 'Les nouveaux mots de passe diffèrent.' : '')">
    <p>
    <label for = "login">Pseudo :</label>
    <input id = "login" type = text required name = id>
    </p>
    <p>
    <label for = "email">Ancien mot de passe :</label>
    <input id = "text" type = password required name = password>
    </p>
    <p>
    <label for = "newpassword">Nouveau mot de passe :</label>
    <input id = "newpassword" type = password required name = newpassword>
    </p>
    <p>
    <label for = "password2">Confirmer le mot de passe :</label>
    <input id = "password2" type = password name = newpassword2>
    </p>
    <p><input type = "hidden" value = "change" name = "todo" /> </p>
    <input type = submit value = "Submit">
    </form >
EOS;
}

function printdeleteUser() {
    echo <<<EOS
    <form action = "index.php?page=account" method = "post">
    <p>
    <label for = "login">Pseudo :</label>
    <input id = "login" type = text required name = id>
    </p>
    <p>
    <label for = "mdp">Mot de passe :</label>
    <input id = "text" type = password required name = password>
    </p>
    <p><input type = "hidden" value = "delete" name = "todo" /> </p>
    <input type = submit value = "Submit">
    </form >
EOS;
}

//Formulaire pour les voyages 

function printRegisterFormV($promotion, $section) {
    echo <<<EOS
    <form action = "index.php?page=respovos" method = "post">
    <p>
    <label for = "nom">Pays :</label>
    <input id = "text" type = "text" required name = "nom">
    </p>
    <p>
    <label for = "Promotion">Promotion :</label>
    <input id = "text" type = "TEXT" name = "promotion" value = "$promotion" readonly = "readonly">
    </p>
    <p>
    <label for = "Section">Section :</label>
    <input id = "text" type = "text" required name = "section" value = "$section" readonly = "readonly">
    </p>
    <p>
    <label for = "latitude">Latitude :</label>
    <input id = "latitude" type = "text" required name = "latitude" readonly = "readonly">
    </p>
    <p>
    <label for = "latitude">Longitude :</label>
    <input id = "longitude" type = "text" required name = "longitude" readonly = "readonly">
    </p>
    <p>
    <label for = "information">Information :</label>
    <textarea name = "information" rows = "10" cols = "90" n></textarea>
    </p>

    <input type = submit value = "Soumettre">
    </form >
EOS;
}

function printSearchForm() {
    echo <<<EOS
    <form action = "index.php?page=destinations" method = "post">
    <p>
    <label for = "id">Id du voyage :</label>
    <input id = "id" type = text required name = id>
    </p>
    <input type = submit value = "Voir les informations">
    </form >
EOS;
}

function printSearchFormSection() {
    echo <<<EOS
    <form action = "index.php?page=destinations" method = "post">
    <p>
    <label for = "section">Section : </label>
    <select name = "section" id = "section">
    <option value = "volley">Volley</option>
    <option value = "natation">Natation</option>
    <option value = "football">Football</option>
    <option value = "ultimate">Ultimate</option>
    <option value = "boxe">Boxe</option>
    <option value = "aviron">Aviron</option>
    <option value = "rugby">Rugby</option>
    <option value = "escrime">Escrime</option>
    <option value = "judo">Judo</option>
    <option value = "raid">Raid</option>
    <option value = "raid">Escalade</option>
    </select>
    </p>
    <input type = submit value = "Rechercher">
    </form >
EOS;
}

function printSearchFormPromotion() {
echo <<<EOS
    <form action = "index.php?page=destinations" method = "post">
    <p>
    <label for = "section">Promotion : </label>
    <select name = "promotion" id = "promotion">
    <option value = "2017">2017</option>
    <option value = "2016">2016</option>
    <option value = "2015">2015</option>
    <option value = "2014">2014</option>
    <option value = "2013">2013</option>
    </select>
    </p>
    <input type = submit value = "Rechercher">
    </form >
EOS;
}

function printFormDeleteUser(){
    echo <<<EOS
    <form action = "index.php?page=admin" method = "post">
    <p>
    <label for = "idu">Pseudo de l'utilisateur à supprimer :</label>
    <input id = "text" type = "text" required name = "idu">
    </p>
    <input type = submit value = "Supprimer">
    </form >
EOS;
}

function printFormDeleteVoyage(){
    echo <<<EOS
    <form action = "index.php?page=admin" method = "post">
    <p>
    <label for = "idv">Id du voyage à supprimer :</label>
    <input id = "text" type = "text" required name = "idv">
    </p>
    <input type = submit value = "Supprimer">
    </form >
EOS;
}
?>

