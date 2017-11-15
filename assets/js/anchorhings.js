(function() {
    const anchors = Array.from(document.links);
    document.getElementsByClassName("collection-info")[0].innerHTML = anchors.reduce((acc, anchor) => acc + "Link: " + anchor.href + "<br>", "");
})();