class Player {
    constructor() {
        this.x = 0;
        this.y = 0;
    }

    render() {
        const gameField = document.querySelector('#game-field');
        const toDelete = document.querySelector('#game-field').children[(this.x + 1)  * (this.y + 1) - 1];
        let tile = document.createElement('div');
        tile.classList.add('game-field__tile');
        tile.classList.add(TileTypes.player);
        gameField.insertBefore(tile, toDelete);
        gameField.removeChild(toDelete);
    }
}