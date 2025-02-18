document.querySelectorAll('.hint-toggle').forEach((button, index) => {
    let isCooldown = false; // Indicateur pour vérifier si un délai est en cours
    let cooldownTime = 30; // Temps d'attente en secondes avant de pouvoir ouvrir le prochain indice

    button.addEventListener('click', () => {
        const content = button.nextElementSibling;

        if (content.style.maxHeight) {
            // Si le contenu est déjà visible, il ne peut pas être fermé à nouveau après qu'il ait été débloqué
            return;
        } else {
            content.style.display = 'block';
            setTimeout(() => {
                content.style.maxHeight = content.scrollHeight + "px";
                content.style.opacity = 1;
            }, 10);

            // Si c'est le premier indice, pas de délai d'attente
            if (index === 0) {
                startTimer(content, button, index); // Démarrer le timer dès que le premier indice est ouvert
            } else {
                // Pour les autres indices, si un délai est en cours, ne rien faire
                if (isCooldown) {
                    alert('Veuillez attendre ' + cooldownTime + ' secondes avant de pouvoir ouvrir cet indice.');
                    return;
                }
                // Démarrer le timer de cooldown pour cet indice
                startCooldown(button);
            }
        }
    });

    // Fonction pour démarrer le timer d'attente pour l'ouverture de l'indice suivant
    function startCooldown(button) {
        isCooldown = true; // Active le délai d'attente
        let cooldownDisplay = document.createElement('span');
        button.insertAdjacentElement('afterend', cooldownDisplay);
        cooldownDisplay.textContent = `Veuillez patienter ${cooldownTime}s avant d'ouvrir le suivant.`;

        const countdown = setInterval(() => {
            cooldownTime--;
            cooldownDisplay.textContent = `Veuillez patienter ${cooldownTime}s avant d'ouvrir le suivant.`;

            if (cooldownTime <= 0) {
                clearInterval(countdown); // Stopper le compte à rebours
                cooldownDisplay.textContent = "Vous pouvez maintenant ouvrir le prochain indice.";
                setTimeout(() => {
                    cooldownDisplay.remove(); // Enlever le message après quelques secondes
                    cooldownTime = 30; // Réinitialiser le temps d'attente
                    isCooldown = false; // Réinitialiser l'indicateur de délai
                }, 2000); // Enlever après 2 secondes
            }
        }, 1000);
    }

    // Fonction pour démarrer le timer pour l'indice ouvert
    function startTimer(content, button, index) {
        let timeLeft = 30;  // 30 secondes pour chaque indice
        const timerDisplay = document.createElement('span');
        button.insertAdjacentElement('afterend', timerDisplay);
        timerDisplay.textContent = `Temps restant: ${timeLeft}s`;

        // Mettre à jour le timer chaque seconde
        const countdown = setInterval(function() {
            timeLeft--;
            timerDisplay.textContent = `Temps restant: ${timeLeft}s`;
            
            if (timeLeft <= 0) {
                clearInterval(countdown);
                alert('Le temps pour cet indice est écoulé!');
                
                // L'indice reste ouvert après le temps écoulé
                content.style.maxHeight = content.scrollHeight + "px";
                content.style.opacity = 1;
                content.style.pointerEvents = 'none'; // Empêche l'interaction avec l'indice après le temps écoulé
                setTimeout(() => {
                    timerDisplay.remove(); // Supprimer le timer affiché après un petit délai
                }, 1000);
            }
        }, 1000);
    }
});

// Code existant pour la gestion de l'élément sélectionné dans les niveaux
document.addEventListener('DOMContentLoaded', function () {
    const selectedLevel = document.querySelector(".level.selected");

    if (selectedLevel) {
        let borderColor = getComputedStyle(selectedLevel).borderColor;

        selectedLevel.style.borderColor = borderColor;
        selectedLevel.style.backgroundColor = borderColor;
    }
});
