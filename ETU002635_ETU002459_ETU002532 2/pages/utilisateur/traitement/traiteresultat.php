<?php
    include("../../../inc/function_utilisateur.php");
    header( "Content-Type: application/json"); 
    $date1 = $_POST["datemin"];
    $date2 = $_POST["datemax"];
    $resultat = array();
    $resultat['cueillette'] = calcule_total_poid_cueilli();
    $resultat['restant'] = calcule_tous_poids_restant($date1,$date2);
    $salaire = getSalaireParKg("../../../inc/config.xml");
    $resultat['revient'] = calcule_total_cout_revient($salaire);
    echo json_encode($resultat);
?>
