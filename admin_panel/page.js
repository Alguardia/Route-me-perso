document.querySelectorAll('.hint-toggle').forEach(button => {
    button.addEventListener('click', () => {
        const content = button.nextElementSibling;

        if (content.style.maxHeight) {
            
            content.style.maxHeight = null;
            content.style.opacity = 0;
            setTimeout(() => {
                content.style.display = 'none';
            }, 300);
        } else {
        
            content.style.display = 'block';
            setTimeout(() => {
                content.style.maxHeight = content.scrollHeight + "px";
                content.style.opacity = 1;
            }, 10);
        }
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
