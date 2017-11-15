(function() {
    const gameField = document.querySelector('#game-field');
    const worldWidth = 8;
    const worldHeight = 5;

    const player = new Player();
    const world = new World(worldWidth, worldHeight);
    const renderElements = [world, player];

    function startGame() {
        createDescription();
        world.generate();
        render();
        gameField.focus();
        gameField.onkeypress = gameLoop;
        gameField.onkeydown = extraKeysManager;
    }

    function createDescription() {
        const gameContainer = gameField.parentNode;
        const description = document.createTextNode('Twoim zadaniem jest odnalezienie zagubionego pucharu nieśmiertelności');
        gameContainer.appendChild(description);
    }

    function render() {
        renderElements.forEach(element => element.render());
    }

    function gameLoop(event) {
        player.move(event.keyCode, worldWidth, worldHeight);
        render();
        if (isEndOfGame()) {
            showSuccessAlert();
        }
    }

    function isEndOfGame() {
        return world.isCupOnTile(player.x, player.y);
    }

    function showSuccessAlert() {
        alert('Brawo! Od teraz jesteś nieśmiertelny.');
    }

    function extraKeysManager(event) {
        if (event.altKey) {
            showHelp();
        } else if (event.ctrlKey) {
            showAuthors();
        } else if (event.shiftKey) {
            resetGame();
        }
    }

    function showHelp() {
        alert('Zasady gry: \n W, A, S, D - sterowanie \n alt - pomoc \n ctrl - autorzy \n shift - ponowne losowanie planszy');
    }

    function showAuthors() {
        alert('Autorzy: \n Jakub Nadolny \n Wojciech Sołtysiak');
    }

    function resetGame() {
        player.x = 0;
        player.y = 0;
        world.generate();
        render();
    }

    startGame();
})();