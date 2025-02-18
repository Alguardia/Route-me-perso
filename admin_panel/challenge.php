<?php
require 'fetch.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Me</title>
    <!-- Press Start 2P pour titre menu -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <!-- Dangerbot pour titre site -->
    <link href="https://fonts.cdnfonts.com/css/dangerbot" rel="stylesheet">
    <!-- 'Pixel Sans Serif', sans-serif pour ecriture -->
    <link href="https://fonts.cdnfonts.com/css/pixel-sans-serif" rel="stylesheet">
    <!-- "Iceland", serif pour carte  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Iceland&display=swap" rel="stylesheet">
    <!-- 'blooop', sans-serif pour menu  -->
    <link href="https://fonts.cdnfonts.com/css/blooop" rel="stylesheet">
    <link rel="stylesheet" href="page.css">
    <link rel="icon" type="image.png" href="rt_logo.png">
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</head>
<body>
<header>
    <div class="header-left">
        <a href="acceuil.html">
            <img src="rt_logo.png" alt="Logo" class="logo">
        </a>
        <h1 class="site-title">Route Me</h1>
    </div>
    <nav>
        <ul>
            <li><a href="/pages/outils/outils.html" target="_blank">Outils</a></li>
            <li><a href="/pages/equipe/equipe.html" target="_blank">L'equipe</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#" id="logout">Logout</a></li>
        </ul>
    </nav>
</header>
<div class="container">
<h1><?php echo $challengeName; ?></h1>
<?php if (isset($errorMessage)): ?>
    <p style="color: red;"><?php echo $errorMessage; ?></p>
<?php else: ?>
    <div>
    <fieldset>
    <legend>Informations Générales</legend>
    <div class="categorie">
        <span class='point'>
        <p><?php echo $points,' Points'; ?></p>
</span>
       
        <p><strong>Catégorie :</strong> <?php echo $category; ?></p>
        <p><strong>Niveau :</strong></p>
<div class="level-wrapper">
    <div class="level-container">
        <?php 
        $levels = ["Très Facile", "Facile", "Moyen", "Difficile", "Très Difficile"];
        foreach ($levels as $lvl) {
            echo '<div class="level ' . ($level == $lvl ? 'selected' : '') . '" data-level="' . $lvl . '"></div>';
        }
        ?>
    </div>
</div>
    <div class="creation">
        <p><strong>Auteur : </strong> <?php echo $author; ?></p>
        <p><strong>Date de publication : </strong> <?php echo $formattedDate; ?></p>
        <p><strong>Lien du challenge : </strong><a class="lien_rootme" href="<?php echo htmlspecialchars($link_rm); ?>"><?php echo $challengeName; ?></a></p>

    </div>
    </div>
    </fieldset>    
    </div>

    <div> 
    <fieldset>
    <legend>Énoncé du Challenge</legend>   
        <p><?php echo nl2br($challengeStatement); ?></p>
    </fieldset>
    </div>

    <fieldset class="fieldtool">
    <legend>Outils Utilisés</legend>
    <div class="tool-list">
        <?php
        if (!empty($toolArray)) {
            echo "<ul>";
            foreach ($toolArray as $tool) {
                echo "<li>" . htmlspecialchars($tool) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Aucun outil trouvé.</p>";
        }
        ?>
    </div>
</fieldset>

    
    
        <div class="hints-container">
        <fieldset class="fieldhint">
        <legend>Indices</legend>
        <?php
if (isset($hintArray) && !empty($hintArray)) {
    foreach ($hintArray as $index => $hint) {
        echo '<div class="hint">';
        echo '<button class="hint-toggle">Indice ' . ($index + 1) . '</button>';
        echo '<div class="hint-content" style="display:none;">' . htmlspecialchars($hint) . '</div>';
        echo '</div>';
    }
} else {
    echo 'Aucun indice trouvé.';
}
?>
        </fieldset>
        </div>
    </div>
<?php endif; ?>

<script src="page.js"></script>


<footer>
        <p>© Route Me | Tout droits réservés</p>
    </footer>


</body>
</html>


   

</body>
</html>
