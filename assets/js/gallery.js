(function() {
    let position = 0;
    const pictures = Array.from(document.querySelector('#images-list').childNodes)
        .filter(isImgNode)
        .map(img => img.src);
    const max = pictures.length - 1;
    const min = 0;

    attachImage();
    attachNavigation();

    function isImgNode(element) {
        return element.nodeName.toLowerCase() === 'img';
    }

    function attachImage() {
        const container = document.querySelector('#image-container');
        container.style.background = 'url(' + pictures[position] + ')';
        container.style.backgroundSize = 'cover';
    }

    function moveToNext() {
        position = position === max ? 0 : position + 1;
        attachImage();
    }

    function moveToPrevious() {
        position = position === min ? max : position - 1;
        attachImage();
    }

    function attachNavigation() {
        document.querySelector('#left').addEventListener('click', moveToNext);
        document.querySelector('#right').addEventListener('click', moveToPrevious);
    }
})();