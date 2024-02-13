<?php
    $mois=array();
    $mois[0]="Jan";
    $mois[1]="Fev";
    $mois[2]="Mar";
    $mois[3]="Avr";
    $mois[4]="Mai";
    $mois[5]="Jun";
    $mois[6]="Jul";
    $mois[7]="Aou";
    $mois[8]="Sep";
    $mois[9]="Oct";
    $mois[10]="Nov";
    $mois[11]="Dec";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../link.html"); ?>
    <title>Formulaire the</title>
</head>
<body>
    <?php include("nav.php"); ?>
    <div class="container">
        <div class="row" style="margin-top: 5%;">
            <div class="col-md-6" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);border-radius: 5%;padding: 3%;">
                <table class="table table-hover" id="donnees">

                </table>
            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-5" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);border-radius: 5%;padding: 3%;">
                <h4>Insertion de the</h4>
                <form id="formulaire">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nom" id="floatingInput" placeholder="Nom">
                        <label for="floatingInput">Nom</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="occupation" id="floatingInput" placeholder="Occupation">
                        <label for="floatingInput">Occupation</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="rendement" id="floatingInput" placeholder="Rendement">
                        <label for="floatingInput">Rendement</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="vente" id="floatingInput" placeholder="Rendement">
                        <label for="floatingInput">Prix de vente</label>
                    </div>
                    <div class="row">
                        <?php
                            for($i=0;$i<6;$i++){
                        ?>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input name="mois<?php echo $i; ?>" class="form-check-input" type="checkbox" value="<?php echo ($i+1); ?>" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <?php echo $mois[$i]; ?>
                                </label>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="row">
                        <?php
                            for($i=6;$i<12;$i++){
                        ?>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input name="mois<?php echo $i; ?>" class="form-check-input" type="checkbox" value="<?php echo ($i+1); ?>" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <?php echo $mois[$i]; ?>
                                </label>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <button style="margin-top: 5%;" type="submit" class="btn btn-outline-primary">Inserer</button>
                </form>
            </div>
        </div>
    </div>
    <?php include("../footer.php"); ?>
</body>
<script src="script.js"></script>
<script>
    getDonneesBase("traitement/get_the.php",showThe);
    window.addEventListener('load',sendForm("traitement/insertion_the.php","formulaire",getDonneesBase,"traitement/get_the.php",showThe));
</script>
</html>