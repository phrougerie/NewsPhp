
/**
* Created by PhpStorm.
* User: phrougerie
* Date: 06/12/18
* Time: 09:19
*/
<html>




<body>
<?php
global $rep,$vues;
require($rep.$vues['preface']);

?>

<div class="container-fluid" id="contact">
    <div class="row contact" id="box-search">
        <div class="col-md-6 col-md-offset-3 contact2">
            <h2>Connection admin</h2>
            <form action="index.php?action=connect" method="post">
                <div class="form-group">

                    <label for="pseudo" >Pseudo : </label>
                    <input type="text" name="pseudo" class="form-control" />

                    <label for="mdp">Mdp : </label>
                    <input type="password" name="mdp" class="form-control"  />
                    <button type="submit" class="btn btn-default">Connect</button>

                </div>
            </form>

        </div>
    </div>
</div>




<?php



?>



</body>

</html>