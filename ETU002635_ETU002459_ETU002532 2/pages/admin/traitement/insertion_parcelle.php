<?php
    include("../../../inc/function_admin.php");
    
    //intialisation du test d'erreur
    $error=false;
    for($i=0;$i<3;$i++){
        $erreur[$i]=0;
    }
    $valeur[0]=$_POST['numero'];
    $valeur[1]=$_POST['surface'];
    $valeur[2]=$_POST['the'];

    //analyse des donnees
    for($i=0;$i<count($valeur);$i++){
        if($valeur[$i]==""){
            $error=true;
            $erreur[$i]=1;
        }
    }

    //renvoi vers le formulaire si il y a erreur sinon insertion
    if($error){
        $string=implode(",",$erreur);
        $value=implode(",",$valeur);
        echo "erreur";
        //header('location: ../insertion_parcelle.php?error='.$string.'&value='.$value);
    }
    else{
        if(isset($_POST['but'])){
            updateParcelle($_POST['numero'],$_POST['surface'],$_POST['the'],$_POST['id_parcelle']);
            echo "Modification reussi";
        }
        else{
            insertParcelle($_POST['numero'],$_POST['surface'],$_POST['the']);
            echo "Insertion effecute";
        }
        //header('location: ../insertion_parcelle.php');
    }
?>