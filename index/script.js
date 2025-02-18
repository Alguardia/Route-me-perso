document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll(".level").forEach(level => {
        level.addEventListener("click", function() {
            // Supprime la classe "selected" sur tous les niveaux
            document.querySelectorAll(".level").forEach(lvl => lvl.classList.remove("selected"));

            let borderColor = getComputedStyle(this).borderColor;
            this.style.setProperty("--border-color", borderColor);

            // Ajoute la classe "selected" au niveau cliqué
            this.classList.add("selected");

            // Récupère la difficulté du niveau cliqué
            let difficulty = this.getAttribute("data-level");
           
          
            const levelInput = document.getElementById("level-input");
            if (levelInput) {
                levelInput.value = difficulty;  // Met à jour la valeur de l'input caché
            }

        }
    );
});
});


document.addEventListener('DOMContentLoaded', function () {
    const hintsSection = document.getElementById('hintsSection');
    const addHintButton = document.getElementById('addHint');
    const toolsSection = document.getElementById('toolsSection');
    const addToolButton = document.getElementById('addTool');
    let hintCount = 0;
    let toolCount = 0;

    addHintButton.addEventListener('click', function () {
        hintCount++;
        const newHint = document.createElement('div');
        newHint.classList.add('hint');
        newHint.innerHTML = `
            <div class="hint-container">
                <label for="hint${hintCount}">Indice ${hintCount}:</label>
                <textarea type="text" id="hint${hintCount}" name="hint${hintCount}"></textarea>
                <button type="button" class="removeHint">Supprimer</button>
            </div>
        `;
        
        hintsSection.appendChild(newHint);

        newHint.querySelector('.removeHint').addEventListener('click', function () {
            hintCount = hintCount - 1;
            hintsSection.removeChild(newHint);
            reorderHints();
        });
    });

    function reorderHints() {
        const hints = document.querySelectorAll('.hint');
        hints.forEach((hint, index) => {
            const label = hint.querySelector('label');
            const textarea = hint.querySelector('textarea');
    
            label.setAttribute('for', `hint${index + 1}`);
            label.textContent = `Indice ${index + 1}:`;
            textarea.setAttribute('id', `hint${index + 1}`);
            textarea.setAttribute('name', `hint${index + 1}`);
        });
    }

    addToolButton.addEventListener('click', function () {
        toolCount++;
        const newTool = document.createElement('div');
        newTool.classList.add('tool');
        newTool.innerHTML = `
            <div class="tool-container">
                <label for="tool${toolCount}">Outil ${toolCount} :</label>
                <input type="text" id="tool${toolCount}" name="tool${toolCount}">
                <button type="button" class="removeTool">Supprimer</button>
            </div>
        `;
        
        toolsSection.appendChild(newTool);
    
        newTool.querySelector('.removeTool').addEventListener('click', function () {
            toolCount = toolCount - 1;
            toolsSection.removeChild(newTool);
            reorderTools();
        });
    });
    
    function reorderTools() {
        const tools = document.querySelectorAll('.tool');
    
        tools.forEach((tool, index) => {
            const label = tool.querySelector('label');
            const input = tool.querySelector('input');
    
            label.setAttribute('for', `tool${index + 1}`);
            label.textContent = `Outil ${index + 1} :`;
            input.setAttribute('id', `tool${index + 1}`);
            input.setAttribute('name', `tool${index + 1}`);
        });
    }
});

document.getElementById('ctfForm').addEventListener('submit', function(e) {
    e.preventDefault();


    let toolsConcatenated = '';
    let hintsConcatenated = '';

    const levelInput = document.getElementById('level-input');

    // Si le champ caché est vide, empêche la soumission et affiche un message d'erreur
    if (!levelInput.value) {
        e.preventDefault();
        alert("Il faut remplir le niveau du challenge.");
        return;
    }

    
    document.querySelectorAll('#toolsSection .tool').forEach((tool, index) => {
        toolsConcatenated += `|${index + 1}| ${tool.querySelector('input').value} `;
    });
    
    document.querySelectorAll('#hintsSection .hint').forEach((hint, index) => {
        hintsConcatenated += `|${index + 1}| ${hint.querySelector('textarea').value} `;
    });

    // Crée des champs cachés dans le formulaire pour envoyer ces données
    const toolsInput = document.createElement('input');
    toolsInput.type = 'hidden';
    toolsInput.name = 'tools';
    toolsInput.value = toolsConcatenated.trim();
    document.getElementById('ctfForm').appendChild(toolsInput);

    const hintsInput = document.createElement('input');
    hintsInput.type = 'hidden';
    hintsInput.name = 'hints';
    hintsInput.value = hintsConcatenated.trim();  // Supprimer l'espace final
    document.getElementById('ctfForm').appendChild(hintsInput);



    // Soumettre le formulaire
    this.submit();
});
