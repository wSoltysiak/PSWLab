(function() {
    const player = new Player();
    const world = new World(8, 5);
    world.generate();
    world.render();
    player.render();
})();