<?php
    include("../../../inc/function_utilisateur.php");
    header( "Content-Type: application/json"); 
    $poids = $_POST["poids"];
    $date = $_POST["date"];
    $id_cueilleur = $_POST["id_cueilleur"];
    $id_parcelle = $_POST["id_parcelle"];
    $max = get_poid_redement_parcelle($id_parcelle) - calcule_poid_cueilli_parcelle($id_parcelle,$date);
    if ($poids > $max ) {
        echo " le poids est superieur au kg de feuille restant sur la parcelle"; 
    }else{
        insert_cueillettes($id_cueilleur, $id_parcelle, $poids, $date);
        echo "success";  
    }
?>