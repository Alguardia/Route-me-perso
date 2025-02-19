document.addEventListener("DOMContentLoaded", () => {
    const timerDuration = 10; // ⏳ 10 secondes pour les tests
    const hints = document.querySelectorAll(".hint-toggle");

    hints.forEach((button, index) => {
        const hintContent = button.nextElementSibling.nextElementSibling; // Sélection de l'indice
        const hintKey = `hint_${index}`;
        const timerKey = `timer_${index}`;

        let storedTime = localStorage.getItem(timerKey);
        let hintRevealed = localStorage.getItem(hintKey);

        // Désactiver les indices sauf le premier au chargement
        if (index > 0 && !localStorage.getItem(`hint_${index - 1}`)) {
            button.disabled = true;
        }

        // Si l'indice était déjà révélé, on l'affiche
        if (hintRevealed === "true") {
            hintContent.style.display = "block";
            hintContent.style.maxHeight = hintContent.scrollHeight + "px";
            hintContent.style.opacity = "1";
            button.disabled = true;
            enableNextHint(index);
        }

        // Si un timer était en cours, on le reprend
        if (storedTime) {
            let remainingTime = parseInt(storedTime, 10);
            startTimer(button, hintContent, index, remainingTime);
        }

        button.addEventListener("click", () => {
            if (!localStorage.getItem(timerKey)) {
                localStorage.setItem(timerKey, timerDuration);
                startTimer(button, hintContent, index, timerDuration);
            }
        });
    });

    function startTimer(button, hintContent, index, timeLeft) {
        button.disabled = true; // Désactive le bouton
        const timerDisplay = document.createElement("span");
        timerDisplay.classList.add("timer");
        button.insertAdjacentElement("afterend", timerDisplay);

        const countdown = setInterval(() => {
            timeLeft--;
            localStorage.setItem(`timer_${index}`, timeLeft);
            timerDisplay.textContent = `Temps restant: ${timeLeft}s`;

            if (timeLeft <= 0) {
                clearInterval(countdown);
                timerDisplay.remove();
                hintContent.style.display = "block";
                hintContent.style.maxHeight = hintContent.scrollHeight + "px";
                hintContent.style.opacity = "1";
                localStorage.setItem(`hint_${index}`, "true"); // Marque l'indice comme révélé
                localStorage.removeItem(`timer_${index}`); // Supprime le timer terminé
                enableNextHint(index);
            }
        }, 1000);
    }

    function enableNextHint(index) {
        const nextHint = document.querySelectorAll(".hint-toggle")[index + 1];
        if (nextHint) {
            nextHint.disabled = false;
        }
    }

    // 🔴 Bouton pour réinitialiser le localStorage
    const resetButton = document.createElement("button");
    resetButton.textContent = "🔄 Réinitialiser les indices";
    resetButton.classList.add("reset-button");
    document.body.appendChild(resetButton);

    resetButton.addEventListener("click", () => {
        localStorage.clear();
        location.reload();
    });
});









document.addEventListener('DOMContentLoaded', function () {
    const selectedLevel = document.querySelector(".level.selected");

    if (selectedLevel) {
        let borderColor = getComputedStyle(selectedLevel).borderColor;

        selectedLevel.style.borderColor = borderColor;
        selectedLevel.style.backgroundColor = borderColor;
    }
});
