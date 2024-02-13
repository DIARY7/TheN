<?php
    function getSalaireParKg($file){
        //Prendre la fichier config.xml
        $config=simplexml_load_file($file);

        //recuperation de la valeur salaire
        return (float)$config->salaire;
    }

    function getPoidsMinJour($file){
        //Prendre la fichier config.xml
        $config=simplexml_load_file($file);

        //recuperation de la valeur salaire
        return (float)$config->poid_min;
    }

    function getBonus($file){
        //Prendre la fichier config.xml
        $config=simplexml_load_file($file);

        //recuperation de la valeur salaire
        return (float)$config->bonus;
    }
    
    function getMallus($file){
        //Prendre la fichier config.xml
        $config=simplexml_load_file($file);

        //recuperation de la valeur salaire
        return (float)$config->mallus;
    }

    function getAllDonnees($file){
        //Prendre la fichier config.xml
        $config=simplexml_load_file($file);
        $reponse['salaire']=(float)$config->salaire;
        $reponse['poid']=(float)$config->poid_min;
        $reponse['bonus']=(float)$config->bonus;
        $reponse['mallus']=(float)$config->mallus;
        return $reponse;
    }
?>