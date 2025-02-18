<?php
$host = 'localhost';
$dbname = 'rooteme';
$username = 'root';
$password = 'root';

date_default_timezone_set('Europe/Paris');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des challenges
    $stmt = $pdo->query("SELECT id,publication_date, challenge_name,level, points, category, author FROM challenges ORDER BY id DESC");
    $challenges = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
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
    <link rel="stylesheet" href="panel.css">
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

<fieldset class="challenge-card">
<legend>Panel Admin</legend>
<?php foreach ($challenges as $challenge):
    $formattedDate = DateTime::createFromFormat('Y-m-d H:i:s', $challenge['publication_date'])->format('H:i:s j/m/Y'); ?>
   
        
        
        <div class="challenge-info">
            <div class="toggle">
                <span><strong>Date :</strong> <?php echo htmlspecialchars($formattedDate); ?></span>
                <span><strong>Nom :</strong> <?php echo htmlspecialchars($challenge['challenge_name']); ?></span>
                <span><strong>Catégorie :</strong> <?php echo htmlspecialchars($challenge['category']); ?></span>
       
                <span><strong>Auteur :</strong> <?php echo htmlspecialchars($challenge['author']); ?></span>
                <a href="challenge.php?id=<?php echo $challenge['id']; ?>" class="btn-view">Voir le Challenge</a>
            </div>
        </div>
        <?php endforeach; ?>
    </fieldset>

    <script src="page.js"></script>

</body>
</html>
