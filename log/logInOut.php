<?php
class Utilisateur {

                public $login;
                public $mdp;
                public $nom;
                public $prenom;
                public $promotion;
                public $naissance;
                public $email;
                public $feuille;

                public function __toString() {
                    echo "<a href='http://localhost/TD3/SQL.php?page=$this->login'>"."Voir ses amis"."</a>";
                    return '[' . "$this->login" . ']' . " " . "$this->prenom" . " " . $this->nom . " né le " . $this->naissance . ", X" . "$this->promotion" . " " . "$this->email" . "<br>";
                    
                }

                public static function getUtilisateur($dbh, $login) {

                    $query = "SELECT * FROM `utilisateurs` WHERE `login`='$login'";
                    $sth = $dbh->prepare($query);
                    $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
                    $sth->execute();
                    $user = $sth->fetch();
                    $sth->closeCursor();
                    return $user;
                }

        

      

                public static function testerMdp($dbh, $login, $mdp) {
                    $query = "SELECT * FROM `utilisateurs` WHERE `login`='$login'";
                    $sth = $dbh->prepare($query);
                    $request_succeeded = $sth->execute();
                    while ($courant = $sth->fetch(PDO::FETCH_ASSOC)) {
                        if ($courant['mdp'] == sha1($mdp)) {
                            return TRUE;
                        } else {
                            return FALSE;
                        }
                    }
                }
                public static function logIn($dbh){
                    if((isset($_POST["login"]) && (isset($_POST["password"])))){
                        $login=$_POST["login"];
                        $user= Utilisateur::getUtilisateur($dbh,$login);
                        if(($user!=NULL)&&(Utilisateur::testerMdp($dbh,$login,$_POST["password"]))){
                            $_SESSION['loggedIn']=" ";
                            echo 'Bonjour '.$_POST["login"];
                            
                        }
                    }
                }
                
                public static function logOut(){
                    unset($_SESSION['loggedIn']);
                    session_destroy();
                }
}

               
?>

