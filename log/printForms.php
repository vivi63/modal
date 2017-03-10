<?php

 function printLoginForm($askedpage) {
        echo <<<EOS
     <form action='index.php' method="post" >
    <p>Login : <input type="text" name="login"  required /></p>
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
 
 function printRegisterForm(){
      echo <<<EOS
     <form action="register.php?todo=..." method="post"
      oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
 <p>
  <label for="login">login:</label>
  <input id="login" type=text required name=login>
 </p>
 <p>
  <label for="email">Email:</label>
  <input id="text" type=text required name=email>
 </p>
 <p>
  <label for="password1">Password:</label>
  <input id="password1" type=password required name=up>
 </p>
 <p>
  <label for="password2">Confirm password:</label>
  <input id="password2" type=password name=up2>
 </p>
  <input type=submit value="Create account">
</form>
 
     
EOS;
 }
 function printchangeRegisterForm(){
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
 function printdeleteUser(){
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
?>

