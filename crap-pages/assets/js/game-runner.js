(function() {
    const gameField = document.querySelector('#game-field');
    const worldWidth  = 8;
    const worldHeight = 5;

    const player = new Player();
    const world = new World(worldWidth, worldHeight);
    const renderElements = [world, player];

    function startGame() {
        world.generate();
        render();
        gameField.focus();
        gameField.onkeypress = gameLoop;
    }

    function render() {
        renderElements.forEach(element => element.render());
    }

    function gameLoop(event) {
        player.move(event.keyCode);
        render();
        if (isEndOfGame()) {
            showSuccessAlert();
        }
    }

    function isEndOfGame() {
        return world.isCup(player.x, player.y);
    }

    function showSuccessAlert() {
        alert('Brawo! Udało się!');
    }

    startGame();
})();