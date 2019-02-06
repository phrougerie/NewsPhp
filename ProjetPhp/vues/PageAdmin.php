
/**
 * Created by PhpStorm.
 * User: phrougerie
 * Date: 13/12/18
 * Time: 09:34
 */

<html>




<body>

<?php
global $rep,$vues;
require($rep.$vues['preface']);

?>
<h2>Page admin</h2>

<div class="container-fluid" id="contact" class="admin">
    <div class="row contact" id="box-search">
        <div class="col-md-6 col-md-offset-3 contact2">
            <form action="index.php?action=modifLigne" method="post">
                <div class="form-group">
                    <label for="nbL">Nombre de lignes : </label>
                    <input type="number" name="nbL" class="form-control" min=1 max=99  />

                </div>
                <button type="submit" class="btn btn-default">Valider</button>

            </form>
            <form action="index.php?action=addFlux" method="post">
                <div class="form-group">

                    <label for="txtUrlSite" >Lien vers le site de référence : </label>
                    <input type="url" name="txtUrlSite" class="form-control" />

                    <label for="txtFlux">Lien du flux : </label>
                    <input type="url" name="txtFlux" class="form-control"  />
                    <button type="submit" class="btn btn-default">Valider</button>

                </div>
            </form>

        </div>
    </div>
</div>





</body>

</html>