<?php
    include("../../../inc/function_utilisateur.php");

    $login = $_POST['login'];
    $password = $_POST['password'];

    $id = loginutilisateur($login,$password);

    if ($id > 0) {
        header("location:../accueil_utilisateur.php?id=".$id);
    }else{
        header("location:../login_utilisateur.php?erreur=".$id);
    }

?>