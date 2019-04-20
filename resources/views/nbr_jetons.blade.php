<?php
$query = DB::table('solde')
        ->where('solde.id_user', '=',$_GET['usr'])
        ->first();
echo $query->nbre_jeton;
 ?>
