class World {
    constructor(width, height) {
        this.tiles = [];
        this.width = width;
        this.height = height;
    }

    generate() {
        this.tiles = new Array(8).fill().map(() => new Array(5).fill(TileTypes.grass));
        this.generateCup(this.tiles);
    }

    generateCup(tiles) {
        const x = Math.floor(Math.random() * 100 % this.width);
        const y = Math.floor(Math.random() * 100 % this.height);
        tiles[x][y] = TileTypes.cup;
    }

    render() {
        const gameField = document.querySelector('#game-field');
        this.tiles.forEach(tiles => tiles.forEach(tileType => {
            let tile = document.createElement('div');
            tile.classList.add('game-field__tile');
            tile.classList.add(tileType);
            gameField.appendChild(tile);
        }));
    }
}