class Gallery {
    constructor() {
        this.position = 0;
        this.pictures = this.getPictures();
        this.start = 0;
        this.end = this.pictures.length - 1;

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
        const container = document.querySelector('#image-container');
        container.style.background = 'url(' + this.pictures[position] + ')';
        container.style.backgroundSize = 'cover';
    }

    moveToNext() {
        this.position = this.position === this.end ? 0 : this.position + 1;
        this.attachImage(this.position);
    }

    moveToPrevious() {
        this.position = this.position === this.start ? this.end : this.position - 1;
        this.attachImage(this.position);
    }

    attachNavigation() {
        document.querySelector('#left').addEventListener('click', this.moveToNext.bind(this));
        document.querySelector('#right').addEventListener('click', this.moveToPrevious.bind(this));
    }
}

(function() {
    new Gallery();
})();