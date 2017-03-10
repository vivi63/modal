

<?php

function generate() {
    echo <<<EOS
 
        <p> Le premier tour de l'élection présidentielle voit s'affronter quatre candidats. Vous avez la possibilité de découvrir leur programme de manière inédite sur ce site.  </p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <a href="http://www.enseignement.polytechnique.fr/informatique/profs/Olivier.Serre/Bootstrap/" class="thumbnail">
                        <img src="pic\FF.jpg" classe="img-rounded" alt="François Fillon"  />
                        <button type="button" class="btn">François Fillon</button>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="http://www.enseignement.polytechnique.fr/informatique/profs/Olivier.Serre/Bootstrap/" class="thumbnail">
                        <img src="pic\BH.jpg" classe="img-rounded" alt="Benoit Hamon"   />
                        
                        <button type="button" class="btn">Benoit Hamon</button>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="http://www.enseignement.polytechnique.fr/informatique/profs/Olivier.Serre/Bootstrap/" class="thumbnail">
                        <img src="pic\JM.jpg" classe="img-rounded" alt="Jean-Luc Mélenchon"  />
                        <button type="button" class="btn">Jean-Luc Mélenchon</button>
                    </a>

                </div>  
            </div> 
            <div class="row">
                <div class="col-md-4">
                    <a href="http://www.enseignement.polytechnique.fr/informatique/profs/Olivier.Serre/Bootstrap/" class="thumbnail">
                        <img src="pic\EM.jpg" classe="img-rounded" alt="Emmanuel Macron"  />
                        <button type="button" class="btn">Emmanuel Macron</button>
                    </a>


                </div>  
            </div> 
        </div>
 
EOS;
}
?>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

