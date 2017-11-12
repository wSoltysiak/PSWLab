(function() {
    const gameField = document.querySelector('#game-field');
    let oldX = undefined;
    let oldY = undefined;

    gameField.onmouseover = addShadow;
    gameField.onmouseout = removeShadow;
    window.onmousemove = calculateDiscoMode;

    function addShadow() {
        gameField.style.boxShadow = '10px 10px 10px #AAAAAA';
    }

    function removeShadow() {
        gameField.style.boxShadow = '';
    }

    function calculateDiscoMode() {
        if ((Math.abs(oldX - event.clientX) + Math.abs(oldY - event.clientY)) > 1200) {
            runDiscoMode();
        }
        oldX = event.clientX;
        oldY = event.clientY;
    }

    function runDiscoMode() {
        setInterval(() => {
            const colors = ['red', 'green', 'blue', 'magenta', 'yellow'];
            document.body.style.backgroundColor = colors[Math.floor(Math.random() * 100 % 5)];
        }, 200);
    }
})();