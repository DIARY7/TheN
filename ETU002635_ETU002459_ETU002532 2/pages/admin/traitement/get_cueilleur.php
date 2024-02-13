<?php
    include("../../../inc/function_admin.php");
    header( "Content-Type: application/json");
    $retour=getCueilleur();
    if(isset($_GET['but'])){
        deleteCueilleur($_GET['id']);
    }
    echo json_encode($retour);
?>