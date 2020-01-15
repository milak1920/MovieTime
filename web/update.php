<?php

require('../mysqli_connect.php');

$q = "update armchairs set image = '".$_POST['imagen']."' where armchair_id='".$_POST['idP']."'";

$r = @mysqli_query($dbm, $q);

?>
