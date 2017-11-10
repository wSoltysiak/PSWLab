(function() {
    const gameField = document.querySelector('#game-field');
    gameField.focus();

    const player = new Player();
    const world = new World(8, 5);

    world.generate();
    world.render();
    player.render();

    gameField.onkeypress = event => {
        player.move(event.keyCode);
        world.render();
        player.render();
    }
})();