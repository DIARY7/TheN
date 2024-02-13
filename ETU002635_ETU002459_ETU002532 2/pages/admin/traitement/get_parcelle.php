<?php
    include("../../../inc/function_admin.php");
    header( "Content-Type: application/json");
    $retour = getParcelle();
    echo json_encode($retour);
?>