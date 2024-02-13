<?php
    include_once("function.php");
     include("connexion.php");
     function getSelect($sql){
         $valiny=array();
         $all=mysqli_query(dbconnect(),$sql);
         while($bdd=mysqli_fetch_assoc($all))
         {
             $valiny[]=$bdd;
         }
         mysqli_free_result($all);
         return $valiny;
     }
     
    function loginutilisateur($login,$pasword){
         $user=getSelect("select * from the_utilisateur where login='".$login."'");
         if(count($user) != 0){
            if (strcmp($pasword,$user[0]['password'])==0) {
                return $user[0]['id_utilisateur'];
            }
            return 0;
         }
         else{
             return -1;
         }
    }

    function insert_cueillettes($id_cueilleur, $id_parcelle, $poids, $date) {
        $conn = dbconnect();
        $sql = "INSERT INTO the_cueillettes (id_cueilleur, id_parcelle, poids, date_cueillette) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt === false) {
            die("Erreur de préparation de la requête: " . mysqli_error($conn));
        }
        mysqli_stmt_bind_param($stmt, "iiis", $id_cueilleur, $id_parcelle, $poids, $date);
        $result = mysqli_stmt_execute($stmt);

        if ($result === false) {
            die("Erreur d'exécution de la requête: " . mysqli_error($conn));
        }
        
        return $result;
    }
    

    function insert_dépenses($id_categorie,$date,$montant) {
        $sql="INSERT INTO the_depense VALUES(NULL,'%s','%s','%s')";
		$sql=sprintf($sql,$id_categorie,$date,$montant);
		$resultat=mysqli_query(dbconnect(),$sql);
    }

    function calcule_total_depense(){
        $conn = dbconnect();
        $sql = "SELECT SUM(montant) AS somme FROM the_depense";
        $result = mysqli_query($conn, $sql);
        $somme = 0;
        while ($donnees = mysqli_fetch_assoc($result)) {
            $somme += $donnees['somme'];
        }
        
        return $somme;
    }

    function calcule_total_poid_cueilli() {
        $conn = dbconnect();
        $sql = "SELECT SUM(poids) AS somme,Count(id_cueilleur) nbrcueilleur FROM the_cueillettes";
        $result = mysqli_query($conn, $sql);
        $somme = array();
        $somme['somme'] = 0;
        $somme['nbrcueilleur'] = 0;
        while ($donnees = mysqli_fetch_assoc($result)) {
            $somme['somme'] += $donnees['somme'];
            $somme['nbrcueilleur'] = $donnees['nbrcueilleur'];
        }
        
        return $somme;
    }

    function calcule_total_cout_revient($salaire){
        $poids = calcule_total_poid_cueilli();
        $coutSalaire = $salaire * $poids["nbrcueilleur"] * $poids["somme"];
        $cout_revient = ($coutSalaire + calcule_total_depense()) / $poids["somme"];
        return $cout_revient;
    }

    function get_poid_redement_parcelle($id_parcelle){
        $nmbr = 0;
        $parcelle = getSelect("select * from the_parcelle where id_parcelle = ".$id_parcelle." ");
        $the = getSelect("select * from the_the where id_the = ".$parcelle[0]["id_the"]." ");
        $nmbr = ($parcelle[0]["surface"] / ($the[0]["occupation"] / 10000)) * $the[0]["rendement"];
        return $nmbr;
    }

    function calcule_poid_cueilli_parcelle($id_parcelle,$date) {
        $conn = dbconnect();
        $dates = new DateTime($date);
        $month = $dates->format('m');
        $year = $dates->format('Y');
        $sql = "SELECT SUM(poids) AS somme FROM the_cueillettes 
                where EXTRACT(MONTH FROM date_cueillette) = '$month' 
                AND EXTRACT(YEAR FROM date_cueillette) = '$year' and id_parcelle = ".$id_parcelle."";
        $result = mysqli_query($conn, $sql);
        $somme= 0;
        while ($donnees = mysqli_fetch_assoc($result)) {
            $somme += $donnees['somme'];
        }
        
        return $somme;
    }

    function get_tous_cueilli_parcelle($date){
        $cueillette = 0;
        $parcelle = getSelect("select * from the_parcelle");
        for($i =0 ; $i < count($parcelle) ;$i++){
            $cueillette += calcule_poid_cueilli_parcelle($parcelle[$i]['id_parcelle'],$date);
        }
        return $cueillette;
    }

    function get_redement_parcelle_date($date,$id_parcelle){
        $redement = 0;
        $dates = new DateTime($date);
        $month = $dates->format('m');
        $regeneration = getSelect("select * from the_regeneration where id_mois = ".$month."");
        if (count($regeneration) > 0) {
            $redement = get_poid_redement_parcelle($id_parcelle);
        }else {
            $redement = 0;
        }
        return $redement;
    }

    function get_prevision_by_parcelle($date,$id_parcelle){
        $prevision = array();
        $prevision['restant'] = get_redement_parcelle_date($date,$id_parcelle) - calcule_poid_cueilli_parcelle($id_parcelle,$date);
        $parcelle = getSelect("select * from the_parcelle where id_parcelle = ".$id_parcelle." ");
        $the = getSelect("select * from the_the where id_the = ".$parcelle[0]["id_the"]." ");
        $nmbr = $parcelle[0]["surface"] / ($the[0]["occupation"] / 10000);
        $prevision['pied'] = $nmbr;
        $prevision['surface'] = $parcelle[0]["surface"];
        $prevision['numero'] = $parcelle[0]["numero"];
        $prevision['nom'] = $the[0]["nom"];
        return $prevision;
    }

    function get_tous_prevision($date){
        $prevision = array();
        $prevision['tous_restant'] = calcule_tous_poids_restant($date, $date);
        $prevision['montant'] = get_vente($date, $date);
        return $prevision;
    }

    function get_tous_parcelle_date($date){
        $redement = 0;
        $parcelle = getSelect("select * from the_parcelle");
        for($i =0 ; $i < count($parcelle) ;$i++){
            $redement += get_redement_parcelle_date($date,$parcelle[$i]['id_parcelle']);
        }
        return $redement;
    }

    function get_total_cueillette_date($date1, $date2) {
        $conn = dbconnect();
        $sql = "SELECT SUM(poids) AS somme,Count(id_cueilleur) nbrcueilleur FROM the_cueillettes WHERE date_cueillette >= '".$date1."' AND date_cueillette =< '".$date2."'";
        $result = mysqli_query($conn, $sql);
        $somme = array();
        $somme['somme'] = 0;
        $somme['nbrcueilleur'] = 0;
        while ($donnees = mysqli_fetch_assoc($result)) {
            $somme['somme'] += $donnees['somme'];
            $somme['nbrcueilleur'] = $donnees['nbrcueilleur'];
        }
        
        return $somme;
    }
    

    function calcule_tous_poids_restant($date1, $date2) {
        $result = 0;
        $dateMin=new Datetime($date1);
        $dateMax=new Datetime($date2);
        while ($dateMin < $dateMax) {
            $rendement = get_tous_parcelle_date($dateMin->format('Y-m-d'));
            $stringe=$dateMin->format('Y-m-d');
            $cueillette = get_tous_cueilli_parcelle($stringe);
            $result += $rendement - $cueillette;
            $dateMin->modify('+1 month');
        }
        if ($date1 == $date2) {
            $rendement = get_tous_parcelle_date($date1);
            $cueillette = get_tous_cueilli_parcelle($date1);
            $result += $rendement - $cueillette;
        }
        return $result;
    }
    
    function calcule_total_depense_date($date1, $date2) {
        $conn = dbconnect();
        $sql = "SELECT SUM(montant) AS somme FROM the_depense where '".$date1."'<=date_depense and date_depense<='".$date2."'";
        $result = mysqli_query($conn, $sql);
        $somme = 0;
        while ($donnees = mysqli_fetch_assoc($result)) {
            $somme += $donnees['somme'];
        }
        
        return $somme;
    }
    
    function get_vente($date1, $date2){
        $cueillette = getSelect("select sum(poids*prix_vente) as vente from the_parcelle natural join the_the natural join the_cueillettes where '".$date1."'<=date_cueillette and date_cueillette<='".$date2."'");
        return $cueillette[0]['vente']; 
    }
    function calcule_benefice($date1,$date2){
        $benefice=getSelect("select sum(poids)*prix_vente as benefice,id_the from the_cueillettes natural join the_parcelle natural join the_the where '".$date1."'<=date_cueillette and date_cueillette<='".$date2."' group by id_the");
        return $benefice[0]['benefice']-calcule_total_cout_revient_date($date1,$date2);
    }
    function calcule_total_cout_revient_date($date1, $date2){
        $poids = get_total_cueillette_date($date1, $date2);
        $all=getAllDonnees("../../../inc/config.xml");
        //select sum(poids) as poid_total,date_cueillette,id_cueilleur from cueillettes natural join cueilleurs where '2024-01-01'<=date_cueillette and date_cueillette<='2024-02-29' group by date_cueillette, id_cueilleur;
        $coutSalaire=getSelect("select sum(poids) as poid_total,date_cueillette,id_cueilleur from the_cueillettes natural join the_cueilleurs where '".$date1."'<=date_cueillette and date_cueillette<='".$date2."' group by date_cueillette, id_cueilleur");
        $salaireEmp=0;
        for($i=0;$i<count($coutSalaire);$i++){
            $salaire=0;
            if($coutSalaire[$i]['poid_total']>$all['poid']){
                $salaire=$coutSalaire[$i]['poid_total']*$all['salaire'];
                $salaire=$salaire+(($salaire*$all['bonus'])/100);
            }
            else if($coutSalaire[$i]['poid_total']<$all['poid']){
                $salaire=$coutSalaire[$i]['poid_total']*$all['salaire'];
                $salaire=$salaire-(($salaire*$all['mallus'])/100);
            }
            else{
                $salaire=$coutSalaire[$i]['poid_total']*$all['salaire'];
            }
            $salaireEmp+=$salaire;
        }
        
        $cout_revient = ($salaireEmp + calcule_total_depense_date($date1, $date2)) / $poids["somme"];
        return $cout_revient;
    }
    function getPaiments($date1,$date2){
        $reponse=getSelect("select sum(poids) as poid_total,date_cueillette,id_cueilleur,nom from the_cueillettes natural join the_cueilleurs where '".$date1."'<=date_cueillette and date_cueillette<='".$date2."' group by date_cueillette, id_cueilleur");
        $all=getAllDonnees("../../../inc/config.xml");
        for($i=0;$i<count($reponse);$i++){
            $poids=$reponse[$i]['poid_total'];
            $salaire=0;
            $bonus=0;
            $mallus=0;
            if($poids>$all['poid']){
                $salaire=$poids*$all['salaire'];
                $salaire=$salaire+(($salaire*$all['bonus'])/100);
                $bonus=$all['bonus'];
            }
            else if($poids<$all['poid']){
                $salaire=$poids*$all['salaire'];
                $salaire=$salaire-(($salaire*$all['mallus'])/100);
                $mallus=$all['mallus'];
            }
            else{
                $salaire=$poids*$all['salaire'];
            }
            $reponse[$i]['paiement']=$salaire;
            $reponse[$i]['mallus']=$mallus;
            $reponse[$i]['bonus']=$bonus;
        }
        return $reponse;
    }
?>