<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image.png" href="../img/rt_logo.png">
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</head>
<body>
    <div class="app">
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
        <h1>Générateur de Write-Up</h1>
        <form id="ctfForm" method="POST" action="save_data.php">
            <fieldset>
                <legend>Informations Générales</legend>
                <div class="ligne">
                    <label for="challengeName">Nom du Challenge :</label>
                    <input type="text" id="challengeName" name="challengeName" required>
            
                    <label for="points">Points :</label>
                    <input type="number" id="points" name="points" required>
            
                </div>
                <div class="ligne2">  
                    <label for="category">Catégorie :</label>
                    <select id="category" name="category" required>
                        <option value="Web">Web</option>
                        <option value="Pentest">Pentest</option>
                        <option value="Forensic">Forensic</option>
                        <option value="Reverse">Reverse</option>
                        <option value="SOC">SOC</option>
                        <option value="Windows">Windows</option>
                        <option value="IA">IA</option>
                        <option value="Web3">Web3</option>
                    </select>
             
                    <label for="category">Niveau :</label>
                    <div class="level-container">
                        <div class="level" data-level="Très Facile"></div>
                        <div class="level" data-level="Facile"></div>
                        <div class="level" data-level="Moyen"></div>
                        <div class="level" data-level="Difficile"></div>
                        <div class="level" data-level="Très Difficile"></div>
                        <input type="hidden" id="level-input" name="level-input" value="">

                    </div>
                </div>
                
                <div class="ligne3">
                    <label for="author">Auteur :</label>
                    <input type="text" id="author" name="author" required>
                
                    <label for="publicationDate">Lien du challenge :</label>
                    <input type="text" id="publicationDate" name="link-rm" required>
                </div>
            </fieldset>


            <fieldset>
                <legend>Énoncé du Challenge</legend>
                <label for="challengeStatement">Énoncé:</label>
                <textarea id="challengeStatement" name="challengeStatement" rows="4" required></textarea>
            </fieldset>

            
            <fieldset class="fieldtool">
                <legend>Outils Utilisés</legend>
                <div id="toolsSection">
                    
                </div>
                <button type="button" id="addTool">Ajouter un outil</button>
            </fieldset>

            <fieldset class="fieldhint">
                <legend>Système d’indices</legend>
                <div id="hintsSection">
                    
                </div>
                <button type="button" id="addHint">Ajouter un indice</button>
            </fieldset>


            <div class="submit-btn">
            <button class="submit" type="submit">Générer le Write-Up</button>
            </div> 
        </form>



    
    <footer>
        <p>© Route Me | Tout droits réservés</p>
    </footer>
</div>
<script src="script.js"></script>
</body>
</html>