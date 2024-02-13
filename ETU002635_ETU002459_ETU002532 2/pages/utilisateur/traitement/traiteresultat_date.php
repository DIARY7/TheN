<?php
    include("../../../inc/function_utilisateur.php");
    header( "Content-Type: application/json"); 
    $date1 = $_POST["datemin"];
    $date2 = $_POST["datemax"];
    $resultat = array();
    $resultat['cueillette'] = get_total_cueillette_date($date1, $date2);
    $resultat['restant'] = calcule_tous_poids_restant($date1, $date2);
    $resultat['depense'] = calcule_total_depense_date($date1, $date2);
    $resultat['vente'] = get_vente($date1, $date2);
    $resultat['benefice'] = calcule_benefice($date1,$date2);
    $resultat['revient'] = calcule_total_cout_revient_date($date1, $date2);
    echo json_encode($resultat);
?>