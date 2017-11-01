(function() {
    let position = 0;
    const pictures = Array.from(document.querySelector('#images-list').childNodes)
        .filter(isImgNode)
        .map(img => img.src);

    attachImage();

    function isImgNode(element) {
        return element.nodeName.toLowerCase() === 'img';
    }

    function attachImage() {
        const container = document.querySelector('#image-container');
        container.style.background = 'url(' + pictures[position] + ')';
    }
})();