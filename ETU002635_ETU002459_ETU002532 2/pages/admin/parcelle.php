<?php
    include("../../inc/function_admin.php");
    $the=getThe();
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
                <h4>Insertion de Parcelle</h4>
                <form action="traitement/insertion_parcelle.php" method="get" id="formulaire">
                    <div class="form-floating mb-3">
                        <input id="numero" type="number" class="form-control" name="numero" id="floatingInput" placeholder="Numero">
                        <label for="floatingInput">Numero</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="surface" type="number" class="form-control" name="surface" id="floatingInput" placeholder="Surface">
                        <label for="floatingInput">Surface</label>
                    </div>
                    <select id="the" name="the" class="form-select" aria-label="Default select example">
                        <option value="" selected>The</option>
                        <?php
                            for($i=0;$i<count($the);$i++){
                        ?>
                            <option value="<?php echo $the[$i]['id_the']; ?>"><?php echo $the[$i]['nom']; ?></option>
                        <?php }?>
                    </select>
                    <button style="margin-top: 5%;" type="submit" class="btn btn-outline-primary">Inserer</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="script.js"></script>
<script>
    getDonneesBase("traitement/get_parcelle.php",showParcelle);
    window.addEventListener('load',sendForm("traitement/insertion_parcelle.php","formulaire",getDonneesBase,"traitement/get_parcelle.php",showParcelle));
</script>
</html>