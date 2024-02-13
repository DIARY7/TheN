<?php
    include("../../../inc/function_utilisateur.php");
    header( "Content-Type: application/json"); 
    $date1 = $_POST["datemin"];
    $date2 = $_POST["datemax"];
    $resultat = getPaiments($date1,$date2);
    echo json_encode($resultat);
?>