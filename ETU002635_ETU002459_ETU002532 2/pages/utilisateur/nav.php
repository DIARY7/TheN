
<style>
    body {
        background-color: #f8f9fa; /* Couleur de fond légère */
    }
    .navbar {
        background-color: #343a40; /* Couleur de fond de la barre de navigation */
    }
    .navbar-dark .navbar-brand {
        color: #f8f9fa; /* Couleur du texte du logo */
        font-weight: bold;
    }
    .navbar-dark .navbar-brand .logo-icon svg {
        fill: #f8f9fa; /* Couleur du logo */
    }
    .navbar-dark .navbar-brand .logo-text {
        color: #00885a; /* Couleur du texte du logo */
        font-weight: bold;
    }
    .navbar-dark .navbar-nav .nav-link {
        color: #f8f9fa; /* Couleur des liens de navigation */
        margin: 0 10px;
    }
    .navbar-dark .navbar-toggler-icon {
        background-color: #00885a; /* Couleur de l'icône du bouton de navigation */
    }
    .navbar-dark .navbar-toggler {
        border-color: #00885a; /* Couleur de la bordure du bouton de navigation */
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="accueil_utilisateur.php">
            <span class="logo-icon"><i class="fas fa-coffee"></i></span>
            <span class="logo-text">Tea<span style="color:#00885a;">Production</span></span>
        </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="cueillette.php">Cueillettes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="depenses.php">Depenses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="resultats.php">Resultats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="resultats_Date.php">Resultats avec Date</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste_paiements.php">Paiements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="prevision.php">Prevision</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../deconnexion.php">Deconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>