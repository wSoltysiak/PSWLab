class World {
    constructor(width, height) {
        this.tiles = [];
        this.width = width;
        this.height = height;
    }

    generate() {
        this.tiles = new Array(this.width).fill().map(() => new Array(this.height).fill(TileTypes.grass));
        this.generateCup(this.tiles);
    }

    generateCup(tiles) {
        const x = Math.floor(Math.random() * 100 % this.width);
        const y = Math.floor(Math.random() * 100 % this.height);
        tiles[x][y] = TileTypes.cup;
        return tiles;
    }

    render() {
        this.clear();
        const flatTiles = this.tiles.reduce((accumulator, xTiles) => accumulator.concat(xTiles));
        flatTiles.forEach(this.renderTile);
    }

    renderTile(tile) {
        const gameField = document.querySelector('#game-field');
        let tileElement = document.createElement('div');
        tileElement.classList.add('game-field__tile');
        tileElement.classList.add(tile);
        gameField.appendChild(tileElement);
    }

    clear() {
        const gameField = document.querySelector('#game-field');
        const tiles = gameField.children;
        Array.from(tiles).forEach(tile => gameField.removeChild(tile));
    }

    isCupOnTile(x, y) {
        return this.tiles[x][y] === TileTypes.cup;
    }
}