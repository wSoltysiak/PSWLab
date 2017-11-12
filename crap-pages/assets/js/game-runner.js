(function() {
    const gameField = document.querySelector('#game-field');
    const worldWidth  = 8;
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
        alert('Brawo! Od teraz jeteś nieśmiertelny.');
    }

    startGame();
})();