<?php
    include("../../inc/function.php");
    $donnees=getAllDonnees("../../inc/config.xml");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salaire</title>
    <?php include("../link.html"); ?>
</head>
<body>
    <?php include("nav.php"); ?>
        <div class="container">
            <div class="row" style="margin-top: 5%;">
                <div class="col-md-3">

                </div>
                <div class="col-md-6" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);border-radius: 3%;padding: 3%;">
                    <form action="traitement/configuration.php" method="GET">
                        <div class="row">
                            <h3>Configuration</h3>
                            <div class="form-floating mb-3">
                                <input value="<?php echo $donnees['salaire']; ?>" class="form-control me-2" type="number" name="salaire" id="floatingInput" placeholder="salaire">
                                <label for="floatingInput">Salaire par kg</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-floating mb-3">
                                <input name="poid" value="<?php echo $donnees['poid']; ?>" type="number" class="form-control" id="floatingInput" placeholder="Poid min">
                                <label for="floatingInput">Poids minimale journaliere</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input value="<?php echo $donnees['bonus']; ?>" name="bonus" type="number" class="form-control" id="floatingPassword" placeholder="Bonus">
                                <label for="floatingPassword">Bonus</label>
                            </div>
                            <div class="form-floating">
                                <input value="<?php echo $donnees['mallus']; ?>" name="mallus" type="number" class="form-control" id="floatingPassword" placeholder="Mallus">
                                <label for="floatingPassword">Mallus</label>
                            </div>
                        </div>
                        <div class="row" style="display: grid;justify-content: center;margin-top: 5%;">
                            <button class="btn btn-outline-success" type="submit">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php include("../footer.php"); ?>
</body>
</html>