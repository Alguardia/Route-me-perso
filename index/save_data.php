<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<?php

$host = 'localhost';
$dbname = 'rooteme';
$username = 'root';
$password = 'root';

try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $challengeName = $_POST['challengeName'];
    $points = $_POST['points'];
    $category = $_POST['category'];
    $level = $_POST['level-input'];
    $author = $_POST['author'];
    $linkrm= $_POST['link-rm'];
    $challengeStatement = $_POST['challengeStatement'];

    $tools = $_POST['tools'];
    $hints = $_POST['hints'];


    $stmt = $pdo->prepare("INSERT INTO challenges (challenge_name, points, category, level, author, link, publication_date, challenge_statement, tool_name, hint_description) 
                       VALUES (?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?)");
$stmt->execute([$challengeName, $points, $category, $level, $author, $linkrm, $challengeStatement, $tools, $hints]);



    echo "Données enregistrées avec succès!";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
