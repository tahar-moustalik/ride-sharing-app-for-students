<?php
$query = DB::table('utilisateur')
        ->where('utilisateur.id_user', '=',$_GET['usr'])
        ->first();
if($query->etat_verif===0){
?>
<label class="material-icons" style="padding-top:20%;color:red">report_problem</label>
<?php
}
?>
