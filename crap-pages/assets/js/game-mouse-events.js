(function() {
    const gameField = document.querySelector('#game-field');

    gameField.onmouseover = addShadow;
    gameField.onmouseout = removeShadow;

    function addShadow() {
        gameField.style.boxShadow = '10px 10px 10px #AAAAAA';
    }

    function removeShadow() {
        gameField.style.boxShadow = '';
    }
})();