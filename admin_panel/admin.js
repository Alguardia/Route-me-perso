
document.addEventListener('DOMContentLoaded', function () {
    const selectedLevel = document.querySelector(".level.selected");


    if (selectedLevel) {
        let borderColor = getComputedStyle(selectedLevel).borderColor;

        selectedLevel.style.borderColor = borderColor;
        selectedLevel.style.backgroundColor = borderColor;

    }
});