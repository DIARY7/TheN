<?php
    include("../../../inc/function_utilisateur.php");
    header( "Content-Type: application/json"); 
    $date = $_POST["date"];
    $resultat = array();
    $resultat["prevision"] = get_tous_prevision($date);
    $parcelle = getSelect("select * from the_parcelle");
    for ($i=0; $i <count($parcelle) ; $i++) { 
        $resultat["parcelle"][$i] = get_prevision_by_parcelle($date,$parcelle[$i]["id_parcelle"]);
    }
    echo json_encode($resultat);
?>