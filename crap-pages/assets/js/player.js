class Player {
    constructor() {
        this.x = 0;
        this.y = 0;
    }

    move(direction) {
        switch(direction) {
            case 97:
                if (this.x > 0) {
                    this.x--;
                }
                break;
            case 119:
                if (this.y > 0) {
                    this.y--;
                }
                break;
            case 100:
                if (this.x < 7) {
                    this.x++;
                }
                break;
            case 115:
                if (this.y < 4) {
                    this.y++;
                }
                break;
        }
    }

    render() {
        const gameField = document.querySelector('#game-field');
        const toDelete = document.querySelector('#game-field').children[this.x + this.y * 8];
        let tile = document.createElement('div');
        tile.classList.add('game-field__tile');
        tile.classList.add(TileTypes.player);
        gameField.insertBefore(tile, toDelete);
        gameField.removeChild(toDelete);
    }
}