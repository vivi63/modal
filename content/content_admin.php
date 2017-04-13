<script>
    $(document).ready(function () {
            $("#A").hide();
            $("#B").hide();
        
        $("#aa").click(function () {
            $("#A").show();
            $("#B").hide();
        });
        $("#bb").click(function () {
            $("#B").show();
            $("#A").hide();
        })

    }
    )

</script>

<?php

echo <<<EOS
<button id="aa">Supprimer un utilisateur</button>
<button id="bb">Supprimer un voyage</button>
EOS;

echo <<<EOS
<div id="A" >
EOS;
printFormDeleteUser();
echo "</div>";

echo <<<EOS
<div id="B" >
EOS;
printFormDeleteVoyage();
echo "</div>";



if (isset($_POST["idu"]) && $_POST["idu"] != ""){
        $id=$_POST["idu"];
        $query = "DELETE FROM `utilisateur` WHERE `id`='$id'";
         $sth = $dbh->prepare($query);
         $request_succeeded = $sth->execute();
         echo "<br>";
         echo "<h4>"."Suppression du compte effectuée"."</h4>";
          
         
}
if (isset($_POST["idv"]) && $_POST["idv"] != ""){
        $id=$_POST["idv"];
        $query = "DELETE FROM `voyage` WHERE `id`='$id'";
         $sth = $dbh->prepare($query);
         $request_succeeded = $sth->execute();
         echo "<br>";
          echo "<h4>"."Suppression du voyage effectuée"."</h4>";
        
}
        


?>