<!DOCTYPE html>
<html lang="en">
<head>
    <title>Presentation</title>
    <?php include("../link.html") ?>
    <style>
            body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.presentation-container {
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 800px;
    margin: 50px auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    overflow: hidden;
}

.image-container img {
    max-width: 100%;
    height: auto;
}

.text-container {
    padding: 20px;
    text-align: left;
    transition: transform 0.5s ease-in-out;
}

@media (max-width: 768px) {
    .presentation-container {
        flex-direction: column;
    }

    .text-container {
        padding: 20px;
    }
}

.presentation-container:hover .text-container {
    transform: translateX(20px);
}
        
    </style>
</head>
<body>
    <?php
        include("nav.php");
    ?>
    <div class="presentation-container">
        <div class="image-container">
            <img src="../../image/accueil2.jpg" alt="Presentation Image">
        </div>
        <div class="text-container">
            <h2>Title</h2>
            <p>Bienvenue utilisateur.</p>
        </div>
    </div>
    <?php
        include("../footer.php");
    ?>
</body>
</html>
