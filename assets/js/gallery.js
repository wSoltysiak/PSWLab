class Gallery {
    constructor() {
        this.position = 0;
        this.pictures = Array.from(document.querySelector('#images-list').childNodes)
            .filter(this.isImgNode)
            .map(img => img.src);
        this.max = this.pictures.length - 1;
        this.min = 0;

        this.attachImage();
        this.attachNavigation();
    }

    isImgNode(element) {
        return element.nodeName.toLowerCase() === 'img';
    }

    attachImage() {
        const container = document.querySelector('#image-container');
        container.style.background = 'url(' + this.pictures[this.position] + ')';
        container.style.backgroundSize = 'cover';
    }

    moveToNext() {
        this.position = this.position === this.max ? 0 : this.position + 1;
        this.attachImage();
    }

    moveToPrevious() {
        this.position = this.position === this.min ? this.max : this.position - 1;
        this.attachImage();
    }

    attachNavigation() {
        document.querySelector('#left').addEventListener('click', this.moveToNext.bind(this));
        document.querySelector('#right').addEventListener('click', this.moveToPrevious.bind(this));
    }
}

(function() {
    let gallery = new Gallery();
})();