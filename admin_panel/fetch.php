<?php
date_default_timezone_set('Europe/Paris');
// Configuration de la base de données
$host = 'localhost';
$dbname = 'rooteme';
$username = 'root';
$password = 'root';

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // Requête préparée pour récupérer le challenge par ID
        $stmt = $pdo->prepare("SELECT * FROM challenges WHERE id = ?");
        $stmt->execute([$id]);
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            // On récupère les données du challenge
            $challengeName = $row['challenge_name'];
            $points = $row['points'];
            $category = $row['category'];
            $level = $row['level'];
            $author = $row['author'];
            $link_rm = $row['link'];
            $publicationDate = $row['publication_date'];
            $challengeStatement = $row['challenge_statement'];
            $tools = $row['tool_name'];
            $hints = $row['hint_description'];

            // Découpe des indices en utilisant une expression régulière pour capturer les textes entre les séparateurs '|'
            preg_match_all('/\|[0-9]+\|([^|]+)/', $tools, $matchestool);
            preg_match_all('/\|[0-9]+\|([^|]+)/', $hints, $matcheshint);

            $formattedDate = DateTime::createFromFormat('Y-m-d H:i:s', $publicationDate)->format('H:i:s j/m/Y');

            $toolArray = $matchestool[1];
            $hintArray = $matcheshint[1];
        } else {
            // Si aucune ligne n'est trouvée
            $errorMessage = "Aucun challenge trouvé.";
        }
    } else {
        die("ID manquant !");
    }
} catch (PDOException $e) {
    $errorMessage = "Erreur : " . $e->getMessage();
}
?>
