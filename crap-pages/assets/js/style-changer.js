(function() {
    const backgroundInput = document.querySelector('#background-color');
    const fontColorInput = document.querySelector('#font-color');
    const fontFamilyInput = document.querySelector('#font-family');

    function changeBackgroundColor() {
        document.body.style.backgroundColor = backgroundInput.value;
    }

    function changeFontColor() {
        document.body.style.color = fontColorInput.value;
    }

    function changeFontFamily() {
        document.body.style.fontFamily = fontFamilyInput[fontFamilyInput.selectedIndex].value;
    }

    backgroundInput.onblur = changeBackgroundColor;
    fontColorInput.onblur = changeFontColor;
    fontFamilyInput.onblur = changeFontFamily;
})();