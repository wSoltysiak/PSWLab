class Player {
    constructor() {
        this.x = 0;
        this.y = 0;
    }

    move(direction, worldWidth, worldHeight) {
        switch(direction) {
            case Directions.left:
                if (this.x > 0) {
                    this.x--;
                }
                break;
            case Directions.top:
                if (this.y > 0) {
                    this.y--;
                }
                break;
            case Directions.right:
                if (this.x < worldWidth - 1) {
                    this.x++;
                }
                break;
            case Directions.bottom:
                if (this.y < worldHeight - 1) {
                    this.y++;
                }
                break;
        }
    }

    render() {
        const newTile = this.createPlayerTile();
        this.replaceTile(newTile);
    }

    createPlayerTile() {
        const playerTile = document.createElement('div');
        playerTile.classList.add('game-field__tile');
        playerTile.classList.add(TileTypes.player);
        return playerTile;
    }

    replaceTile(newTile) {
        const gameField = document.querySelector('#game-field');
        const toReplace = gameField.children[this.x * 5 + this.y];
        gameField.replaceChild(newTile, toReplace);
    }
}