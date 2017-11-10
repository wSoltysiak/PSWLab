class Gallery {
    constructor() {
        this.position = 0;
        this.pictures = this.getPictures();
        this.container = document.querySelector('#image-container');
        this.start = 0;
        this.end = this.pictures.length - 1;
        this.intervalId = this.runAutoGallery();

        this.attachImage(this.start);
        this.attachNavigation();
    }

    getPictures() {
        return Array.from(document.querySelector('#images-list').childNodes)
            .filter(this.isImgNode)
            .map(img => img.src);
    }

    isImgNode(element) {
        return element.nodeName.toLowerCase() === 'img';
    }

    attachImage(position) {
        this.container.style.background = 'url(' + this.pictures[position] + ')';
        this.container.style.backgroundSize = 'cover';
    }

    makeTransition() {
        this.container.style.opacity = '0.6';
        setTimeout(() => this.container.style.opacity = '1', 600);
    }

    attachNavigation() {
        document.querySelector('#left').addEventListener('click', () => {
            this.clearAutoStep();
            this.moveToNext();
        });
        document.querySelector('#right').addEventListener('click', () => {
            this.clearAutoStep();
            this.moveToPrevious();
        });
    }

    runAutoGallery() {
        return setInterval(this.moveToNext.bind(this), 10000);
    }

    clearAutoStep() {
        clearInterval(this.intervalId);
        this.intervalId = this.runAutoGallery();
    }

    moveToNext() {
        this.position = this.position === this.end ? 0 : this.position + 1;
        this.attachImage(this.position);
        this.makeTransition();
    }

    moveToPrevious() {
        this.position = this.position === this.start ? this.end : this.position - 1;
        this.attachImage(this.position);
        this.makeTransition();
    }
}

(function() {
    new Gallery();
})();