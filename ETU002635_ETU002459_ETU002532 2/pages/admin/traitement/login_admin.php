<?php
    require("../../../inc/function_admin.php");
    $user=loginAdmin($_POST['login'],$_POST['password']);
    if(count($user)==0){
        header('location: ../loginAdmin.php');
    }
    else{
        session_start();
        $utilisateur['nom']=$user[0]['nom'];
        $utilisateur['id_utilisateur']=$user[0]['id_admin'];
        $_SESSION['user']=$utilisateur;
        header('location: ../accueil_admin.php');
    }
?>