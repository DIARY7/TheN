<?php
    include("../../../inc/function_admin.php");
    header( "Content-Type: application/json");
    $retour=getThe();
    echo json_encode($retour);
?>